import sqlalchemy
import json
from sqlalchemy import create_engine, Column, Integer, String, DateTime, PrimaryKeyConstraint, and_
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
        return self.post_title


class WPRelationship(BaseWp):
    __tablename__ = 'wp_term_relationships'
    __table_args__ = (
        PrimaryKeyConstraint('object_id', 'term_taxonomy_id'),
    )

    object_id = Column(Integer)
    term_taxonomy_id = Column(Integer)
    term_order = Column(Integer)


class WPTerm(BaseWp):
    __tablename__ = 'wp_terms'

    term_id = Column(Integer, primary_key=True)
    name = Column(String)
    slug = Column(String)
    term_group = Column(Integer)


class WPTermTaxonomy(BaseWp):
    __tablename__ = 'wp_term_taxonomy'

    term_taxonomy_id = Column(Integer, primary_key=True)
    term_id = Column(Integer)
    taxonomy = Column(String)
    description = Column(String)
    parent = Column(Integer)
    count = Column(Integer)


# for article in session.query(Article):
#     post = Post()
#     post.post_author = 1
#     post.post_date = datetime.fromtimestamp(article.create_time)
#     post.post_date_gmt = datetime.fromtimestamp(article.create_time)
#     post.post_content = article.content
#     post.post_title = article.title
#     post.post_excerpt = ''
#     post.post_status = 'publish'
#     post.comment_status = 'open'
#     post.ping_status = 'open'
#     post.post_password = ''
#     post.post_name = article.title
#     post.to_ping = ''
#     post.pinged = ''
#     post.post_modified = datetime.fromtimestamp(article.create_time)
#     post.post_modified_gmt = datetime.fromtimestamp(article.create_time)
#     post.post_content_filtered = ''
#     post.post_parent = 0
#     post.guid = ''
#     post.menu_order = 0
#     post.post_type = 'post'
#     post.post_mime_type = ''
#     post.comment_count = 0
#     post.summary = article.summary
#     post.is_export = 1
#     post.export_category_name = article.category_name
#     post.export_tabs_detail = article.tabs_detail

#     sessionWp.add(post)
#     sessionWp.commit()
#     print(post.ID)

for post in sessionWp.query(Post).filter(Post.is_export == 1):
    tabs = json.loads(post.export_tabs_detail)
    for tab in tabs:
        termCount = sessionWp.query(WPTerm).filter(
            WPTerm.name == tab['tab']).count()
        if termCount > 0:
            term = sessionWp.query(WPTerm).filter(
                WPTerm.name == tab['tab']).first()
            pass
        else:
            term = WPTerm(name=tab['tab'], slug=tab['tab'], term_group=0)
            sessionWp.add(term)
            sessionWp.commit()
            termTaxonomy = WPTermTaxonomy(
                term_taxonomy_id=term.term_id, term_id=term.term_id, taxonomy='post_tag', description='', parent=0, count=0)
            sessionWp.add(termTaxonomy)
            sessionWp.commit()

        relationshipCount = sessionWp.query(WPRelationship).filter(and_(
            WPRelationship.object_id == post.ID, WPRelationship.term_taxonomy_id == term.term_id)).count()
        if relationshipCount > 0:
            break
        wprelationship = WPRelationship(
            object_id=post.ID, term_taxonomy_id=term.term_id, term_order=0)
        sessionWp.add(wprelationship)
        sessionWp.commit()

    relationshipCount = sessionWp.query(WPRelationship).filter(and_(
        WPRelationship.object_id == post.ID, WPRelationship.term_taxonomy_id == 2309)).count()
    if relationshipCount > 0:
        break
    wprelationship = WPRelationship(
        object_id=post.ID, term_taxonomy_id=2309, term_order=0)
    sessionWp.add(wprelationship)
    sessionWp.commit()
