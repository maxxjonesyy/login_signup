<?php 

require_once('process-login.php'); 

if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
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
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <form action="<?php htmlspecialchars('process-login.php') ?>" method="POST">
            <h1>Login</h1>

            <div>
                <?php if(!empty($success_message)) { echo '<p class="success">' . $success_message . '</p>'; } ?>
                <?php if (isset($errors['wrongusername'])) { echo '<p class="error">' . $errors['wrongusername'] . '</p>'; } ?>
                <?php if (isset($errors['wrongpassword'])) { echo '<p class="error">' . $errors['wrongpassword'] . '</p>'; } ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <button type="button" id="show-password"><i class="fa-solid fa-eye" id="eye"></i>Password</button>
            <button type="submit">Login</button>

            <div class="bottom-div">
                <span>Need an account?</span>
                <a href="index.php">Signup</a>
            </div>
        </form>
    </div>

    <script>
        const showPassword =  document.getElementById('show-password');
        const password = document.getElementById('password');

        showPassword.addEventListener('click', function() {
            if(password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        })
    </script>

</body>
</html>