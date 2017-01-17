<?php 
   
define('DEFAULT_CONTROLLER', 'index'); //controlador por defecto de la aplicación en caso de no enviarse en aplicación.
define('DEFAULT_METODO', 'index');

define('BASE_URL', 'http://plantilla_mvc.net/'); //CONSTANTE PARA INCLUIR ARCHIVOS DEL LADO DEL USUARIO, DEL LADO DE LAS VISTAS

//define('DEFAULT_LAYOUT', 'default');
//define('DEFAULT_LAYOUT', 'layout1');
define('DEFAULT_LAYOUT', 'twb');
//define('DEFAULT_LAYOUT', 'test');
define('APP_NAME', 'mi framework');
define('APP_SLOGAN', 'mi primer fr php mvc');
define('APP_COMPANY', 'dlancedu.com');

//parametros para base de datos:
    define('DB_HOST', 'localhost');
    define('DB_USER', 'homestead');
    define('DB_PASS', 'secret');
    define('DB_NAME', 'mvc');
    define('DB_CHAR', 'utf8');
    define('DB_PORT', '33060');

//sesiones
define('SESSION_TIME', 10);

//hash key
define('HASH_KEY', '5806aed8e2552');

//samrty
define('SMARTY_DIR_L', ROOT . 'libs' . DS . 'smarty' . DS .  'libs' . DS); 
define('SMARTY_PRUEBA', '0' ); 
define('USAR_SMARTY', '1');


//widget
define('INCLUIR_WIDGET', '1');