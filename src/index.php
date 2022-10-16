<?php


$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$role = filter_input(INPUT_POST, 'role_select');
include 'connexion/pdo.php';
if (isset($_POST['submit'])) {
    if (!empty($username) && !empty($password)) {
        $passwordhached = password_hash($password, PASSWORD_DEFAULT);
        $request = $pdo->prepare('INSERT INTO user (username,role, password) VALUES (:username,:role,:password)');
        $request->execute([
            ":username" => $username,
            "role" => $role,
            ":password" => $passwordhached,
        ]);

        
        header('Location: login.php');
        exit();
    } else {
        header("Location: $_SERVER[HTTP_REFERER]");
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'inc/header_tpl.html'; ?>
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
            <div id="login-form">
                <h1 class="title-log">Sign Up</h1>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name='submit' value="Login">
                <select name="role_select" id="role_selector">
                    <option value="admin">Admin</option>
                    <option value="standart">Standart</option>
                </select>
                <a href='login.php'>Already registered</a>
            </div>
        </form>
    </div>
</body>

</html>