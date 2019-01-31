<?php
namespace Core;

use PDO;

/**
 * class Connection
 * configuration
 * $connection = Connection::getInstance();
 * $connection->connect('dbname=testing');
 */

class Connection
{
    static private $instance = null;
    
    static public function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
        
    static private $_pdo = null;
    
    const ERROR_UNABLE = 'ERROR: no database connection';
    
    public $pdo;

    public function __construct(array $config)
    {
        if (!isset($config['db']['driver'])) {
            $message = __METHOD__ . ' : ' 
            . self::ERROR_UNABLE . PHP_EOL;
            throw new Exception($message);
        }
        $dsn = $this->makeDsn($config['db']);        
        try {
            $this->pdo = new PDO(
                $dsn, 
                $config['user'], 
                $config['password'], 
                [
                    PDO::ATTR_ERRMODE => $config['errmode']
                ]
            );
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public static function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        
        foreach ($config as $key => $value) {
                $dsn .= $key . '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }

    static public function connect($config)
    {
        $dsn = self::makeDsn($config['db']);
       
        try {
            return self::$_pdo = new PDO($dsn, $config['user'], $config['password'], $config['options']);
        } catch (PDOException $e) {
            error_log($e->getMessage);
            file_put_contents(LOGS.'PDOErrors.log', $e->getMessage(), FILE_APPEND);
        }
    }
    
    static public function query($query)
    {
        return self::$_pdo->query($query);
    }
    
    static public function prepare($sql)
    {
        return self::$_pdo->prepare($sql);
    }    
}
