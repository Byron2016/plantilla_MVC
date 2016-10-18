<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);

try {
	
require_once APP_PATH . 'Config.php';
require_once APP_PATH . 'Request.php';
require_once APP_PATH . 'Bootstrap.php';
require_once APP_PATH . 'Controller.php';
require_once APP_PATH . 'Model.php';
require_once APP_PATH . 'View.php';
require_once APP_PATH . 'Registro.php';
require_once APP_PATH . 'DataBase.php';
require_once APP_PATH . 'Session.php';

//echo '<pre>'; print_r(get_required_files());
//echo "\n".'$_GET'."\n"; echo $_GET['url'];

Session::init();

	Bootstrap::run(new Request);

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
