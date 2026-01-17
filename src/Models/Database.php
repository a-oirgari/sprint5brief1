<?php

class Database
{
    private static $instance = null;
    private static $config;

    private function __construct() {}
    
    private function __clone() {}
    
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::loadConfig();
            self::connect();
        }
        
        return self::$instance;
    }

    private static function loadConfig()
    {
        $configPath = __DIR__ . '/../../config/database.php';
        
        if (!file_exists($configPath)) {
            throw new Exception("Configuration file not found");
        }
        
        self::$config = require $configPath;
    }

    private static function connect()
    {
        try {
            $dsn = sprintf(
                "mysql:host=%s;dbname=%s;charset=%s",
                self::$config['host'],
                self::$config['dbname'],
                self::$config['charset']
            );

            self::$instance = new PDO(
                $dsn,
                self::$config['username'],
                self::$config['password'],
                self::$config['options']
            );
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            throw new PDOException("Erreur de connexion à la base de données");
        }
    }

    public static function closeConnection()
    {
        self::$instance = null;
    }
}