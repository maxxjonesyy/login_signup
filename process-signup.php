<?php

require_once('config.php');

$errors = [];

$username;
$password;
$password_hash;
$cpassword;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $cpassword = $_POST['cpassword'];

    if (empty($username)) {
        $errors['username'] = 'Username is required';
    }
    
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $errors['usernameregex'] = 'Usernames can only contain letters, numbers, and underscores';
    }
        
    if (strlen($username) > 24) {
        $errors['usernamelength'] = 'Username must be less than 24 characters';
    }
        
    if (strlen($password < 8)) {
        $errors['passwordlength'] = 'Password must have atleast 8 characters';
    }
        
    if ($password !== $cpassword) {
        $errors['passwordmatch'] = 'Passwords must match';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password_hash);

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        if ($e->errorInfo[0] ==='23000') {
            $errors['usernameduplicate'] = 'Username is already in use';
        } else {
            echo 'Error:' . $e->getMessage();
        }
    }
    
}