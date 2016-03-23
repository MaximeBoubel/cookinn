<?php

class Connection {

    private static $connection = false;
    private static $host       = "localhost";
    private static $dbname     = "cookinn";
    private static $user       = "admin";
    private static $pwd        = "admin";

    /**
     * Get the connection to the database
     */
    public static function get()
    {
        if (self::$connection == false) {
            
            try {
                self::$connection = new PDO ( 'mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$pwd, array (
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                        PDO::ATTR_CASE => 'SET lc_time_names = \'de_DE\'',
                        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                ) );
                
                return self::$connection;
            } catch(Exception $e) {
                echo "erreur de connexion : " . $e->getMessage();
            }

        } else
            return self::$connection;

    }
}