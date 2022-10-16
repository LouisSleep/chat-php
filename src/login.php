<?php

session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'connexion/pdo.php';
    $request = $pdo->prepare('SELECT * FROM user WHERE username = :username');
    $request->execute([
        ":username" => $username,
    ]);
    $users = $request->fetch();
    if (!empty($username) || !empty($pasword)) {
        if ($users['username'] == $username && password_verify($password, $users['password'])) {
            $_SESSION['user'] = $users;
            header('Location: content.php');
            exit();
        } else {
            echo 'error';
        }
    } else {
        echo 'il manque des infos';
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once 'inc/header_tpl.html'; ?>

</head>

<body>
    <nav>
        <ul class="nav-bar">
            <li>
                <a href="login.php">Sign in</a>
            </li>
            <li>
                <a href="index.php">Create Account</a>
            </li>
        </ul>
    </nav>
    <div class="logForm">
        <form action="" method='POST'>
            <div id="signin-form">
                <h1 class="title-log">Login In</h1>
                <!-- <span style='<?php $error_message ?>'>Mauvais identifiants</span> -->
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name='submit' value="Login">
                <a href="index.php">Need an account ?</a>
            </div>

        </form>

    </div>
</body>

</html>