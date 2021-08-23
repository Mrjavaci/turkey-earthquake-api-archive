# turkey-earthquake-api

The last 500 earthquakes that occurred in Turkey are shared by KANDİLLİ OBSERVATORY AND EARTHQUAKE RESEARCH INSTITUTE.

Unfortunately, there is no API and any area where we can see before the last 500 earthquakes.

The API is used both to make detailed queries (by date, earthquake magnitude, location, etc.) and to add current data to mysql.

Currently under development.

## Requirements

Php >= 8.0.0  
guzzlehttp/guzzle -> İnstalling with composer.

### php extensions

ext-iconv  
ext-pdo


## Installation

Install turkey-earthquake-api with composer.

```bash
  git clone https://github.com/Mrjavaci/turkey-earthquake-api.git
  cd turkey-earthquake-api
  composer install 
```


## Environment Variables

To run this project, you will need to add the following environment variables (Const) to your config.php file.  

Or copy and change config-example.php file.

`Url` -> KANDİLLİ OBSERVATORY AND EARTHQUAKE RESEARCH INSTITUTE url.   (string)

`DB_host` -> Mysql database host.  (string)

`DB_name` -> Mysql database name.  (string)

`DB_user` -> Mysql database user. (string) 

`DB_pass` -> Mysql database password.  (string)

`OnApiRequestCheckNewData` -> Determines whether it saves new data to the database every time api request is called. (bool)
  
  
## Authors

- [@MrJavaci](https://www.github.com/Mrjavaci)

  
