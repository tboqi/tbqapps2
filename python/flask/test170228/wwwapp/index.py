from wwwapp import app, engine
from flask import abort, redirect, url_for, render_template, session

@app.route('/')
def index():
    user = engine.execute('select * from users where id = %s', ('1')).first()
    print(user)
    return render_template('index.html', user=user['name'])