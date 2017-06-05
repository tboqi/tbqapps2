from wwwapp import app
from wwwapp.models import rss
from flask import abort, redirect, url_for, render_template, session, request


@app.route('/rss')
def rss_index():
    return render_template('rss/index.html', items=rss.getList())


@app.route('/rss/add', methods=['GET', 'POST'])
def rss_add():
    if request.method == 'POST':
        rss.add(request.form['url'])
        return redirect(url_for('rss_index'))
    return render_template('rss/add.html')


def read_rss():
    import feedparser
    items = rss.getList()
    for item in items:
        print('##############', item.url)
        feed = feedparser.parse(item.url)

        if hasattr(feed.feed, 'generator'):
            feed_generator = feed.feed.generator
        else:
            feed_generator = ''

        print(feed.feed.title, feed.feed.description,
              feed.feed.link,  feed_generator)
        rss.update(feed.feed.title, feed.feed.description,
                   feed.feed.link, feed_generator, item.id)

        for entry in feed.entries:
            print(entry)
            return
            pass
    pass
