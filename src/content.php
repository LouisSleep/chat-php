<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'inc/header_tpl.html'; ?>
</head>

<nav class="nav-bar">
<a href="login.php">logout</a>
</nav>


<form class='commentSection' action="" method="POST">
    <div style="box-shadow: 5px 5px 50px 15px rgb(195, 195, 195); width:500px;border-radius:6px;">
        <div style="margin: 5%;">
        <h1 style="font-size:1.5em; font-weight:700;" >Chat public</h1>
        <h1 >Connecté en tant que <?php echo $_SESSION['user']['username'] ?></h1>

        </div>
        <div class='show-message' style="margin:5%;height:350px; box-shadow: inset 2px 2px 15px rgb(195, 195, 195);border-radius:6px;overflow:auto;background-color:white">
            <?php require_once 'inc/comments_function.php' ?>
        </div>

        <div class="section-add-message">
            <textarea style="font-family: 'Poppins-standart';" name="message" id="text-area" cols="60" rows="2" placeholder="Ecrivez quelque chose..."></textarea>
            <button id="sendButton" name='envoyer'>Envoyer</button>
        </div>
        
    </div>
   
</form>



<body>

</body>

</html>