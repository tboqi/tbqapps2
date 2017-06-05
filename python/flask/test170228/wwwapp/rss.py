from wwwapp import app
from wwwapp.models import rss
from flask import abort, redirect, url_for, render_template, session, request


@app.route('/rss')
def rss_index():
    return render_template('rss/index.html', links=rss.getList())


@app.route('/rss/add', methods=['GET', 'POST'])
def rss_add():
    if request.method == 'POST':
        rss.add(request.form['title'], request.form['url'])
    return render_template('rss/add.html')
