from wwwapp import app, engine
from flask import abort, redirect, url_for, render_template, session


@app.route('/admin')
@app.route('/admin/index')
def admin_index():
    if session['isLogin']:
        return render_template('admin/index.html')
    else:
        return redirect(url_for('user_login'))
