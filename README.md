# Simple E-Commerce WordPress Site

TODO

## Export Database
```
docker exec nicolewp_db_1 sh -c 'exec mysqldump --all-databases -uroot -p"$MYSQL_ROOT_PASSWORD"' > database.sql
```

## Import Database
```
docker exec -i nicolewp_db_1 sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD" wordpress' < database.sql
```
