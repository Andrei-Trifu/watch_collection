<?php

require_once 'src/WatchModel.php';
require_once 'src/WatchViewHelper.php';

$db = new PDO('mysql:host=db; dbname=watch_collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$watch = new WatchModel($db);

if(isset($_POST['watch_id'])) {
    $watch->restoreWatches($_POST['watch_id']);
}
    
$watches = $watch->getAllWatches();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/normalize.css">
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,100;1,300;1,400&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.webp">
    <title>Watch collection</title>

</head>
<body>
    <section class="watch-section">
        <h1 class="watch-heading">Watch collection</h1>
        <div class="watch">
            <img class="main-img" src="./img/Main.jpeg" alt="watch">
        </div>
        <div class="more-watches">
            <p class="add_button">Click here to add a new watch to the collection</p>
            <a href="src/Form.php" class="button"><span>Add</span></a>
            <a href="src/Delete.php" class="button"><span>Deleted</span></a>
        </div>
    </section>
   
    <section class="watch-collection">
        <?php
            echo WatchViewHelper::displayAllWatches($watches);
        ?>
    </section>
</body>
</html>
    

