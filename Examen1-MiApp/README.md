# Proyecto Manaco - Sistema de Inventario

Este proyecto fue desarrollado en Laravel para la empresa X. Permite gestionar productos, usuarios y movimientos de inventario.

## Requisitos

- PHP >= 8.1
- Composer
- PostgreSQL / MySQL
- Node.js y npm (para assets)

## Instalación

```bash
git clone https://github.com/tuusuario/nombre-proyecto.git
cd nombre-proyecto
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
php artisan serve
