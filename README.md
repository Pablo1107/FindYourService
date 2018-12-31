# FindYourService
FindYourService is a web app that allows consumers to search for services.

An admin can create, edit and delete services from a dashboard. 

Users can visit the public site to search for a service nearby.

# Instalation

You need to have installed Node.js, npm and php.

Arch Linux

```bash
sudo pacman -S nodejs npm php
git clone https://github.com/Pablo1107/FindYourService.git
cd FindYourService
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
