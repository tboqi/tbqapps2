from wwwapp import app
from wwwapp.models import rss, rss_entry
from wwwapp.libs import utils
from flask import abort, redirect, url_for, render_template, session, request


@app.route('/rss')
def rss_index():
    return render_template('rss/index.html', items=rss.getList())


@app.route('/rss/add', methods=['GET', 'POST'])
def rss_add():
    if request.method == 'POST':
        url = request.form['url']
        if rss.check_url_exist(url):
            return render_template('msg.html', msg='url已存在')

        url = url.strip()
        url_md5 = utils.getMd5(url)
        rss.add(url, url_md5)
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
            if hasattr(entry, 'content'):
                content = entry.content[0].value
            else:
                content = ''
            if hasattr(entry, 'author'):
                author = entry.author
            else:
                author = ''

            rss_entry.add(entry.title, entry.link,
                          author, entry.summary, content)
            pass
    pass
