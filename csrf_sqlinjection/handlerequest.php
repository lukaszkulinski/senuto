<?php 

require_once "./CsrfToken.php"; 
require_once "./Registration.php"; 
session_start();

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    header('Location: ./form.php?invalid=true');
} else {
    Registration::register($_POST['username'], $_POST['password']);
}
?>