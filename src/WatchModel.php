<?php

require_once 'src/Watch.php';

class WatchModel
{
    public PDO $db;
    
    public function  __construct(PDO $db) 
    {
        $this->db = $db;
    }


    public function getAllWatches()
    {
        $query = $this->db->prepare(
        'SELECT `watch`.`id`,`watch`.`brand`, `watch`.`model_name`, `watch`.`dial_colour`, `type`.`movement` 
            FROM `watch` 
            JOIN `type` 
            ON `watch`.`watch_type` = `type`.`id`;');
        $query->execute();
        $watches = $query->fetchAll();

        $watchObjs = [];
        foreach ($watches as $watch) {
        
            $watchObjs[] = new Watch(
                $watch['id'], 
                $watch['brand'], 
                $watch['model_name'],
                $watch['dial_colour'],
                $watch['movement']
            );
        }
        
        return $watchObjs;
    }
}