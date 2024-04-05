# Proyecto Base MVC by Cindyita

Este es un proyecto para que utilices como base para crear tus aplicaciones web php.
Contiene la estructura MVC, routing con bramus, modelo con conexión a base de datos y funciones para query, páginas base como login, home, error 404, etc. Registro y autenticación con login y JWT, variables de sesión dotENV, mailing SMTP con phpmailer, funciones básicas JS y PHP, constantantes predefinidas, configuración recaptcha ¡Y todo lo que necesitas para tu backend!

## Instalación

1. Clona este repositorio con git clone
2. Instala las dependencias de Composer: `composer install`
3. Instala las dependencias de npm: `npm install`

## Configuración

1. Crea un archivo .env a partir de .env.example y agrega las claves de configuración de la base de datos, email SMTP, claves recaptcha e inventa una clave para KEY_AUTH.
2. Si no existe la carpeta log, creala en la ruta principal.
3. ¡Agrega todas las páginas que quieras y crea un diseño hermoso!

## Uso

Corre el proyecto en un servidor local o entorno de producción.

Agregar páginas:
1. Crea una vista: Crea un documento en src/views/pages/ de tipo .php con el nombre que quieras
Ejemplo: ejemplo.php
2. Agrega el controlador de la vista: Crea una nueva función dentro del archivo src/controllers/PagesController.php, puedes basarte de la función home(). Recuerda que dentro de esa función vas a llamar a tu vista, revisar si la persona tiene los permisos para ver la página o agregar archivos de scripts o estilos
Ejemplo:
```php
public static function ejemplo() {
    self::checkSession(); //Revisar si hay una sesión activa, sino, redirige al login
    self::pageScript('ejemplo'); //De esta manera agregas un script, debes crear ese archivo dentro de assets/js/pages/
    self::pageStyle('ejemplo'); //De esta manera agregas una hoja de estilo, debes crear ese archivo dentro de assets/css/pages/
    require_once "./src/views/pages/ejemplo.php"; //Esta es la llamada a la vista que creaste en el paso 1
}
```
3. Crea la ruta: ve al archivo routes.php y crea la ruta llamando a la función que has creado.
Ejemplo:
```php
$router->get('/ejemplo', 'PagesController@ejemplo'); //También puedes crear apis de esta forma
```
4. Ahora cuándo entres a la página /ejemplo verás la vista que creaste

## Funciones

Para ver las funciones globales de PHP ve a la ruta: /src/resources/functions.php
Para ver las funciones globales de JS ve a la ruta: /assets/js/app.js

Puedes borrar las que no necesites, pero ten cuidado porque algunas están en uso.

<3