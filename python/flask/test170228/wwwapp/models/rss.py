from wwwapp import engine
from wwwapp.libs import utils


def getList():
    items = engine.execute("select * from rss")
    return items


def add(url):
    engine.execute(
        'insert into rss (url,create_time) values (%s,%s,%s)', (url, utils.time()))
    pass
