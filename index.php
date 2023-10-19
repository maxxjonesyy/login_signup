<?php require_once('process-signup.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="global.css">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <title>Signup</title>
</head>
<body>

    <div class="container">
        <form action="<?php htmlspecialchars('process-signup.php') ?>" method="POST">
            <h1>Signup</h1>

            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <?php if (isset($errors['username'])) { echo '<p class="error">' . $errors['username'] . '</p>'; } ?>
                <?php if (isset($errors['usernamelength'])) { echo '<p class="error">' . $errors['usernamelength'] . '</p>'; } ?>
                <?php if (isset($errors['usernameduplicate'])) { echo '<p class="error">' . $errors['usernameduplicate'] . '</p>'; } ?>
            </div>
            
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <?php if (isset($errors['passwordlength'])) { echo '<p class="error">' . $errors['passwordlength'] . '</p>'; } ?>
            </div>

            <div>
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword">
                <?php if (isset($errors['passwordmatch'])) { echo '<p class="error">' . $errors['passwordmatch'] . '</p>'; } ?>
            </div>

            <button type="button" id="show-password"><i class="fa-solid fa-eye" id="eye"></i>Password</button>
            <button type="submit">Signup</button>

            <div class="bottom-div">
                <span>Already have an account?</span>
                <a href="login.php">Login</a>
            </div>
        </form>
    </div>

    <script>
        const showPassword =  document.getElementById('show-password');
        const password = document.getElementById('password');
        const cpassword = document.getElementById('cpassword');

        showPassword.addEventListener('click', function() {
            if(password.type === 'password' && cpassword.type === 'password') {
                password.type = 'text';
                cpassword.type = 'text';
            } else {
                password.type = 'password';
                cpassword.type = 'password';
            }
        })
    </script>

</body>
</html>