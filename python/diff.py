import os


def getBigFileMD5(self, filename):
    '''
    获取文件的MD5值，适用于较大的文件
    '''
    if not os.path.isfile(filename):
        return
    myhash = hashlib.md5()
    f = file(filename, 'rb')
    while True:
        b = f.read(8096)
        if not b:
            break
        myhash.update(b)
    f.close()
    return myhash.hexdigest()


def getDirTree(dirPath1, dirPath2):
    ignoreList = ['.git', '.gitignore', 'public170327', 'publicbak170317',
                  'themesbak170327', 'wap_themesbak0327', 'data/logs/site', 'data/kvstore']
    if os.path.isdir(dirPath1):
        files1 = os.listdir(dirPath1)
        files2 = os.listdir(dirPath2)
        print(files1, files2)
        for file in files1:
            if file == '.git' or file == '.gitignore' or file == 'public170327' or file == 'publicbak170317' or file == 'themesbak170327' or file == 'wap_themesbak0327':
                continue
            if file in files2:
                getDirTree(dirPath1 + '/' + file, dirPath2 + '/' + file)
            else:
                print(dirPath1 + '/' + file, ',-')

        for file in files2:
            if file in files2:
                continue
            else:
                print('-,', dirPath2 + '/' + file)
    else:
        print(dirPath1)
        return

if __name__ == '__main__':
    getDirTree(
        '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.163-170410/tjtjs-ecstore', '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.165-170410/tjtjs-ecstore')
