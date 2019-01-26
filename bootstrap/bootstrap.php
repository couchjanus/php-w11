<?php

// Общие настройки

// Устанавливаем временную зону по умолчанию
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');    
}

// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

require_once realpath(__DIR__).'/../config/app.php';

require_once CORE.'Session.php';
require_once CORE.'Helper.php';
require_once CORE.'View.php';
require_once CORE.'Slug.php';
require_once CORE.'Connection.php';
require_once CORE.'Request.php';
require_once CORE.'Router.php';
// require_once CORE.'Validator.php';
require_once CORE.'Controller.php';


// Запускаем сессию
Session::init();

$connection = Connection::connect(require_once DB_CONFIG_FILE);
const ROUTES = CONFIG.'routes'.EXT; 
// Router::init(ROUTES)->direct(Request::uri());

Router::load(ROUTES)
    ->directPath(Request::uri(), Request::method());