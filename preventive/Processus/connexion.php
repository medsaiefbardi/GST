<?php
//connexion à la base de données
$mysqli= new mysqli("localhost","root","","gst_int_preventive");

if($mysqli->connect_error){
    die('Erreur de connexion ('.$mysqli->connect_error.')'. $mysqli->connect_error); // afficher msg erreur et arréte la cnx
}
?>