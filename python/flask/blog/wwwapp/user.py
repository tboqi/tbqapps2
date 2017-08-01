from wwwapp import app
from wwwapp.models import user
from flask import abort, redirect, url_for, render_template, session, request


@app.route('/user')
def user_index():
    return render_template('user/index.html')


@app.route('/user/login', methods=['GET', 'POST'])
def user_login():
    if request.method == 'POST':
        name = request.form['name']
        pwd = request.form['pass']
        if user.checkLogin(name, pwd):
            session['isLogin'] = 1
            session['name'] = name
            return redirect(url_for('index'))

    return render_template('user/login.html')


@app.route('/user/editpass', methods=['GET', 'POST'])
def user_editpass():
    if request.method == 'POST':
        pwd = request.form['pass']
        user.editpass(pwd, session['name'])
        return redirect(url_for('index'))

    return render_template('user/editpass.html')


@app.route('/user/logout')
def user_logout():
    session['isLogin'] = 0
    session['name'] = ''
    return redirect(url_for('index'))
