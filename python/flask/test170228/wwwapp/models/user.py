from wwwapp import engine
from wwwapp.libs import utils

def checkLogin(username, pwd):
    pwdMd5 = utils.md5Encode(pwd)
    item = engine.execute('select pass from users where name = %s', (username)).first()
    if item['pass'] == pwdMd5:
        return True
    else:
        return False
