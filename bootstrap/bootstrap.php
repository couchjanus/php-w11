<?php

// use Core\Router;
// use Core\Session;
// use Core\Request;
// use Core\Connection;

use Core\App;
// Общие настройки

// Устанавливаем временную зону по умолчанию
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');    
}

// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

function dd($mix)
{
    echo '<pre>'.print_r($mix, true).'</pre>';
}

require_once realpath(__DIR__).'/../config/app.php';

spl_autoload_register(function($class) {
    $file = ROOT.'/'.str_replace('\\', '/', $class).'.php';
    // $file = CORE.$class.EXT;
    // dd($file);
    if(is_file($file)) {
        require_once $file;
    }
});

// require_once CORE.'Session.php';
// require_once CORE.'Helper.php';
// require_once CORE.'View.php';
// require_once CORE.'Slug.php';
// require_once CORE.'Connection.php';
// require_once CORE.'Request.php';
// require_once CORE.'Router.php';
// // require_once CORE.'Validator.php';
// require_once CORE.'Controller.php';

 

// Запускаем сессию
// Session::init();

// $connection = Connection::connect(require_once DB_CONFIG_FILE);

// // Router::init(ROUTES)->direct(Request::uri());

// Router::load(ROUTES)
//     ->directPath(Request::uri(), Request::method());
// Router::load(ROUTES)
//     ->direct(Request::uri(), Request::method());


$app = new App();
$app->init();
