from wwwapp import engine
from wwwapp.libs import utils


def getList():
    items = engine.execute("select * from rss_entries")
    return items


def add(title, link, author, summary, content):
    link = link.strip()
    link_md5 = utils.getMd5(link)

    item = engine.execute(
        "select count(*) c from rss_entries where link_md5=%s", (link_md5)).first()
    print(item)
    if item[0] > 0:
        return true  # url已存在
    else:
        engine.execute('insert into rss_entries (title,link,link_md5,author,summary,content,update_time,has_read) values (%s,%s,%s,%s,%s,%s,%s,0)',
                       (title, link, link_md5, author, summary, content, utils.time()))
