from flask import Flask
from flask import render_template
app = Flask(__name__)

@app.route('/')
def index():
    return 'Index Page'
    
@app.route('/hello/')
@app.route('/hello/<name>')
def hello(name=None):
    return render_template('hello.html', name=name)

@app.route('/user/<username>')
def show_user_profile(username):
    # show the user profile for that user
    return 'User %s' % username

@app.route('/post/<int:post_id>')
def show_post(post_id):
    # show the post with the given id, the id is an integer
    return 'Post %d' % post_id

@app.route('/float/<float:post_id>')
def show_float(post_id):
    return 'float %f' % post_id

@app.route('/path/<path:str>')
def show_path(str):
    return 'path %s' % str

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        do_the_login()
    else:
        show_the_login_form()

def do_the_login():
    pass

def show_the_login_form():
    pass

if __name__ == '__main__':
    app.run(debug=True)