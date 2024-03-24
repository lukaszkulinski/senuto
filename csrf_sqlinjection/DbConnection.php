<?php

class DbConnection
{
    public static function connect(): PDO
    {
        $mysql_host = 'localhost';
        $username = 'username';
        $password = 'password';
        $database = 'db';
        
        try {
            return new PDO('mysql:host='.$mysql_host.';dbname='.$database, $username, $password );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
