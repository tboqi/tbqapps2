from wwwapp import engine
from wwwapp.libs import utils


def checkLogin(username, pwd):
    pwdMd5 = utils.getMd5(pwd)
    print(pwdMd5)
    item = engine.execute(
        'select password from users where username = %s', (username)).first()
    if item['password'] == pwdMd5:
        return True
    else:
        return False


def editpass(newPwd, username):
    newPwdMd5 = utils.getMd5(newPwd)
    engine.execute('update users set password=%s where username=%s',
                   (newPwdMd5, username))
    pass
