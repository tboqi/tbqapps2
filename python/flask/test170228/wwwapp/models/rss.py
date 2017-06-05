from wwwapp import engine
from wwwapp.libs import utils


def getList():
    items = engine.execute("select * from rss")
    return items


def add(url):
    engine.execute(
        'insert into rss (url,create_time) values (%s,%s)', (url, utils.time()))


def update(title, description, link, generator, id):
    engine.execute(
        'update rss set title=%s,description=%s,link=%s,generator=%s,update_time=%s where id=%s', (title, description, link, generator, utils.time(), id))
    pass
