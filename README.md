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

Modifica las vistas que están en: src/views/pages estas son las páginas de tu aplicación.
También modifica los layout, puedes crear un menú para tus páginas modificando el archivo src/views/layouts/menuLayout.php, este menú se verá en cada una de las páginas que tu hagas.

Cómo agregar páginas:
1. Crea una vista: Crea un documento en src/views/pages/ de tipo .php con el nombre que quieras. 
Ejemplo: ejemplo.php
2. Agrega el controlador de la vista: Crea una nueva función dentro del archivo src/controllers/PagesController.php, puedes basarte de la función home(). Recuerda que dentro de esa función vas a llamar a tu vista, revisar si la persona tiene los permisos para ver la página o agregar archivos de scripts o estilos. 
Ejemplo:
```php
public static function ejemplo() {
    self::checkSession(); //OPCIONAL. Revisar si hay una sesión activa, sino, redirige al login
    self::pageScript('ejemplo'); //OPCIONAL. De esta manera agregas un script para tu vista, debes crear ese archivo dentro de assets/js/pages/
    self::pageStyle('ejemplo'); //OPCIONAL. De esta manera agregas una hoja de estilo para tu vista, debes crear ese archivo dentro de assets/css/pages/
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

## Modificaciones opcionales

### VERSION
Puedes modificar la constante VERSION en tu entorno local para ver los cambios JS y CSS en tiempo real de esta forma:
Opción 1: Modificando el número de la constante cada vez que tus cambios no se vean:
```php
define("VERSION", "0.1.2");
```
Opción 2: Agregando la fecha y hora actual:
```php
define("VERSION", DATETIME);
```

### LOADING
Para modificar el color o estilo del loading ve al archivo assets/css/theme.css y modifica la clase .loader

### MENSAJES
Puedes modificar los estilos de los mensajes de éxito/error en el archivo assets/css/theme.css dentro de la clase .message en sus clases hijas:
```css
.message.error {
  color:red; /*Agrega estilos para los mensajes de error*/
}
.message.success {
  color: green; /*Agrega estilos para los mensajes de éxito*/
}
.message.info {
  color:blue; /*Agrega estilos para los mensajes de información*/
}
```

<3