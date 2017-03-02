import hashlib   

def md5Encode(str):
    m = hashlib.md5(str.encode(encoding='utf-8'))
    return m.hexdigest()

print(md5Encode('111111'))