# Selling-Website-SP_04

## Installation

```bash
composer install
```
### Create a new database and add your database credentials to your .env file:

```bash
cp .env.example .env
```
```bash
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

```bash
php artisan key:generate
```

### Run install voyager admin

```bash
php artisan voyager:install
```

### Import .sql file

```bash
mysql -u username -p database_name < file.sql
```
It is better to use the full path of the SQL file file.sql.
