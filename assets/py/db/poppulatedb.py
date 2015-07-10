
from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from database_setup import Base, Artist, Shirt, Vote

engine = create_engine('mysql+mysqldb://rio450:promo-450@rio450.mysql.uhserver.com/rio450')
Base.metadata.bind=engine
DBSession = sessionmaker(bind = engine)
session = DBSession()


name= "Joao"
website = "www.joao.com.br"
about = "release joao"
imgPath = "assets/imgs/sunset.jpg"
thumbnailPath = "assets/imgs/thumbnails/sunset_thumbnail.jpg"
numberOfArtists = 12
i = 1

while (i <= 12):
    artist = Artist(name = name, website = website, about = about)
    session.add(artist)
    shirt = Shirt(thumbPath = thumbnailPath, imgPath = imgPath, artist_id = i)
    session.add(shirt)
    vote = Vote(artist_id = i)
    session.add(vote)
    i += 1

session.commit()
