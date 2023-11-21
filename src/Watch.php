<?php

class Watch
{
    public int $id;
    public string $brand;
    public string $model_name;
    public string $dial_colour;
    public string $watch_type;

    public function __construct
    (
    int $id,
    string $brand,
    string $model_name,
    string $dial_colour,
    string $watch_type
    ) 
{
    $this->id=$id;
    $this->brand=$brand;
    $this->model_name=$model_name;
    $this->dial_colour=$dial_colour;
    $this->watch_type=$watch_type;
}
}