import sqlalchemy
from sqlalchemy import create_engine, Column, Integer, String, DateTime
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker
from datetime import datetime

engine = create_engine(
    'mysql+pymysql://root:root@10.0.75.1/chentublog?charset=utf8', echo=True)
Base = declarative_base(bind=engine)
Session = sessionmaker(bind=engine)
session = Session()

engineWp = create_engine(
    'mysql+pymysql://root:root@10.0.75.1/chentu_info_wp?charset=utf8', echo=True)
BaseWp = declarative_base(bind=engineWp)
SessionWp = sessionmaker(bind=engineWp)
sessionWp = SessionWp()


class Article(Base):
    __tablename__ = 'articles'

    id = Column(Integer, primary_key=True)
    title = Column(String)
    summary = Column(String)
    content = Column(String)
    category_name = Column(String)
    tabs_detail = Column(String)
    create_time = Column(Integer)
    ref = Column(Integer)
    refurl = Column(String)

    def __repr__(self):
        return self.title


class Post(BaseWp):
    __tablename__ = 'wp_posts'

    ID = Column(Integer, primary_key=True)
    post_author = Column(String)
    post_date = Column(DateTime())
    post_date_gmt = Column(DateTime())
    post_content = Column(String)
    post_title = Column(String)
    post_excerpt = Column(String)
    post_status = Column(String)
    comment_status = Column(String)
    ping_status = Column(String)
    post_password = Column(String)
    post_name = Column(String)
    to_ping = Column(String)
    pinged = Column(String)
    post_modified = Column(DateTime())
    post_modified_gmt = Column(DateTime())
    post_content_filtered = Column(String)
    post_parent = Column(Integer)
    guid = Column(String)
    menu_order = Column(Integer)
    post_type = Column(String)
    post_mime_type = Column(String)
    comment_count = Column(Integer)
    summary = Column(String)
    is_export = Column(Integer)
    export_category_name = Column(String)
    export_tabs_detail = Column(String)

    def __repr__(self):
        return self.ID

for article in session.query(Article):
    post = Post()
    post.post_author = 1
    post.post_date = datetime.fromtimestamp(article.create_time)
    post.post_date_gmt = datetime.fromtimestamp(article.create_time)
    post.post_content = article.content
    post.post_title = article.title
    post.post_excerpt = ''
    post.post_status = 'publish'
    post.comment_status = 'open'
    post.ping_status = 'open'
    post.post_password = ''
    post.post_name = article.title
    post.to_ping = ''
    post.pinged = ''
    post.post_modified = datetime.fromtimestamp(article.create_time)
    post.post_modified_gmt = datetime.fromtimestamp(article.create_time)
    post.post_content_filtered = ''
    post.post_parent = 0
    post.guid = ''
    post.menu_order = 0
    post.post_type = 'post'
    post.post_mime_type = ''
    post.comment_count = 0
    post.summary = article.summary
    post.is_export = 1
    post.export_category_name = article.category_name
    post.export_tabs_detail = article.tabs_detail

    sessionWp.add(post)
    sessionWp.commit()
    print(post.ID)
