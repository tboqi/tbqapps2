from wwwapp import app
from flask import abort, redirect, url_for, render_template, session, request

@app.route('/user')
def user_index():
    return render_template('user/index.html')

@app.route('/user/login',methods=['GET', 'POST'])
def user_login():
    if request.method == 'POST':
        session['username'] = request.form['username']
        return redirect(url_for('index'))
    
    return render_template('user/login.html')

@app.route('/user/logout')
def user_logout():
    return render_template('user/index.html')