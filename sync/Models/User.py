class User(object):
    def __init__(self,email,password):
        self.email    = email
        self.password = password

    def __str__(self):
        passwd = len(self.password)*"*"
        return f"| {self.email} | {passwd} |"