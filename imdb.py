import re
import urllib.request,urllib.parse,urllib.error,urllib.parse
from bs4 import BeautifulSoup

import ssl
#import pandas as pd
import pymysql

#Certification
ctx=ssl.create_default_context()
ctx.check_hostname=False
ctx.verify_mode=ssl.CERT_NONE

show_name=[]
show_rate=[]
page_link=[]

url="https://www.imdb.com/chart/toptv/?ref_=nv_tvv_250"
html=urllib.request.urlopen(url,context=ctx).read()
soup=BeautifulSoup(html,'html.parser')



    #rating
    #ratingValue = soup.find("span", {"itemprop" : "ratingValue"})
    #shows["ratingValue"] = ratingValue.string

    #no of rating given
    #ratingCount = soup.find("span", {"itemprop" : "ratingCount"})
    #shows["ratingCount"] = ratingCount.string

    #name
titleName = soup.find_all("td",{'class':'titleColumn'})
ratings=soup.find_all("td",{'class':'imdbRating'})
row=soup.find_all("td",{'class':'titleColumn'})



for i in ratings:
    rating=i.find('strong').text
    show_rate.append(rating)
for title in titleName:
    names=title.find('a').text
    show_name.append(names)
for i in row:
    tag=i.find('a')
    link=tag.get('href');
    page_link.append(urllib.parse.urljoin(url,link))

db = pymysql.connect(host="localhost",
user="meenu",
passwd="ms238",
database="imdb")

cur=db.cursor()

sql='''INSERT INTO chart(title,rating,link) VALUES (%s,%s,%s)'''


#data = {'Title':  show_name,
#        'Imdb rating': show_rate
#        }

#df = pd.DataFrame (data, columns = ['Title','Imdb rating'])


for i in range(250):
    title=show_name[i]
    rating=show_rate[i]
    link_show=page_link[i]
    cur.execute(sql,(title,rating,link_show))
    db.commit()
db.close()