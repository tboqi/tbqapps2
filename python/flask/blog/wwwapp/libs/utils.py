def getMd5ForPy2(str):
    """ only for pythen2 """
    import md5
    m = md5.new()
    m.update(str)
    return m.hexdigest()


def getMd5(str):
    """ for py2 and py3 """
    import hashlib
    m = hashlib.md5(str.encode(encoding='utf-8'))
    return m.hexdigest()


def isset(v):
    try:
        type(eval(v))
    except:
        return False
    else:
        return True


def zuidagongyueshu(a, b, returnType=0):
    '''最大公约数'''
    if a > b:
        big = a
        small = b
    else:
        big = b
        small = a

    if big % small == 0:
        gys = small
    else:
        gys = int(small / 2)
        while not(small % gys == 0 and big % gys == 0):
            gys = gys - 1

    if returnType == 0:
        # 返回最大公约数
        return str(gys)
    elif returnType == 1:
        # 返回最小比例
        a1 = a // gys
        b1 = b // gys
        return str(a1) + ":" + str(b1)
    else:
        return '参数错误'


def time():
    import time
    rt = time.time()
    return int(rt)

if __name__ == '__main__':
    print("当前时间:" + str(time()))

    print('最大公约数=' + zuidagongyueshu(1920, 1080))
    print('比例为' + ":" + zuidagongyueshu(1920, 1080, 1))

    user_name = 'test'
    if isset('user_name'):
        print('user_name is defined')
    else:
        print('user_name is not defined')

    print(getMd5('1111'))
