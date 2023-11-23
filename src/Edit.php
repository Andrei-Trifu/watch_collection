<?php
include './WatchModel.php';

$db = new PDO('mysql:host=db; dbname=watch_collection', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$watch = new WatchModel($db);
$errors = [];
$success_message = '';

$watch_id = isset($_POST['watch_id']) ? $_POST['watch_id'] : '';

if ($watch_id) {
    $watches = $watch->getAllWatches(0, $watch_id);

    if (!empty($watches)) {
        $brand = $watches[0]->brand;
        $movement = $watches[0]->watch_type;
        $dial_colour = $watches[0]->dial_colour;
        $model_name = $watches[0]->model_name;
    }
}

if (isset($_POST['submit'])) {

    if (isset($_POST['brand']) && isset($_POST['movement']) && isset($_POST['dial_colour']) && isset($_POST['model_name'])) {
       
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

        if(empty($errors)){
            $watch->editWatch($watch_id, $brand, $dial_colour, $model_name, $movement);
            $success_message = 'The watch has been edited!';
        }
        
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
    <title>Edit info</title>
</head>

<body class="add_watch">
    <section class="watch-form">
        <h1 class="watch-heading">
          Edit watch info
        </h1>
        <section id="form-section" class="form-section">
            <form action="edit.php" method="POST">
                <input type='hidden' name='watch_id' value='<?php echo ($watch_id ?? '')?>'>    
                <label>Brand name: </label>
                <input class="brand_name" type="text" name="brand" value="<?php echo ($brand ?? '')?>">
                <div class="error"><?php echo $errors['brand'] ?? ''?></div>
                <label>Movement type: </label>
                <select name="movement" id="movement">
                    <option value="Automatic" <?php echo ($movement === 'Automatic') ? 'selected' : ''; ?>>Automatic</option>
                    <option value="Quartz" <?php echo ($movement === 'Quartz') ? 'selected' : ''; ?>>Quartz</option>
                    <option value="Solar" <?php echo ($movement === 'Solar') ? 'selected' : ''; ?>>Solar</option>
                    <option value="Mechanical" <?php echo ($movement === 'Mechanical') ? 'selected' : ''; ?>>Mechanical</option>
                </select>
                <div class="error"><?php echo $errors['movement'] ?? '' ?></div>
                <label>Dial colour: </label>
                <input type="text"  name="dial_colour" value="<?php echo ($dial_colour ?? '')?>">
                <div class="error"><?php echo $errors['dial_colour'] ?? '' ?></div>
                <label>Model name: </label>
                <input type="model"  name="model_name" value="<?php echo ($model_name ?? '')?>">
                <div class="error"><?php echo $errors['model_name'] ?? '' ?></div>
                <input class="button" type="submit" name="submit" value="Edit">
    
                <div class="success-message"><?php echo $success_message ?></div>
                <div>
                    <a href="../index.php" class="button">Home page</a>
                </div>
            </form>
        </section>
    </section>
</body>
</html>