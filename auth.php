<?php

require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/utils/JWT.php';

$userModel = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'register') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($userModel->register($username, $email, $password)) {
            echo "Kayıt başarılı!";
        } else {
            echo "Kayıt başarısız!";
        }
    }

    if ($action === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $userModel->login($username, $password);
        if ($user) {
            $token = JWT::generateToken(['id' => $user['id'], 'username' => $user['username']]);
            echo "Giriş başarılı! Token: " . $token;
        } else {
            echo "Giriş başarısız!";
        }
    }
}
?>
