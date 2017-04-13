import os
import hashlib


def getBigFileMD5(filename):
    '''
    获取文件的MD5值，适用于较大的文件
    '''
    if not os.path.isfile(filename):
        return
    myhash = hashlib.md5()
    f = open(filename, 'rb')
    while True:
        b = f.read(8096)
        if not b:
            break
        myhash.update(b)
    f.close()
    return myhash.hexdigest()


def printDiff(dirPath1, dirPath2):
    dirPath1 = dirPath1.replace(
        '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.', '').replace('-170410/tjtjs-ecstore', '')
    dirPath2 = dirPath2.replace(
        '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.', '').replace('-170410/tjtjs-ecstore', '')
    print(dirPath1 + ',' + dirPath2)
    pass


def getDirTree(dirPath1, dirPath2):
    ignoreList = ['.git', '.gitignore', 'public170327', 'publicbak170317', 'data/backup', 'data/cache/secache.php',
                  'themesbak170327', 'wap_themesbak0327', 'data/logs', 'data/kvstore', 'data/miscbak', 'data/retry.log', 'data/retry_result.log', 'wap_themes', 'themes']
    for igStr in ignoreList:
        if dirPath1.endswith(igStr) or dirPath2.endswith(igStr):
            return

    if os.path.isdir(dirPath1):
        files1 = os.listdir(dirPath1)
        files2 = os.listdir(dirPath2)
        for file in files1:
            fileFullPath = dirPath1 + '/' + file
            isIgnore = 0
            for igStr in ignoreList:
                if fileFullPath.endswith(igStr):
                    isIgnore = 1
                    break
            if isIgnore:
                continue

            if file in files2:
                getDirTree(dirPath1 + '/' + file, dirPath2 + '/' + file)
            else:
                printDiff(dirPath1 + '/' + file, '-')

        for file in files2:
            fileFullPath = dirPath2 + '/' + file
            isIgnore = 0
            for igStr in ignoreList:
                if fileFullPath.endswith(igStr):
                    isIgnore = 1
                    break
            if isIgnore:
                continue

            if file in files1:
                continue
            else:
                printDiff('-', dirPath2 + '/' + file)
    else:
        if getBigFileMD5(dirPath1) == getBigFileMD5(dirPath2):
            pass
        else:
            printDiff(dirPath1, dirPath2)

if __name__ == '__main__':
    # print('/home/tangbq/d/code/tjtjs-ecstore.172.16.226.163-170410/tjtjs-ecstore',
    #       '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.165-170410/tjtjs-ecstore')
    getDirTree(
        '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.163-170410/tjtjs-ecstore', '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.165-170410/tjtjs-ecstore')
    # print('---------')
    # print(
    #     '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.163-170410/tjtjs-ecstore', '/home/tangbq/d/code/tjtjs-ecstore')
    # getDirTree(
    #     '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.163-170410/tjtjs-ecstore', '/home/tangbq/d/code/tjtjs-ecstore')
    # print('---------')
    # print(
    #     '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.165-170410/tjtjs-ecstore', '/home/tangbq/d/code/tjtjs-ecstore')
    # getDirTree(
    #     '/home/tangbq/d/code/tjtjs-ecstore.172.16.226.165-170410/tjtjs-ecstore', '/home/tangbq/d/code/tjtjs-ecstore')
