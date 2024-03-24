<?php
require_once "./DbConnection.php"; 
class Registration
{
    public static function register(string $username, string $password): void
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $db = DbConnection::connect();
        $stmt = $db->prepare('INSERT INTO test (username, password) VALUES (:username, :password)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        $stmt->execute();

        echo 'Thanks for registration';
    }
}