from __future__ import unicode_literals
from   HotMart.scrap import *
from   Models.User import User
import argparse
import requests
import base64
from datetime import datetime
from redis import Redis

LOGIN_MAX_TRIES = 3
HOTMART_LOGIN  = "https://app-vlc.hotmart.com/login"
HOTMART_MARKET = "https://app-vlc.hotmart.com/market/search?q=" 
HOTMART_DFT    = "https://app-vlc.hotmart.com/market/" 
HOTMART_DASH   = "https://app-vlc.hotmart.com/dashboard"
HOTMART_STATIC = "https://static-media.hotmart.com/"
MARKET_FIRSTS  = "https://app-vlc.hotmart.com/market?tab=firstSales"
MARKET_HOTTEST = "https://app-vlc.hotmart.com/market?tab=hottest"
MARKET_DEAREST = "https://app-vlc.hotmart.com/market?tab=dearest"
MARKET_NEWEST  = "https://app-vlc.hotmart.com/market?tab=newest"
URL            = ""
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


def main():
    u,headless = parser()
    print("[!] Iniciando browser...")
    driver = initDriver(headless)
    print("[!] Autenticando...")
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
    
    redis = Redis("localhost")
    while True:
        if redis.llen("IDS_PRODUTOS") != 0:
            listProducts = redis.lrange("IDS_PRODUTOS",0,-1)
            firstId = int(listProducts[0])
            redis.lrem("IDS_PRODUTOS",1,firstId)
            driver.get(HOTMART_MARKET+str(firstId))
            if isMarket(driver):
                disableFilter(driver)
                links = getProductsLinks(driver)
                if links:
                    product = Product(links[0])
                    product = getProductInfo(driver,product)
                    data = {
                        "id": product.id,
                        "link":product.link,
                        "title":base64.b64encode(product.title.encode("utf-8")),
                        "imgLink":product.imgLink,
                        "price":product.price,
                        "maxPrice":product.maxPrice,
                        "about":base64.b64encode(product.about.encode("utf-8")),
                        "temperature":product.temperature,
                        "evaluation":product.evaluation,
                        "format":product.format,
                        "accessMethod":product.accessMethod,
                        "language":product.language,
                        "cookie":product.cookie,
                        "commission":product.commission,
                        "checkout":product.checkout,
                        "pageProduct":product.pageProduct,
                        "subject":product.subject,
                        "percentage":product.percentage,
                        "date":product.date,
                        "origin":product.origin
                        
                    }
                    # requests.post(URL,data=data)
                    print(data)
                else:
                    data = {
                        "erro":"product not found."
                    }
                    # requests.post(URL,data=data)
                    print("Produto nao existe")


if __name__ == '__main__':
    main()