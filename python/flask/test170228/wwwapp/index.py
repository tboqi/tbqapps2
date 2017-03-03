from wwwapp import app, engine
from flask import abort, redirect, url_for, render_template, session

@app.route('/')
def index():

    return render_template('index.html')