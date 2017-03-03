import hashlib   

def md5Encode(str):
    m = hashlib.md5(str.encode(encoding='utf-8'))
    return m.hexdigest()

def isset(v): 
   try : 
     type (eval(v)) 
   except : 
     return False
   else : 
     return True

def isEmpty(str):
    if isset(str):
        if str.strip()=='':
            return True
        else:
            return False
    else:
        return True