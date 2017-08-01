from wwwapp import engine
from wwwapp.libs import utils


def getList():
    items = engine.execute("select * from rss")
    return items


def add(url, url_md5):
    engine.execute(
        'insert into rss (url,url_md5,create_time) values (%s,%s,%s)', (url, url_md5, utils.time()))


def update(title, description, link, generator, id):
    engine.execute(
        'update rss set title=%s,description=%s,link=%s,generator=%s,update_time=%s where id=%s', (title, description, link, generator, utils.time(), id))
    pass


def check_url_exist(url):
    url = url.strip()
    url_md5 = utils.getMd5(url)
    item = engine.execute(
        "select count(*) c from rss where url_md5=%s", (url_md5)).first()
    if item[0] > 0:
        return 1  # url已存在
    else:
        return 0  # url未存在
