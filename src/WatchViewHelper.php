<?php

class WatchViewHelper
{
    public static function displayAllWatches(array $watches): string
    {  
        $output = '';

        if (empty($watches)) {
            return "<p class='error-message'>No watches to display.</p>";
        }

        foreach ($watches as $watch) {
            $output .= "<div class='watch-card'>";
            $output .= "<p class='watch-brand'>$watch->brand</p>";
            $output .= "<p>Model: $watch->model_name</p><br>";
            $output .= "<p>Dial colour: $watch->dial_colour</p><br>";
            $output .= "<p>Movement: $watch->watch_type</p>";
            $output .= "<section class='form-container'>";
            $output .= "<form method='post' action='src/delete.php'>";
            $output .= "<input type='hidden' name='watch_id' value='$watch->id'>";
            $output .= "<button type='submit' class='delete-button'>Delete</button>";
            $output .= "</form>";
            $output .= "<form method='post' action='src/edit.php'>";
            $output .= "<input type='hidden' name='watch_id' value='$watch->id'>";
            $output .= "<button class='edit-button'>Edit</button>";
            $output .= "</form>";
            $output .="</section>";
            $output .= "</div>";
            }
            
        return $output;
    } 


    public static function displayDeletedWatches(array $watches): string
    {  
        $output = '';

        if (empty($watches)) {
            return "<p class='error-message'>No watches to display.</p>";
        }
        foreach ($watches as $watch) {
            $output .= "<div class='watch-card'>";
            $output .= "<p class='watch-brand'>$watch->brand</p>";
            $output .= "<p>Model: $watch->model_name</p><br>";
            $output .= "<p>Dial colour: $watch->dial_colour</p><br>";
            $output .= "<p>Movement: $watch->watch_type</p>";
            $output .= "<form method='post' action='/watch_collection/index.php'>";
            $output .= "<input type='hidden' name='watch_id' value='$watch->id'>";
            $output .= "<button type='submit' class='restore-button'>Restore</button>";
            $output .= "</form>";
            $output .= "</div>";
            }

        return $output;
    }

}