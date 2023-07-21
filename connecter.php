<?php

// Connexion à la base de données
include "connexion.php";

// Récupération des données du formulaire
$identifiant = $_POST['identifiant'];
$motdepasse = $_POST['motdepasse'];

// Requête SQL pour récupérer l'utilisateur correspondant à l'identifiant et au mot de passe
$requete = "SELECT * FROM user WHERE identifiant='$identifiant' AND motdepasse='$motdepasse'";
$resultat = $mysqli->query($requete) or die($mysqli->error());

// Vérification si l'utilisateur existe
if ($resultat->num_rows > 0) {
    // L'utilisateur est connecté avec succès, rediriger vers l'interface appropriée (admin ou utilisateur)
    
        header("Location: maintenance.html")

}

// Fermeture de la connexion à la base de données
$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
</body>
</html>
