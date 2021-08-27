# turkey-earthquake-api

The last 500 earthquakes that occurred in Turkey are shared by KANDİLLİ OBSERVATORY AND EARTHQUAKE RESEARCH INSTITUTE.

The API is used both to make detailed queries (by date, earthquake magnitude, location, etc.) and to add current data to
mysql.

Currently under development.

## Note

I found xml files of old earthquakes at http://udim.koeri.boun.edu.tr/zeqmap link.  
ex: http://udim.koeri.boun.edu.tr/zeqmap/xmlt/202108.xml  
Link list: ./Bot/links.xml  

I wrote a bot that will import this information into the relevant mysql database. (./Bot/*)  
 
FYI


## Requirements

Php >= 8.0.0  
guzzlehttp/guzzle -> İnstalling with composer.

### php extensions

ext-iconv  
ext-pdo  
ext-simplexml

## Installation

Install turkey-earthquake-api with composer.

```bash
  git clone https://github.com/Mrjavaci/turkey-earthquake-api.git
  cd turkey-earthquake-api
  composer install 
```

Import the earthquake.sql file in the Assets folder into the mysql database.

## Environment Variables

To run this project, you will need to add the following environment variables (Const) to your config.php file.

Or copy and change config-example.php file.

`Url` -> KANDİLLİ OBSERVATORY AND EARTHQUAKE RESEARCH INSTITUTE url.   (string)

`DB_host` -> Mysql database host.  (string)

`DB_name` -> Mysql database name.  (string)

`DB_user` -> Mysql database user. (string)

`DB_pass` -> Mysql database password.  (string)

`OnApiRequestCheckNewData` -> Determines whether it saves new data to the database every time api request is called. (
bool)

## Authors

- [@MrJavaci](https://www.github.com/Mrjavaci)

  
