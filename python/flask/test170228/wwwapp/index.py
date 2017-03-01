from wwwapp import app
from flask import abort, redirect, url_for, render_template, session

@app.route('/')
def index():
    if 'username' in session:
        session['username'] = session['username'] + 1
    else:
        session['username'] = 1
    return render_template('index.html', u=session['username'])