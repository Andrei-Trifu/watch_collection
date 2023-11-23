<?php

require_once __DIR__ . "/WatchModel.php";
require_once __DIR__ . "/WatchViewHelper.php";


$db = new PDO('mysql:host=db; dbname=watch_collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


if(isset($_POST['watch_id'])) {
    $watch = new WatchModel($db);
    $watch->deleteWatches($_POST['watch_id']);
    $watches = $watch->getAllWatches(1);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,100;1,300;1,400&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.webp">
    <title>Deleted watches</title>
</head>
<body>
  <section>
        <h1 class="watch-heading">
             Deleted watches!
         </h1>

         <section class="watch-collection">
            <?php
                echo WatchViewHelper::displayDeletedWatches($watches);
            ?>
        </section>

        <div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
                <div class="home-restore">
                    <a href="../index.php" class="button">Home page</a>
                </div>
            <?php endif; ?>
        </div>
  </section>
</body>
</html>









