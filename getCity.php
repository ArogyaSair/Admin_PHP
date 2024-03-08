<?php
session_start();

require_once("config.php");

$id = $_POST['stated'];
$url="ArogyaSair/tblCity/";
$DatabaseCity = $database->getReference($url)->orderByChild('StateID')->equalTo($id)->getSnapshot()->getValue();
echo "<option>Select City</option>";
foreach($DatabaseCity as $data){
echo "<option value='".$data['CityName']."'>".$data['CityName']."</option>";
}

?>