<?php

require_once __DIR__ . "/Watch.php";

class WatchModel
{
    public PDO $db;
    
    public function  __construct(PDO $db) 
    {
        $this->db = $db;
    }


    public function getAllWatches($deleted = 0)
    {
        $query = $this->db->prepare(
        'SELECT `watch`.`id`,`watch`.`brand`, `watch`.`model_name`, `watch`.`dial_colour`, `type`.`movement`, `watch`.`deleted`
            FROM `watch` 
            JOIN `type` 
            ON `watch`.`watch_type` = `type`.`id`
            WHERE `watch`.`deleted` = :deleted;');
        
        $query->bindParam(':deleted', $deleted, PDO::PARAM_INT);

        $query->execute();
        $watches = $query->fetchAll();

        $watchObjs = [];
        foreach ($watches as $watch) {
        
            $watchObjs[] = new Watch(
                $watch['id'], 
                $watch['brand'], 
                $watch['model_name'],
                $watch['dial_colour'],
                $watch['movement'],
                $watch['deleted']
            );
        }
        return $watchObjs;
    }

    public function saveNewWatchType(string $brand ,string $dial_colour, string $model_name,  string $movement) : bool
    {
        $query = $this->db->prepare('SELECT `id` FROM `type` WHERE `movement` = ?;');
        $query->execute([$movement]);
        $new_watch= $query->fetch();

        $query = $this->db->prepare(
            'INSERT INTO `watch` 
                (`brand`, `model_name`, `dial_colour`, `watch_type`)
                VALUES (:brand, :model_name, :dial_colour, :watch_type);'
            );
            
        return $query->execute([
            ':brand' => $brand,
            ':dial_colour' => $dial_colour,
            ':watch_type' => $new_watch['id'],
            ':model_name' => $model_name,
        ]); 
    } 

    public function deleteWatches($watch_id)
    {   
        $query = $this->db->prepare('UPDATE `watch` SET `deleted` = 1 WHERE `id` = :watch_id');
        $query->bindParam(':watch_id', $watch_id, PDO::PARAM_INT);
        $query->execute();
    } 

    public function restoreWatches($watch_id)
    {   
        $query = $this->db->prepare('UPDATE `watch` SET `deleted` = 0 WHERE `id` = :watch_id');
        $query->bindParam(':watch_id', $watch_id, PDO::PARAM_INT);
        $query->execute();
    } 
}