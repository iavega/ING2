# Proyecto Final Ingenieria de Software 2

## Sobre el proyecto
Juego Serio


## Primero pasos
Prerequisitos:

Tener instalado ya sea Xampp o Docker
* [Xampp](https://www.apachefriends.org/es/index.html)
* [Docker](https://www.docker.com/products/docker-desktop)
1. Arrancar proyecto con Xampp

2. Arrancar proyecto con Docker
    * Nos conectamos a la terminal del container, con el siguiente comando:

        `docker exec -it ing_app_1 sh`
    * Ahora instalamos todas las dependencias del proyecto.

        `composer install`
    * Copiamos el archivo `.env.example` esta sera la base de nuestros `.env`

        `cp .env.example .env`
    * Generamos el key de laravel

        `php artisan key:generate`
    * Como ultimo paso corremos las migraciones

        `php artisan migrate`
## Uso
Laravel es un framework basado en MVC(Modelo - Vista - Controlar).
* `Modelos:` estos se encuentran en la ruta `src/app/Models`.
* `Vistas:` estas se encuentran en la ruta `src/resources/views`
* `Controlladores:` estas se encuentran en la ruta `src/app/Http/Controller`

Toda las direcciones accesibles atraves de url se definen en el archivo `web.php` el mismo se encuentra en la ruta `src/routers/web.php`

### Artisan
Artisan es un interzas de linea de comando incluido en laravel, provee comandos utiles para el desarrollo de la aplicación.
* Ejemplos:
    * Crear Modelo:
        * `php artisan make:model $_NAME`
    * Crear un Controller
        * `php artisan make:controller $_NAME`
    * Crear un Migration
        * `php artisan make:migration $_NAME`
    * Crear un Modelo y una migración, el `-m` al final es para que tambien cree la migración
        * `php artisan make:model $_NAME -m`
    * Ejecutar las migración
        * `php artisan migrate`
## Mas Documentación
