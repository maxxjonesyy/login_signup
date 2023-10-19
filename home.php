<?php 
require_once('process-login.php');

if (isset($_SESSION['logged_in'])) {
    $welcome = $_SESSION['logged_in'];
    unset($_SESSION['logged_in']);
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="global.css">
    <title>Home</title>
</head>
<body>

    <div class="container">
        <div class="container-inner">
            <h1><?php echo 'You are logged in as' . ' ' . $welcome; ?></h1>
            <button type="button" id="logout">Logout</button>
        </div>
    </div>

    <script>
        const logoutButton = document.getElementById('logout');

        logoutButton.addEventListener('click', function() {
            window.location.pathname = 'index.php';
        })
    </script>
</body>
</html>