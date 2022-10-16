<?php


require_once 'connexion/pdo.php';
if (isset($_POST['envoyer'])) {
    if (!empty($_POST['message'])) {


        $add_message = $pdo->prepare('INSERT INTO content (content, username,user_id) VALUES (:content, :username,:user_id)');
        $add_message->execute([
            ":content" => filter_input(INPUT_POST, 'message'),
            ":username" => $_SESSION['user']['username'],
            ":user_id" => $_SESSION['user']['id'],
        ]);
    }
}

if (isset($_POST['delete'])) {
    $add_message = $pdo->prepare('DELETE FROM content WHERE ');
}


$fetch_message = $pdo->prepare('SELECT * FROM content');
$fetch_message->execute();

foreach ($fetch_message as $message) {
    if($_SESSION['user']['role']!='admin'){
        if ($message['username'] == $_SESSION['user']['username']) {
            echo '<div style="display:flex; justify-content:flex-end; margin:4%"><div style="background-color:blue; color:white; max-width:49%; border-radius:6px; padding:2%"><div style ="font-size:0.9em; font-style:italic;">' . $message['username'] . '</div> <div style="word-break:break-all;">' . $message['content'] . '<div><a href="inc/delete.php?id='.$message['id'].'" name="delete" class="delete-button"><svg viewBox="0 0 32 32" fill=white width=20px height=20px xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><g data-name="Layer 2" id="Layer_2"><path d="M20,29H12a5,5,0,0,1-5-5V12a1,1,0,0,1,2,0V24a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V12a1,1,0,0,1,2,0V24A5,5,0,0,1,20,29Z"/><path d="M26,9H6A1,1,0,0,1,6,7H26a1,1,0,0,1,0,2Z"/><path d="M20,9H12a1,1,0,0,1-1-1V6a3,3,0,0,1,3-3h4a3,3,0,0,1,3,3V8A1,1,0,0,1,20,9ZM13,7h6V6a1,1,0,0,0-1-1H14a1,1,0,0,0-1,1Z"/><path d="M14,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,14,23Z"/><path d="M18,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,18,23Z"/></g><g id="frame"><rect class="cls-1" height="32" width="32"/></g></svg></a></div></div></div></div>';
        } else {
            echo '<div style="display:flex; justify-content:flex-start; margin:4%"><div style="background-color:rgb(210, 210, 210);max-width:49%; word-break:normal; border-radius:6px; color:black;padding:2%"><div style ="font-size:0.9em; font-style:italic; margin:2%">' . $message['username'] . '</div> <div style="word-break:break-all;">' . $message['content'] . '</div></div></div>';
        }
    }else{
        if ($message['username'] == $_SESSION['user']['username']) {
            echo '<div style="display:flex; justify-content:flex-end; margin:4%"><div style="background-color:blue; color:white; max-width:49%; border-radius:6px; padding:2%"><div style ="font-size:0.9em; font-style:italic;">' . $message['username'] . '</div> <div style="word-break:break-all;">' . $message['content'] . '<div><a href="inc/delete.php?id='.$message['id'].'" name="delete" class="delete-button"><svg viewBox="0 0 32 32" fill=white width=20px height=20px xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><g data-name="Layer 2" id="Layer_2"><path d="M20,29H12a5,5,0,0,1-5-5V12a1,1,0,0,1,2,0V24a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V12a1,1,0,0,1,2,0V24A5,5,0,0,1,20,29Z"/><path d="M26,9H6A1,1,0,0,1,6,7H26a1,1,0,0,1,0,2Z"/><path d="M20,9H12a1,1,0,0,1-1-1V6a3,3,0,0,1,3-3h4a3,3,0,0,1,3,3V8A1,1,0,0,1,20,9ZM13,7h6V6a1,1,0,0,0-1-1H14a1,1,0,0,0-1,1Z"/><path d="M14,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,14,23Z"/><path d="M18,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,18,23Z"/></g><g id="frame"><rect class="cls-1" height="32" width="32"/></g></svg></a></div></div></div></div>';
        } else {
            echo '<div style="display:flex; justify-content:flex-start; margin:4%"><div style="background-color:rgb(210, 210, 210);max-width:49%; word-break:normal; border-radius:6px; color:black;padding:2%"><div style ="font-size:0.9em; font-style:italic; margin:2%">' . $message['username'] . '</div> <div style="word-break:break-all;">' . $message['content'] . '<div><a href="inc/delete.php?id='.$message['id'].'" name="delete" class="delete-button"><svg viewBox="0 0 32 32" fill=black width=20px height=20px xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><g data-name="Layer 2" id="Layer_2"><path d="M20,29H12a5,5,0,0,1-5-5V12a1,1,0,0,1,2,0V24a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V12a1,1,0,0,1,2,0V24A5,5,0,0,1,20,29Z"/><path d="M26,9H6A1,1,0,0,1,6,7H26a1,1,0,0,1,0,2Z"/><path d="M20,9H12a1,1,0,0,1-1-1V6a3,3,0,0,1,3-3h4a3,3,0,0,1,3,3V8A1,1,0,0,1,20,9ZM13,7h6V6a1,1,0,0,0-1-1H14a1,1,0,0,0-1,1Z"/><path d="M14,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,14,23Z"/><path d="M18,23a1,1,0,0,1-1-1V15a1,1,0,0,1,2,0v7A1,1,0,0,1,18,23Z"/></g><g id="frame"><rect class="cls-1" height="32" width="32"/></g></svg></a></div></div></div></div>';
        }
    }
    
}
