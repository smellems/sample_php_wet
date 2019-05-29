# Application vide PCH, MySQL et WET-BOEW

## Développement

### Base de données

`docker run --name sample-php-db -v sample-php-db-data:/var/lib/mysql -e MYSQL_DATABASE=sample-php -e MYSQL_USER=sample-php -e MYSQL_PASSWORD=password -e MYSQL_ROOT_PASSWORD=root_password -d mysql:5`

### Application Web (Dockerfile)

`docker build -t sample-php .`

`docker run --name sample-php-web --link sample-php-db:mysql -p 80:80 -v $(pwd):/var/www/html -d sample-php`
