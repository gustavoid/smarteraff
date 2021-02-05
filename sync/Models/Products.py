import base64

class Product(object):
    def __init__(self,link):
        self._link         = link
        self._title        = ""
        self._imgLink      = ""
        self._price        = 0.
        self._maxPrice     = 0.
        self._about        = ""
        self._temperature  = 0
        self._evaluation   = 0.
        self._format       = ""
        self._accessMethod = ""
        self._language     = ""
        self._id           = 0
        self._cookie       = ""
        self._commission   = ""
        self._checkout     = ""
        self._pageProduct  = ""
        self._subject      = ""
        self._percentage   = 0.
        self._date         = ""
        self._origin       = ""

    def __str__(self):
        return f"\n---------------------------------\nID:   {self._id}\nNome: {self._title}\nLink: {self._link}\n---------------------------------\n"

    def __eq__(self,prod2):
        return self._link == prod2._link

    def setPercentage(self):
        try:
            if (self._maxPrice != 0.) or (self._price != 0.):
                self._percentage = (self._maxPrice/self._price)/100
            else:
                self._percentage = 0.0
        except Exception as e:
            print("[-] setPercentage: "+str(e))
            self._percentage = 0.0

    @property
    def date(self):
        return self._date

    @property
    def origin(self):
        return self._origin
        
    @origin.setter
    def origin(self,value):
        self._origin = value

    @date.setter
    def date(self,value):
        self._date = value
        
    @property
    def imgLink(self):
        return self._imgLink

    @imgLink.setter
    def imgLink(self,value):
        self._imgLink = value
            
    @property 
    def percentage(self):
        if self._percentage == 0.0:
            self.setPercentage()
        return self._percentage
        
    @property
    def link(self):
        return self._link

    @link.setter
    def link(self,value):
        self._link = value
    
    @property
    def title(self):
        return self._title
    
    @title.setter
    def title(self,value):
        self._title = value
    
    @property
    def price(self):
        return self._price
    
    @price.setter
    def price(self,value):
        self._price = value
    
    @property 
    def maxPrice(self):
        return self._maxPrice
    
    @maxPrice.setter
    def maxPrice(self,value):
        self._maxPrice = value
    
    @property
    def about(self):
        return self._about
    
    @about.setter
    def about(self,value):
        b64Text     = base64.b64encode(value.encode("utf-8"))
        self._about = b64Text.decode("utf-8")
    
    @property
    def temperature(self):
        return self._temperature
    
    @temperature.setter
    def temperature(self,value):
        self._temperature = value
    
    @property
    def evaluation(self):
        return self._evaluation
    
    @evaluation.setter
    def evaluation(self,value):
        self._evaluation = value
    
    @property
    def format(self):
        return self._format
    
    @format.setter
    def format(self,value):
        self._format = value
    
    @property
    def accessMethod(self):
        return self._accessMethod
        
    
    @accessMethod.setter
    def accessMethod(self,value):
        self._accessMethod = value
    
    @property 
    def language(self):
        return self._language
    
    @language.setter
    def language(self,value):
        self._language = value
    
    @property
    def id(self):
        return self._id
    
    @id.setter
    def id(self,value):
        self._id = value
    
    @property
    def cookie(self):
        return self._cookie
    
    @cookie.setter
    def cookie(self,value):
        self._cookie = value
    
    @property
    def commission(self):
        return self._commission
    
    @commission.setter
    def commission(self,value):
        self._commission = value
    
    @property
    def checkout(self):
        return self._checkout
    
    @checkout.setter
    def checkout(self,value):
        self._checkout = value
    
    @property 
    def pageProduct(self):
        return self._pageProduct
    
    @pageProduct.setter
    def pageProduct(self,value):
        self._pageProduct = value
    
    @property
    def subject(self):
        return self._subject
    
    @subject.setter
    def subject(self,value):
        self._subject = value