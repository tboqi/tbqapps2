from wwwapp import engine
from wwwapp.libs import utils


def getList():
    items = engine.execute("select * from links")
    return items
