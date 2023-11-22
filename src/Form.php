<?php
$results=false;
$errors=[];

if (
    isset($_POST['brand']) && 
    isset($_POST['movement']) && 
    isset($_POST['dial_colour']) &&
    isset($_POST['model_name'])
) 
{ 
    $brand = $_POST['brand'];
    $movement = $_POST['movement'];
    $dial_colour = $_POST['dial_colour'];
    $model_name = $_POST['model_name'];

    if (empty($brand)) {
        $errors['brand'] = '*Brand name is required!';
    }
    if (empty($movement)) {
        $errors['movement'] = '*Movement type is required!';
    }
    if (empty($dial_colour)) {
        $errors['dial_colour'] = '*Dial colour is required!';
    }
    if (empty($model_name)) {
        $errors['model_name'] = '*Model name is required!';
    }
    if (empty($errors)) 
    {
    $db = new PDO('mysql:host=db; dbname=watch_collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

    $query = $db->prepare('SELECT `id` FROM `type` WHERE `movement` = ?;');
    $query->execute([$movement]);
    $new_watch= $query->fetch();

    $query = $db->prepare(
        'INSERT INTO `watch` 
            (`brand`, `model_name`, `dial_colour`, `watch_type`)
            VALUES (:brand, :model_name, :dial_colour, :watch_type);'
        );
        
    $results =  $query->execute([
        ':brand' => $brand,
        ':dial_colour' => $dial_colour,
        ':watch_type' => $new_watch['id'],
        ':model_name' => $model_name,
    ]);
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/normalize.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,100;1,300;1,400&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/icon.webp">
    <title>Add new watch</title>
</head>

<body class="add_watch">
    <section class="watch-form">
        <h1 class="watch-heading">
            Add new watch!
        </h1>
        <section id="form-section" class="form-section">
            <form action="form.php" method="POST">
                <label>Brand name: </label>
                <input class="brand_name" type="text" name="brand" value="<?php echo ($_POST['brand'] ?? '')?>">
                <div class="error"><?php echo $errors['brand'] ?? ''?></div>
                <label>Movement type: </label>
                <select name="movement" id="movement" value="<?php echo ($_POST['movement'] ?? '')?>">
                    <option></option>
                    <option>Automatic</option>
                    <option>Quartz</option>
                    <option>Solar</option>
                    <option>Mechanical</option>
                </select>
                <div class="error"><?php echo $errors['movement'] ?? '' ?></div>
                <label>Dial colour: </label>
                <input type="text"  name="dial_colour" value="<?php echo ($_POST['dial_colour'] ?? '')?>">
                <div class="error"><?php echo $errors['dial_colour'] ?? '' ?></div>
                <label>Model name: </label>
                <input type="model"  name="model_name" value="<?php echo ($_POST['model_name'] ?? '')?>">
                <div class="error"><?php echo $errors['model_name'] ?? '' ?></div>
                <input class="button" type="submit" name="submit" value="Add">
                
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $results) : ?>
                    <div class="success-message">New watch added!<br>
                        <a href="../index.php" class="button">Home page</a>
                    </div>
                <?php endif; ?>
            </form>
        </section>
    </section>
</body>
</html>