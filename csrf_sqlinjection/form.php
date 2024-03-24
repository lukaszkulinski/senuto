<?php 

require_once "./CsrfToken.php"; 

session_start();
$_SESSION['csrf_token'] = CsrfToken::generate();

if ($_GET['invalid'] === 'true') {
    echo ('invalid csrf token');
}
?>
<h4>Register</h4>
<form action="./handlerequest.php" method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
    <button type="submit">Register</button>
</form>