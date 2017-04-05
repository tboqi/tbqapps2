from flask import Flask
from sqlalchemy import create_engine

app = Flask(__name__)
app.secret_key = 'A0Zr98j/3yX R~XHH!jmN]LWX/,?RT'
engine = create_engine(
    'mysql+pymysql://root@localhost:3306/flask', convert_unicode=True)

import wwwapp.index
import wwwapp.user
import wwwapp.link
