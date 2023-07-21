<?php

include "connexion.php";

$description = $_POST["description"];
$dateI = $_POST["dateI"];
$machine = $_POST["machine"];
$station = $_POST["station"];
$departement = $_POST["departement"];

$diagnostic = $_POST["diagnostic"];
$nom = $_POST["nom"];
$dateDiagnostic = $_POST["dateDiagnostic"];

$intervenant = $_POST["intervenant"];
$detail = $_POST["detail"];
$duree = $_POST["duree"];
$resultat = $_POST["resultat"];
$observation = $_POST["observation"];
$date = $_POST["date"];
$pieces = $_POST["piece"];
$quantites = $_POST["quantite"];

$efficacite = $_POST["efficacite"];
$decision = $_POST["decision"];

// Requêtes
$requete1 = "INSERT INTO `description`(`Description`, `DateI`, `Machine`, `Station`, `Departement`) VALUES ('$description', '$dateI', '$machine', '$station', '$departement')";
$requete2 = "INSERT INTO `diagnostic`(`Diagnostic`, `Nom`, `Date`) VALUES ('$diagnostic', '$nom', '$dateDiagnostic')";
$requete4 = "INSERT INTO `validation` (`Efficacite`, `Decision`) VALUES ('$efficacite', '$decision')";

// Exécution de requêtes
$resultat1 = $mysqli->query($requete1) or die(mysqli_error($mysqli));
$resultat2 = $mysqli->query($requete2) or die(mysqli_error($mysqli));
$resultat4 = $mysqli->query($requete4) or die(mysqli_error($mysqli));

// Récupération de l'id de la dernière description ajoutée
// $lastInsertId = $mysqli->insert_id;

// Insertion des données dans la table intervention
// if (!empty($pieces) && is_array($pieces)) {
//     foreach ($pieces as $index => $piece) {
//         $quantite = isset($quantites[$index]) ? intval($quantites[$index]) : 0;
        $requete3 = "INSERT INTO `intervention`(`Intervenant`, `Detail`, `Duree`, `Resultat`, `Observation`, `Date`) 
                     VALUES ('$intervenant', '$detail', '$duree', '$resultat', '$observation', '$date')";
        $resultat3 = $mysqli->query($requete3) or die(mysqli_error($mysqli));


header("Location: ../Data/data.php");
?>
