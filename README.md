# FindYourService
FindYourService is a web app that allows consumers to search for services.

An admin can create, edit and delete services from a dashboard. 

Users can visit the public site to search for a service nearby.

# Instalation

You need to have installed Node.js, npm and php.

You also need to get Composer running on your environment,
you can get the instruction in [their site](https://getcomposer.org/doc/00-intro.md)

## Arch Linux

```bash
sudo pacman -S nodejs npm php

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Then you can add $HOME/.config/compose/vendor/bin to you $PATH environment variable.

## Setting up the project

```bash
git clone https://github.com/Pablo1107/FindYourService.git
cd FindYourService
composer update
npm install
npm run dev
```

# Running the web app locally

You can run a local server with artisan.

```bash
php artisan serve
```

Also you can have a watch to automatically compile changes of JS files.

```bash
npm run watch
```
