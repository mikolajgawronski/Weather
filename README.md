# Weather

This project was made as an recruitment task for [Ideo](https://www.ideo.pl/).
It's an simple app that allows the user to add a city of their choice and check the weather in that city.

The App also updates it's weather database once every thirty minutes. All data from the API is saved into a MySQL database.

## Installation
### 1. Create `.env` file based on `.env.example`:
Linux:
```shell script
cp .env.example .env
```
Windows:
```shell script
copy .env.example .env
```
### 2. Run containers:
```shell script
docker-compose up -d
```
or
```shell script
./vendor/bin/sail up
```

### 3. Enter the container:
```shell script
docker exec -it weather_laravel.test_1 /bin/bash
```

### 4. Fetch dependencies:
```shell script
composer install
```

### 5. Generate application key:
```shell script
 php artisan key:generate
```

### 6. Run migrations:
```shell script
 php artisan migrate --seed
```
### 7. Now you can access the app here:
http://localhost/

## Author:
- [Mikołaj Gawroński](https://github.com/mikolajgawronski)
