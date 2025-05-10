# WTECH E-Shop - Wtech Shoes

## Zadanie

Vytvorte webovú aplikáciu - eshop, ktorá komplexne rieši nižšie definované prípady použitia vo vami zvolenej doméne (napr. elektro, oblečenie, obuv, nábytok). Presný rozsah a konkretizáciu prípadov použitia si dohodnete s vašim vyučujúcim.

## Diagram fyzického dátového modelu

[![data model](./docs/data_model.png)](./docs/data_model.png)


- [low fidelity mockups](https://www.figma.com/design/aEwQDwwaRpp2uxGbN7WY8G/WTECH-wireframe?node-id=0-1&t=TnCMdlIpoeTeh7sg-1)

## Návrhové rozhodnutia

Použili sme Tailwind na zjednodušenie a zjednotenie práce s CSS.

## Programové prostredie

Na lokálny vývoj sme použili **Laravel Sail**. Pre databázu sme použili Postgres a na cache sme použili Redis.

## Strunčný opis implementácie vybraných prípadov použitia

### zmena množstva pre daný produkt

### prihlásenie

### vyhľadávanie

### pridanie produktu do košíka

### stránkovanie

### základné filtrovanie

## snímky obrazoviek

### detail produktu

![Product detail](./docs/screenshots/product-detail.png)

### prihlásenie

![Login](./docs/screenshots/login.png)

### homepage

![Homepage](./docs/screenshots/homepage.png)

### nákupný košík s vloženým produktom

![Cart](./docs/screenshots/cart.png)

## Setup

Instructions for setting up the development environment. **Docker** and **Docker compose** must be installed on the system.

```sh
git clone https://github.com/adam-alberty/wtech
```

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
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
./vendor/bin/sail artisan migrate:refresh
```

Visit `http://localhost:80`
