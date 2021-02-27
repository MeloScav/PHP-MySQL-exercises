<?php
    // Connection to the database
    require("./database.php");

    // SQL request
    $request = $db->prepare('INSERT INTO comments(new_id, author, comment, comment_date) VALUES(:new_id, :name_author, :comment, NOW())');
    $request->execute(array(
        ':new_id' => $_GET['news'],
        ':name_author' => $_POST['name'],
        ':comment' => $_POST['message']
    ));

    $request->closeCursor();
    $db = null;

    // Redirection to comments.php
    $redirection = 'Location: comments.php?news=' . $_GET['news'];
    header($redirection);
?>