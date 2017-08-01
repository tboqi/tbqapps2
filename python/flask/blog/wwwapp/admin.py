from wwwapp import app, engine
from flask import abort, redirect, url_for, render_template, session


@app.route('/admin')
@app.route('/admin/index')
def admin_index():
    return render_template('admin/index.html')
