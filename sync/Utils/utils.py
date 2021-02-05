import pickle
from .Config import COOKIE_FILENAME,IMAGE_PATH
from os.path import exists,join
from os import getcwd,remove
import requests
import shutil

def saveCookies(cookies,email):
    try:
        with open(join(getcwd(),email+COOKIE_FILENAME),"wb") as fd:
            pickle.dump(cookies,fd)
        return True
    except Exception as e:
        print("[-] persistCookie: "+str(e))
        return False

def cookiesExpired(cookie):
    try:
        pass
    except Exception as e:
        print("[-] cookiesExpired: "+str(e))
        return True

def loadCookies(email):
    try:
        with open(join(getcwd(),email+COOKIE_FILENAME),"rb") as fd:
            cookies = pickle.load(fd)
            return cookies
    except Exception as e:
        print("[-] loadCookies: "+str(e))
        return None

def cookieExists(email):
    if exists(join(getcwd(),email+COOKIE_FILENAME)):
        return True
    else:
        return False

def deleteCookie(email):
    if exists(join(getcwd(),email+COOKIE_FILENAME)):
        remove(join(getcwd(),email+COOKIE_FILENAME))
        return True
    else:
        return False
        
def downloadImage(urlImage):
    filename = urlImage.split("/")[-2] + ".jpg"
    try:
        r = requests.get(urlImage, stream = True)
        r.raw_decode_content = True
        with open(join(IMAGE_PATH,filename),"wb") as fd:
            shutil.copyfileobj(r.raw,fd)
        return filename
    except Exception as e:
        print("[-] downloadImage: "+str(e))
        return "NULL"