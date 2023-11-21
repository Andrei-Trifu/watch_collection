<?php

require_once 'src/Watch.php';

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
            $output .= '</div>';
        }

        return $output;
    } 

}