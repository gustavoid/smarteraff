from selenium.webdriver import Firefox
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver import FirefoxOptions,FirefoxProfile
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.action_chains import ActionChains
from Utils.Config import *
from Models.Products import Product
from Models.User import User
from .Config import *
from Utils.Config import *
import time
import re

def initDriver(headless):
    profile = FirefoxProfile()
    profile.set_preference('permissions.default.stylesheet', 2)
    profile.set_preference('permissions.default.image', 2)
    profile.set_preference('dom.ipc.plugins.enabled.libflashplayer.so', 'false')
    if headless:
        options = Options()
        options.headless = True
        return Firefox(options=options,firefox_profile=profile)
    else:
        return Firefox(firefox_profile=profile)

def isMarket(driver):
    try:
        WebDriverWait(driver,20).until(EC.visibility_of_all_elements_located((By.XPATH,"//div[@class='col-xl-2 col-md-3 col-sm-4 col-6']")))
        return True
    except Exception as e:
        print("[-] IsMarketErr: "+str(e))
        return False

def getProductsLinks(driver):
    products = []
    try:
        products_links = driver.find_elements_by_xpath("//a[@class='full-link js-access-product-details']")
        for p in products_links:
            products.append(p.get_attribute("href"))
        return products
    except Exception as e:
        print("[-] GetProductsErr: "+str(e))
        return []

def getProductTitle(driver):
    try:
        title = driver.find_element_by_xpath("//h3[@class='hot-modal__title']")
        return title.text
    except Exception as e:
        print("[-] getProductTitle: "+str(e))
        return ""

def getProductId(driver):
    try:
        divHeader = driver.find_element_by_xpath("//div[@class='hot-modal__header']")
        strongs   = divHeader.find_elements_by_tag_name("strong")
        for strong in strongs:
            if "ID" in strong.text:
                idProduct = strong.text.strip("ID ")
                return int(idProduct)
        return 0
    except Exception as e:
        print("[-] getProductId: "+str(e))
        return 0

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

def getProductLinkPic(driver):
    try:
        divImage  = driver.find_element_by_xpath("//div[@class='hot-image rounded']")
        imageLink = divImage.find_element_by_tag_name("div")
        img = imageLink.get_attribute("style")
        img = img.strip('background-image: url("')
        img = img.strip('");')
        return img
    except Exception as e:
        print("[-] getProductLinkPic: "+str(e))
        return ""

def getProductTemperature(driver):
    try:
        wrapper = driver.find_elements_by_xpath("//div[@class='rating-wrapper']")[0]
        span    = wrapper.find_element_by_tag_name("span")
        strong  = span.find_element_by_tag_name("strong")
        temperature = int(re.search(r"\d+",strong.text).group())
        return temperature
    except Exception as e:
        print("[-] getProductTemperature: "+str(e))
        return 0

def getProductPrice(driver):
    try:
        divBodyProduct = driver.find_element_by_xpath("//div[@class='hot-modal__body']")
        h3    = divBodyProduct.find_element_by_xpath("//h3[@class='d-inline-block m-0 js-popover']")
        price = h3.find_element_by_tag_name("strong").text
        price = price.replace(",",".")
        price = float(re.search(r"[-+]?\d*\.\d+|\d+",price).group()) 
        return price
    except Exception as e:
        print("[-] getProductPrice: "+str(e)+" "+driver.current_url)
        return 0.

def getProductEvaluation(driver):
    try:
        wrapper = driver.find_elements_by_xpath("//div[@class='rating-wrapper']")[2]
        span    = wrapper.find_element_by_tag_name("span")
        strong  = span.find_element_by_tag_name("strong").text
        val     =  strong.replace(",",'.')
        evaluation = float(re.search(r"[-+]?\d*\.\d+|\d+",val).group())
        return evaluation
    except Exception as e:
        print("[-] getProductTemperature: "+str(e))
        return 0.

def getMaxPrice(driver):
    try:
        price    = driver.find_element_by_xpath("//div[@class='col-12']/p/strong").text
        val      = price.replace(',','.')
        maxPrice = float(re.search(r"[-+]?\d*\.\d+|\d+",val).group())
        return maxPrice
    except Exception as e:
        print("[-] getMaxPrice: "+str(e))
        return 0.

def clickAboutProductButton(driver):
    try:
        divContainer = driver.find_element_by_xpath("//div[@class='ui-container--tabs mt-3']")
        ulTabs       = divContainer.find_element_by_xpath("ul[@class='hot-nav hot-nav--tabs']")
        items        = ulTabs.find_elements_by_tag_name("li")
        for item in items:
            if item.find_element_by_xpath("a/span").text == 'Sobre':
                link         = item.find_element_by_tag_name("a")
                link.click()
                WebDriverWait(driver,TIMEOUT_VALUE).until(EC.visibility_of_all_elements_located((By.XPATH,"//div[@class='row py-4 container-contained market-text']")))
        return True
    except Exception as e:
        print("[-] clickAboutProductButton: "+str(e))
        return False

def getProductAbout(driver):
    try:
        divContent = driver.find_element_by_xpath("//div[@class='row py-4 container-contained market-text']")
        textsAbout  = divContent.find_elements_by_tag_name("p")
        text = ""
        for p in textsAbout:
            text += p.text + " "
        return text
    except Exception as e:
        print("[-] getProductAbout: "+str(e))
        return ""                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

def getProductAccessMethod(driver):
    try:
        accessMeth = driver.find_elements_by_xpath("//div[@class='row py-4 container-contained']/*/p")[3].text
        return accessMeth.strip("Forma de Acesso: ")
    except Exception as e:
        print("[-] getProductAccessMethod: "+str(e))
        return ""

def getProductFormat(driver):
    try:
        formatText = driver.find_elements_by_xpath("//div[@class='row py-4 container-contained']/*/p")[4].text
        return formatText.strip("Formato: ")
    except Exception as e:
        print("[-] getProductFormat: "+str(e))
        return ""

def getProductSubject(driver):
    try:
        subject = driver.find_elements_by_xpath("//div[@class='row py-4 container-contained']/*/p")[5].text 
        return subject.strip("Assunto: ")
    except Exception as e:
        print("[-] getProductSubject: "+str(e))
        return ""

def getProductLanguage(driver):
    try:
        language = driver.find_elements_by_xpath("//div[@class='row py-4 container-contained']/*/p")[0].text 
        return language.strip("Idioma: ")
    except Exception as e:
        print("[-] getProductLanguage: "+str(e))
        return ""

def getProductPage(driver):
    try:
        link = driver.find_elements_by_xpath("//div[@class='row py-4 container-contained']/*/p")[2].find_element_by_tag_name("a").get_attribute("href")
        return link
    except Exception as e:
        print("[-] getProductPage: "+str(e))
        return ""

def getProductCheckoutLink(driver):
    try:
        link = driver.find_element_by_xpath("//div[@id='salesCheckout']/span/a").get_attribute("href")
        return link
    except Exception as e:
        print("[-] getProductCheckoutLink: "+str(e))
        return ""

def getProductCommission(driver):
    try:
        commission = driver.find_elements_by_xpath("//p[@class='text-muted text-small m-0']/strong")[0]
        return commission.text
    except Exception as e:
        print("[-] getProductComission: "+str(e))
        return ""

def getProductCookie(driver):
    try:
        cookie = driver.find_elements_by_xpath("//p[@class='text-muted text-small m-0']/strong")[1]
        return cookie.text
    except Exception as e:
        print("[-] getProductCookie: "+str(e))
        return ""

def getCreationDate(driver):
    """TODO"""
    pass


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

def getProductInfo(driver,product):
    try:
        driver.get(product.link)    
        WebDriverWait(driver, TIMEOUT_VALUE).until(EC.visibility_of_element_located((By.XPATH,"//div[@class='hot-modal__body']")))
        clickAboutProductButton(driver)
        product.title        = getProductTitle(driver)
        product.id           = getProductId(driver)
        product.imgLink      = getProductLinkPic(driver)
        product.price        = getProductPrice(driver)
        product.maxPrice     = getMaxPrice(driver)
        product.about        = getProductAbout(driver)
        product.evaluation   = getProductEvaluation(driver)
        product.temperature  = getProductTemperature(driver)
        product.cookie       = getProductCookie(driver)
        product.language     = getProductLanguage(driver)
        product.commission   = getProductCommission(driver)
        product.format       = getProductFormat(driver)
        product.checkout     = getProductCheckoutLink(driver)
        product.pageProduct  = getProductPage(driver)
        product.accessMethod = getProductPage(driver)
        product.subject      = getProductSubject(driver)
        product.origin       = "Hotmart"
        product.setPercentage()
        return product
    except Exception as e:
        print("[-] getProductInfo: "+str(e))
        return None

def getPage(driver,url):
    try:
        driver.get(HOTMART_LOGIN)
        return True
    except Exception as e:
        print("[-] GetPageErr: "+str(e))
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

def clickFirstSales(driver):
    try:
        itemBtn = driver.find_element_by_xpath("//li[@id='firstSales']/a")
        itemBtn.click()
        return True
    except Exception as e:
        print("[-] clickFirstSales: "+str(e))
        return False

def clickHotTest(driver):
    try:
        itemBtn = driver.find_element_by_xpath("//li[@id='firstSales']/a")
        itemBtn.click()
        return True
    except Exception as e:
        print("[-] clickHotTest: "+str(e))
        return False

def clickDearest(driver):
    try:
        itemBtn = driver.find_element_by_xpath("//li[@id='firstSales']/a")
        itemBtn.click()
        return True
    except Exception as e:
        print("[-] clickDearest: "+str(e))
        return False

def clickNewest(driver):
    try:
        itemBtn = driver.find_element_by_xpath("//li[@id='firstSales']/a")
        itemBtn.click()
        return True
    except Exception as e:
        print("[-] clickNewest: "+str(e))
        return False

def getCookies(driver):
    return driver.get_cookies()

def setCookies(driver,cookies):
    try:
        for c in cookies:
            driver.add_cookie(c)
    except Exception as e:
        print("[-] setCookies: "+str(e))

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