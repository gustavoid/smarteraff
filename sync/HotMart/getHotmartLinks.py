from selenium.webdriver import Firefox
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver import FirefoxOptions,FirefoxProfile
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.firefox.firefox_binary import FirefoxBinary
from random import choice
import time
import pymysql
import argparse

TIMEOUT_VALUE    = 60
DB_NAME          = "Links"
DB_HOST          = "localhost"
DB_USER          = "root"
DB_PASS          = "Hot@deal1234"
HOTMART_LOGIN    = "https://app-vlc.hotmart.com/login"
HOTMART_MARKET   = "https://app-vlc.hotmart.com/market/search?q=&subcategoryId=" 
HOTMART_DFT      = "https://app-vlc.hotmart.com/market/" 
HOTMART_DASH     = "https://app-vlc.hotmart.com/dashboard"
LOGIN_MAX_TRIES  = 15
MARKET_MAX_TRIES = 5
LINKS_COUNT      = 0
SUBCATEGORIES    = [87,82,84,79,85,90,81,92,88,97,78,76,73,89,80,91,83,86,93,75,69,74,72,77,94]
#SUBCATEGORIES    = [85,90,81,92,88,97,78,76,73,89,80,91,83,86,93,75,69,74,72,77,94]
COMISSIONS       = ["TO_20","TO_40","TO_60","TO_80","TO_100"]
PRICES           = ["RANGE_1","RANGE_2","RANGE_3","RANGE_4","RANGE_5","RANGE_6","RANGE_7"]
AFF_TYPE         = ["ANYONE","APPLICATION"]
COOKIE_TYPE      = [0,1,2]

#https://app-vlc.hotmart.com/market/search?q=&subcategoryId=88&price=RANGE_1&comission=TO_20&affiliationType=ANYONE&cookieType=0
#SUBCATEGORIES.reverse()

class User(object): 
    def __init__(self,email,password):
        self.email    = email
        self.password = password

    def __str__(self):
        passwd = len(self.password)*"*"
        return f"| {self.email} | {passwd} |"


class DataBase(object):
    def __init__(self):
        self.__conn ,self.__cur = self._connectDatabase()

    def createTables(self):
        try:
            self.__cur.execute('CREATE TABLE Hotmart_links (\
                id  INT UNSIGNED NOT NULL auto_increment,\
                link varchar(264),\
                extracted int,\
                PRIMARY KEY(id))')
            self.__cur.execute('ALTER TABLE Network ADD FOREIGN KEY (productId) REFERENCES Products (id)')
                
        except Exception as e:
            print("[-] createTables: "+str(e))

    def tablesExists(self):
        self.__cur.execute("show tables")
        for table in self.__cur:
            if table[0] == "Hotmart_links":
                return True
        return False

    def searchProductsByLink(self,link):
        try:
            self.__cur.execute('SELECT * FROM Hotmart_links where link = "%s"' % link)
            data = self.__cur.fetchone()
            return data
        except Exception as e:
            print("[-] searchProductsByLink: "+str(e))
            return None
            
    def insertLink(self,link):
        try:
            qry = "INSERT INTO `Hotmart_links` (`link`,`extracted`) VALUES ('%s',%s)" % (link,0)
            self.__cur.execute(qry)
            self.__conn.commit()
            return True
        except Exception as e:
            print("[-] insertProduct:"+str(e))
            return False

    def verifyDatabase(self):
        try:
            self.__cur.execute('USE '+DB_NAME)
            return True
        except:
            return False

    def _connectDatabase(self):
        conn = pymysql.connect(host=DB_HOST,user=DB_USER, passwd=DB_PASS, db=DB_NAME, charset='utf8')
        cur = conn.cursor()
        return conn,cur

    def _closeDatabase(self):
        self.__cur.close()
        self.__conn.close()

def initDriver(headless):
    profile = FirefoxProfile()
    profile.set_preference('permissions.default.stylesheet', 2)
    profile.set_preference('permissions.default.image', 2)
    profile.set_preference('dom.ipc.plugins.enabled.libflashplayer.so', 'false')
    # binary = FirefoxBinary(FIREFOX_BIN)
    if headless:
        options = Options()
        options.headless = True
        # return Firefox(firefox_binary=binary,firefox_profile=profile,executable_path=GECKO_BIN,options=options)
        return Firefox(firefox_profile=profile,options=options)
    else:
        return Firefox(firefox_profile=profile)
        # return Firefox(firefox_binary=binary,firefox_profile=profile,executable_path=GECKO_BIN)

def isMarket(driver):
    try:
        WebDriverWait(driver,TIMEOUT_VALUE).until(EC.visibility_of_all_elements_located((By.XPATH,"//div[@class='ui-container']")))
        return True
    except Exception as e:
        print("[-] IsMarketErr: "+str(e))
        return False

def getPage(driver,url):
    try:
        driver.get(HOTMART_LOGIN)
        return True
    except Exception as e:
        print("[-] GetPageErr: "+str(e))
        return False

def cookieExists(email):
    return False

def applyFilterAllLanguages(driver):
    try:
        WebDriverWait(driver, TIMEOUT_VALUE).until(EC.visibility_of_element_located((By.XPATH,"//div[@class='filters p-0 active']")))
        filtersItems = driver.find_elements_by_xpath("//div[@class='toggle-item js-toggle-filter p-3']")
        laguagesItem = None
    
        activeFilters = driver.find_elements_by_xpath("//div[@class='toggle-item js-toggle-filter active p-3']")
        for active in activeFilters:
            active.click()

        for item in filtersItems:
            if item.find_element_by_tag_name("strong").text == 'Idioma':
                laguagesItem = item
            
        if laguagesItem:
            laguagesItem.click()
            time.sleep(1)
            driver.execute_script('arguments[0].scrollIntoView(true);', laguagesItem)
            laguagesItem.find_element_by_xpath("//div[@class='selectize-input items has-options full has-items']").click()
            items = driver.find_elements_by_xpath("//div[@class='option selected']")
            items[0].click()
            btn = driver.find_element_by_xpath("//button[@class='hot-btn hot-btn--primary w-100 js-apply-filters']")
            btn.click()
            time.sleep(3)
    except Exception as e:
        print("[-] applyFilterAllLanguages: "+str(e))
        return False


def verifyRegisterNotComplete(driver):
    try:
        time.sleep(5)
        driver.find_element_by_xpath("//div[@class='onboarding__content-block px-lg-5 h-100 d-flex flex-column text-center text-lg-left']")
        return True
    except:
        return False

def dimissCompleteRegister(driver):
    try:
        btn = driver.find_element_by_xpath("//button[@class='hot-btn hot-btn--link  mt-4 mt-lg-0 ml-lg-4 text-muted']")
        btn.click()
        return True
    except:
        return False

def isDashboard(driver):
    try:
        WebDriverWait(driver, TIMEOUT_VALUE).until(EC.visibility_of_element_located((By.TAG_NAME,"main" )))
        if verifyRegisterNotComplete(driver):
            dimissCompleteRegister(driver)
        return True
    except Exception as e:
        print("[-] isDashboardErr: "+str(e))
        return False


def isLoginPage(driver):
    try:
        WebDriverWait(driver, TIMEOUT_VALUE).until(EC.visibility_of_element_located((By.XPATH, "//form[@class='login-with-password flex-grow-1 d-flex flex-column']")))
    except Exception as e:
        print("[-] isLoginPage: "+str(e))
        return False

def login(driver,user):
    try:
        WebDriverWait(driver, TIMEOUT_VALUE).until(EC.visibility_of_element_located((By.XPATH, "//form[@class='login-with-password flex-grow-1 d-flex flex-column']")))
        form     = driver.find_element_by_xpath("//form[@class='login-with-password flex-grow-1 d-flex flex-column']")
        WebDriverWait(driver,TIMEOUT_VALUE).until(EC.visibility_of_all_elements_located((By.TAG_NAME,"input")))
        inputs   = form.find_elements_by_tag_name("input")
        btnLogin = driver.find_element_by_xpath("//button[@class='hot-btn hot-btn--hotmart-primary w-100 ml-3 p-3 auth-line-height auth-border-radius font-weight-bold']")
        inputs[0].send_keys(user.email)
        inputs[1].send_keys(user.password)
        time.sleep(3)
        btnLogin.click()
        return True
    except Exception as e:
        print("[-] LoginErr: "+str(e))
        return False

def disableFilter(driver):
    try:
        WebDriverWait(driver, TIMEOUT_VALUE).until(EC.visibility_of_element_located((By.XPATH, "//a[@data-test-id='load-more']")))
        backdropActive = driver.find_element_by_xpath("//div[@class='filters-backdrop active']")
        if backdropActive is not None:
            backdropActive.click()
        return True
    except Exception as e:
        print("[-] disableFilter: "+str(e))
        return False

def loadMore(driver):
    try:
        WebDriverWait(driver, 15).until(EC.visibility_of_element_located((By.XPATH, "//a[@data-test-id='load-more']")))
        btn = driver.find_element_by_xpath("//a[@data-test-id='load-more']")
        btn.click()
        WebDriverWait(driver, 15).until(EC.visibility_of_element_located((By.XPATH, "//a[@class='hot-btn hot-btn--outline-secondary js-load-more']")))
        time.sleep(1)
        return True
    except Exception as e:
        print("[-] loadMore: "+str(e))
        return False

def parser():
    parser = argparse.ArgumentParser()
    parser.add_argument('-e','--email'   ,action = 'store', dest = 'email' ,required=True)
    parser.add_argument('-p','--password',action = 'store', dest = 'passwd',required=True)
    parser.add_argument('--headless',help='Oculta o navegador',action="store_true")
    args = parser.parse_args()
    u = User(args.email,args.passwd)
    if args.headless:
        return u,True
    else:
        return u,False


def getProductsLinks(driver,db):
    global LINKS_COUNT
    try:
        for p in driver.find_elements_by_xpath("//a[@class='full-link js-access-product-details']")[-10:]:
            if not db.searchProductsByLink(p.get_attribute("href")):
                db.insertLink(p.get_attribute("href"))
                LINKS_COUNT += 1
                print(f"[{LINKS_COUNT}] {p.get_attribute('href')} : Salvo.")
    except Exception as e:
        print("[-] GetProductsErr: "+str(e))

def linksGetter(driver,db,catId,price,comission,cookie,affType):
    driver.get(f"https://app-vlc.hotmart.com/market/search?q=&subcategoryId={str(catId)}&price={price}&comission={comission}&affiliationType={affType}&cookieType={str(cookie)}")
    LOOP     = True
    disableFilter(driver)
    while LOOP:
        try:
            WebDriverWait(driver,TIMEOUT_VALUE).until(EC.visibility_of_element_located((By.XPATH,"//div[@class='text-center']")))
        except:
            pass
        try:
            disableFilter(driver)
        except:
            pass
        try:
            getProductsLinks(driver,db)
            if not loadMore(driver):
                break
        except Exception as e:
            print("[-] linksGetter : "+str(e))
            break

def main():
    global SUBCATEGORIES
    u,headless = parser()
    print("[!] Iniciando browser...")
    driver = initDriver(headless)
    print("[!] Autenticando...")
    if not cookieExists(u.email):
        if getPage(driver,HOTMART_LOGIN):
            count = 0
            LOOP  = True
            while (count < LOGIN_MAX_TRIES) and (LOOP):  
                login(driver,u)
                if isDashboard(driver): 
                    LOOP = False
                    print("[+] Logado: "+str(u))
                count += 1
            if LOOP:
                print("[-] Erro ao realizar login com "+str(u)+"\nCertifique-se que as credenciais estao corretas.")
                exit(0)

        driver.get(HOTMART_DFT)
    else:
        print("[+] Cookies encontrados [%s]"%u.email)
        driver.get(HOTMART_LOGIN)
        driver.get(HOTMART_DFT)
        time.sleep(3)
        driver.refresh()
    
    db = DataBase()
    if not db.verifyDatabase():
        print("[-] Banco de dados nao encontrado!")
        exit(0)
    if not db.tablesExists():
        db.createTables()

    applyFilterAllLanguages(driver) 
    # for catId in SUBCATEGORIES:
    auxCat = []
    while len(auxCat) != len(SUBCATEGORIES):
        cat = choice(SUBCATEGORIES)
        if not cat in auxCat:
            auxCat.append(cat)
            for price in PRICES:
                for comission in COMISSIONS:
                    for cookie in COOKIE_TYPE:
                        for aff in AFF_TYPE:
                            linksGetter(driver,db,cat,price,comission,cookie,aff)

if __name__ == "__main__":
    main()

