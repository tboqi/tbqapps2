from wwwapp import engine
from wwwapp.libs import utils


def getList():
    items = engine.execute("select * from links")
    return items


def add(title, url):
    engine.execute(
        'insert into links (title,url,create_time) values (%s,%s,%s)', (title, url, utils.time()))
    pass
