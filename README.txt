Aqui esta todo el codigo del proyecto hasta el final, el modo debug esta desactivado y el modulo devel desinstalado.

Para iniciarlo deberis seguir los pasos vistos en la seccion de "Preparando nuestro local" para colocarlo en algun lado dentro de C:\xampp\htdocs si habeis instalado xampp en esa ruta y configurar un virtual host como se ve en el video "Configurar el virtual host".

Una vez realizado eso, abris la consola (powershell en windows) y vais a donde hayais puesto el proyecto (por ejemplo C:\xampp\htdocs\drupal) con el comando:

cd C:\xampp\htdocs\drupal

y una vez dentro, si estais en la misma carpeta que contiene el archivo composer.json y composer.lock, debeis ejecutar el siguiente comando en la consola:

composer install

Eso descargara todo Drupal y sus dependencias.

Como base de datos teneis que utilizar el archivo drupal.sql, el cual podeis importar utilizando phpmyadmin, el cual vimos en el video "Crear la base de datos".

Si la base de datos no se llama "drupal", y el usuario no es "root" y sin contraseña, debeis modificar los datos de acceso a la base de datos en el archivo /web/sites/default/settings.php y buscar lo siguiente:

$databases['default']['default'] = [
  'database' => 'drupal',
  'username' => 'root'),
  'password' => '',
  'prefix' => '',
  'host' => localhost,
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
];

Y reemplazar los valores de "database", "username" y "password" por los que necesiteis.

Una vez hecho todo eso, podeis acceder al proyecto con los siguientes datos:

Usuario: admin
Contraseña: admin