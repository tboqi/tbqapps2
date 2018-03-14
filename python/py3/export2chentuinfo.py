import sqlalchemy
from sqlalchemy import create_engine, Column, Integer, String
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker

engine = create_engine(
    'mysql+pymysql://root:root@10.0.75.1/chentublog', echo=True)

Base = declarative_base()
Session = sessionmaker(bind=engine)


class Article(Base):
    __tablename__ = 'articles'

    id = Column(Integer, primary_key=True)
    title = Column(String)
    content = Column(String)
    category_name = Column(String)
    tabs_detail = Column(String)
    ref = Column(Integer)
    refurl = Column(String)

    def __repr__(self):
        return self.title
