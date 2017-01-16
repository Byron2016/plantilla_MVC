<?php
//ini_set('display_errors',1);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);
//echo ROOT; exit;
//phpinfo();exit;

//echo md5('1234'); exit;
//81dc9bdb52d04dc20036dbd8313ed055
//echo uniqid();exit; //5806aed8e2552

//cracqueo md5
/*
generar md5 en pagina: http://md5.gromweb.com/
se ingresa el md5 a reverar: 81dc9bdb52d04dc20036dbd8313ed055
devuelve 1234
*/


try {

require_once APP_PATH . 'Config.php';

//function __autoload($class){ include APP_PATH . $class . '.php';;}

require_once APP_PATH . 'Autoload.php';

/*
require_once APP_PATH . 'Acl.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';

require_once APP_PATH . 'DataBase.php';
require_once APP_PATH . 'Session.php';
require_once APP_PATH . 'Hash.php';
require_once APP_PATH . 'Registry.php'; //al final para que pueda acceder a todas las clases
*/
//echo Hash::getHash('sha1','1234', HASH_KEY); exit; //testearlo con md5 reverse para ver si devuelve 1234.
//sha1: f554564b63bfebedb20dab6c1e81132a44580761

//echo '<pre>'; print_r(get_required_files());
//echo "\n".'$_GET'."\n"; echo $_GET['url'];
//echo "\n".'$_GET'."\n"; var_dump($_GET);
//exit;

Session::init();

//request
$registry = Registry::getInstancia();
$registry->_request = new Request();
//base de datos
$registry->_db = new Database(DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASS, DB_CHAR);
//acl
$registry->_acl = new ACL();

	//Bootstrap::run(new Request); //22
	Bootstrap::run($registry->_request); //22

} catch(Exception $e) {
	echo $e->getMessage();
}

exit();
echo '<br>';
echo 'usando SERVER1 ' . $_SERVER['REQUEST_URI'] . '<br>';
echo $_GET['url'];

//phpinfo();
//exit();
echo "\n".'$_GET'."\n"; var_dump($_GET);
echo  '<br>';
echo '<pre>';
echo "\n".'$GLOBALS'."\n"; var_dump($GLOBALS);
echo "\n".'$_SERVER'."\n"; var_dump($_SERVER);
echo "\n".'$_GET'."\n"; var_dump($_GET);
echo "\n".'$_POST'."\n"; var_dump($_POST);
echo "\n".'$_FILES'."\n"; var_dump($_FILES);
echo "\n".'$_REQUEST'."\n"; var_dump($_REQUEST);
echo "\n".'$_SESSION'."\n"; var_dump($_SESSION);
echo "\n".'$_ENV'."\n"; var_dump($_ENV);
echo "\n".'$_COOKIE'."\n"; var_dump($_COOKIE);
echo "\n".'$php_errormsg'."\n"; var_dump($php_errormsg);
echo "\n".'$HTTP_RAW_POST_DATA'."\n"; var_dump($HTTP_RAW_POST_DATA);
echo "\n".'$http_response_header'."\n"; var_dump($http_response_header);
echo "\n".'$argc'."\n"; var_dump($argc);
echo "\n".'$argv'."\n"; var_dump($argv);
echo "\n".'$url'."\n"; var_dump($url);
echo '</pre>';
echo 'usando SERVER ' . $_SERVER['QUERY_STRING'] . '<br>';
echo 'usando print_r ' .print_r($_GET,1) . '<br>';
//echo $_GET['url'];
exit();
?>
