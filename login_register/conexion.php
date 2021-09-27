<?php
$host='localhost';
$bd='registro';
$user='root';
$pass='';



try {
$conexion = new PDO("mysql:host=$host;dbname=$bd",$user,$pass);
} catch (PDOException $e) {

	die('error:'.$e->getMessage());
}
?>
