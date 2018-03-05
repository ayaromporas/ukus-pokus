<?php
include("config.php");
require_once('classes/Database.php');

$database = new Database();
$database->query('SELECT COUNT(*) FROM recipes');
$nrRecipes =$database->resultSet();

var_dump($nrRecipes);



?>