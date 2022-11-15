# Frameworkless-api

## To launch

```
composer install
docker-compose up -d
curl --location --request GET '127.0.0.1:8081/users'
```


## Routes

GET users: 
```
curl --location --request GET '127.0.0.1:8081/users'
```

POST users:
```
curl --location --request POST '127.0.0.1:8081/users' \
--form 'username="baz"' \
--form 'role="customer"'
```

Not existing routes
```
curl --location --request GET '127.0.0.1:8081/notExistingRoute'
```