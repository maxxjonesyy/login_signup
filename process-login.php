<?php 

require_once('config.php');

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    try {
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['password'])) {
            $_SESSION['logged_in'] = $username;
            header('Location: home.php');
            } else {
                $errors['wrongpassword'] = 'Password is incorrect';
            }
        } else {
            $errors['wrongusername'] = 'Username does not exist';
        }

    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
}