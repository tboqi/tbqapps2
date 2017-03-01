from wwwapp import app
from flask import abort, redirect, url_for, render_template, session

@app.route('/user')
def user_index():
    return render_template('user/index.html', cssurl=url_for('static', filename='style.css'))

@app.route('/user/login',methods=['GET', 'POST'])
def user_login():
    session['username'] = session['username']+1
    return render_template('user/login.html', u=session['username'])

@app.route('/user/logout')
def user_logout():
    return render_template('user/index.html', cssurl=url_for('static', filename='style.css'))