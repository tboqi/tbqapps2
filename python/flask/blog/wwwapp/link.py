from wwwapp import app
from wwwapp.models import link
from flask import abort, redirect, url_for, render_template, session, request


@app.route('/link')
def link_index():
    return render_template('link/index.html', links=link.getList())


@app.route('/link/add', methods=['GET', 'POST'])
def link_add():
    if request.method == 'POST':
        link.add(request.form['title'], request.form['url'])
    return render_template('link/add.html')
