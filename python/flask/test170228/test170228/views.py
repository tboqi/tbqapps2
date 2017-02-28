from test170228 import app

@app.route('/')
def index():
    return 'Hello World!'