# WTECH E-Shop

Eshop built with Laravel and Postgres.

- [low fidelity mockups](https://www.figma.com/design/aEwQDwwaRpp2uxGbN7WY8G/WTECH-wireframe?node-id=0-1&t=TnCMdlIpoeTeh7sg-1)

## Installation

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

```sh
./vendor/bin/sail up
```