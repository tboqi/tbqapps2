from wwwapp import app
from flask import abort, redirect, url_for, render_template

@app.route('/')
def index():
    return render_template('index.html', cssurl=url_for('static', filename='style.css'))