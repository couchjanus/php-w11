<?php
  
    // define('ROOT', realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR));

    define('ROOT', dirname(__DIR__));
    const APP = ROOT.'/App';
    const CORE = ROOT.'/Core/';

    const VIEWS = ROOT.'/App/Views/';
    const CONTROLLERS = ROOT.'/App/Controllers/';
    const MODELS = ROOT.'/App/Models/';
    const CONFIG = ROOT.'/config/';
   
    const EXT = '.php';
    
    const ROUTES = CONFIG.'routes'.EXT;

    const APPNAME = 'Great Shopaholic';
    const SLOGAN = 'Lets Build Cool Site';

    define('DB', ROOT.'/db/');

    const DRIVER = 'mysql';
    const HOST = 'localhost';
    const DBASE   = 'store';
    const USER = 'root';
    const PASSWORD = 'ghbdtn';
    const CHARSET = 'utf8mb4';

    define('DB_CONFIG_FILE', CONFIG.'db.php');
    define('LOGS', ROOT.'/logs/');

    const SESSION_PREFIX = 'shop_';