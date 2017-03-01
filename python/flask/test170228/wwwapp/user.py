from wwwapp import app
from flask import abort, redirect, url_for, render_template

@app.route('/user')
def user_index():
    return render_template('user/index.html', cssurl=url_for('static', filename='style.css'))

@app.route('/user/login')
def user_login():
    return render_template('user/index.html', cssurl=url_for('static', filename='style.css'))

@app.route('/user/logout')
def user_logout():
    return render_template('user/index.html', cssurl=url_for('static', filename='style.css'))