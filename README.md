# composerをインストールしておいてください
```
brew install composer
```
# install Laravel sail
```
composer require laravel/sail --dev
```
# create .env
```
cp .env.example .env
```

# build docker containers
```
docker-compose build
```

# start docker up by using sail up coomand
```
./vendor/bin/sail up
```

# migrate
```
./vendor/bin/sail artisan migrate
```
# add seeders
```
./vendor/bin/sail artisan db:seed
```
# test commands
``` 
// sanctum tokenを作る
curl -X POST -d "email=testuser@example.com&password=password"  http://localhost/api/tokens/create | jq
// get users
curl http://localhost/api/users | jq
// get one user
curl http://localhost/api/user/1 | jq

```
