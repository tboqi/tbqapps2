from flask import Flask
from sqlalchemy import create_engine

app = Flask(__name__)
app.secret_key = 'A0Zr98j/3yX R~XHH!jmN]LWX/,?RT'
engine = create_engine('mysql+pymysql://root:111111@localhost:3307/test', convert_unicode=True)

import wwwapp.index
import wwwapp.user