from wwwapp import engine
from wwwapp.libs import utils


def getList():
    items = engine.execute("select * from rss_entry")
    return items


def add(title, link, published, author, summary, content):
    engine.execute(
        'insert into rss_entry (title,link,published,author,summary,content,update_time) values (%s,%s,%s,%s,%s,%s,%s)', (title, link, published, author, summary, content, utils.time()))
