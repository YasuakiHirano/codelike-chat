![screenshot](https://i.gyazo.com/3859cec950977315b89f2d64553c34f6.png)
## codelike-chat
Laravel (laravel-websockets) + Vue simple web chat

## install 
clone repository.

```shell
$ git clone https://github.com/YasuakiHirano/codelike-chat.git
```
## service up

Go to the directory and start.

```shell
$ cd codelike-chat
$ docker-compose -f .codelike_chat/docker-compose.yml up -d
```

## service settings
The following is required as the initial setting after startup.

```shell
$ docker-compose -f .codelike_chat/docker-compose.yml exec php /bin/bash
```

Install the package with composer.

```shell
# cd codelike-chat/
# composer install
```

Create a Laravel config file.

```shell
# cp .env.example .env
```

Install and build the frontend package.

```shell
# npm install
# npm run dev
```

Create a DB.

Go to http://localhost:8888/ and create a database with the name `codelike_chat`.

Perform a Laravel migration to start the websocket server.

```shell
# php artisan migrate
# php artisan key:generate
# php artisan websockets:serve
```
