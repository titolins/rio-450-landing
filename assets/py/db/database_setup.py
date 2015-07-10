import sys

from sqlalchemy import Column, ForeignKey, Integer, String, text
from sqlalchemy.dialects.mysql import TIMESTAMP
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import relationship
from sqlalchemy import create_engine



Base = declarative_base()

###############################################################################



class Artist(Base):

    __tablename__ = 'artist'

    id = Column(Integer, primary_key = True)
    name = Column(String(80), nullable = False)
    website = Column(String(50))
    about = Column(String(500))
    shirts = relationship('Shirt')
    votes = relationship('Vote')


class Shirt(Base):

    __tablename__ = 'shirt'

    id = Column(Integer, primary_key = True)
    thumbPath = Column(String(250), nullable = False)
    imgPath = Column(String(250), nullable = False)
    artist_id = Column(Integer, ForeignKey('artist.id'))


class Vote(Base):

    __tablename__ = 'vote'

    id = Column(Integer, primary_key = True)
    ip = Column(String(15), nullable = False)
    timestamp = Column(TIMESTAMP, server_default=text('CURRENT_TIMESTAMP'))
    artist_id = Column(Integer, ForeignKey('artist.id'))



###############################################################################

engine = create_engine('mysql+mysqldb://rio450:promo-450@rio450.mysql.uhserver.com/rio450')
Base.metadata.create_all(engine)
