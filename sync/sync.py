from __future__ import unicode_literals
from   HotMart.scrap import *
from   Models.User import User
import argparse
import requests
import base64
from datetime import datetime
import flask
from flask import request, jsonify

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

app = flask.Flask(__name__)
app.config["DEBUG"] = True
driver = initDriver(False)

@app.route('/api/v1/getProduct',methods=['GET'])
def userExist():
    query_parameters = request.args
    idProduto = query_parameters.get('id')
    driver.get(HOTMART_MARKET+str(idProduto))
    if isMarket(driver):
        disableFilter(driver)
        links = getProductsLinks(driver)
        if links:
            product = Product(links[0])
            product = getProductInfo(driver,product)
            data    = {
                "id": product.id,
                "link":product.link,
                "title":base64.b64encode(product.title.encode("utf-8")),
                "imgLink":product.imgLink,
                "price":product.price,
                "maxPrice":product.maxPrice,
                "about":product.about,
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
            return jsonify(data)
        else:
            data = {
                "erro":"product not found."
            }
            return jsonify(data)



def parser():
    #parser = argparse.ArgumentParser()
    #parser.add_argument('-e','--email'   ,action = 'store', dest = 'email' ,required=True)
    #parser.add_argument('-p','--password',action = 'store', dest = 'passwd',required=True)
    #parser.add_argument('--headless',help='Oculta o navegador',action="store_true")
    #args = parser.parse_args()
    u = User("thiagobraz3301@gmail.com","passw0rd")
    if True:
        return u,True
    else:
        return u,False


def main():
    u,headless = parser()
    print("[!] Iniciando browser...")    
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
    
    app.run(use_reloader=False)
            

if __name__ == '__main__':
    main()
