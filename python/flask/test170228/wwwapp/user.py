from wwwapp import app
from flask import abort, redirect, url_for, render_template

@app.route('/user')
def user_index():
    return render_template('user/index.html', cssurl=url_for('static', filename='style.css'))