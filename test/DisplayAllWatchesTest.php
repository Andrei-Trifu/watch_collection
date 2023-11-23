<?php

require_once 'src/Watch.php';
require_once 'src/WatchViewHelper.php';

use PHPUnit\Framework\TestCase;



class DisplayAllWatchesTest extends TestCase
{
    public function testDisplayAllWatches()
    {
        $input = [new Watch(1,'Seiko','Samurai','Black', 'Automatic')];

        $expected = "<div class='watch-card'><p class='watch-brand'>Seiko</p><p>Model: Samurai</p><br><p>Dial colour: Black</p><br><p>Movement: Automatic</p><button class='delete-button'>Delete</button><button class='edit-button'>Edit</button></div>";
         $result =  WatchViewHelper::displayAllWatches($input);
         $this->assertEquals($expected, $result);
    }


    public function testDisplayFail()
    {
        $input =[];
        $result = WatchViewHelper::displayAllWatches($input);
        $expected = "<p class='error-message'>No watches to display.</p>";
        $this->assertEquals($expected, $result);
    }
}
    
        
    
