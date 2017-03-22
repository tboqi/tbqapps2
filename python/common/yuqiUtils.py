def getMd5ForPy2(str):
    """ only for pythen2 """
    import md5
    m=md5.new()
    m.update(str)
    return m.hexdigest()

def getMd5(str):
    """ for py2 and py3 """
    import hashlib
    m = hashlib.md5(str.encode(encoding='utf-8'))
    return m.hexdigest()

def isset(v): 
   try : 
     type (eval(v)) 
   except : 
     return False
   else : 
     return True

if __name__ == '__main__':
    user_name='test'
    if isset('user_name'): 
        print ('user_name is defined' )
    else :
        print ('user_name is not defined' )

    print(getMd5('1111'))