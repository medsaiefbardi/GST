<?php
include "connexion.php";

$idmachine = $_GET["idmachine"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $effectue = isset($_POST["validation"]) ? 1 : 0;

    // Update the corresponding table based on the selected operation type
    $table = "";
    if (isset($_POST["semaine"])) {
        $table = "hebdo";
        $mois = $_POST["mois"];
        $semaine = $_POST["semaine"];
        $requete = "UPDATE $table SET effectue = $effectue WHERE nom = '$nom' AND mois = '$mois' AND semaine = '$semaine' AND idmachine = '$idmachine'";
    } elseif (isset($_POST["mois"])) {
        $table = "mensuel";
        $mois = $_POST["mois"];
        $requete = "UPDATE $table SET effectue = $effectue WHERE nom = '$nom' AND mois = '$mois' AND idmachine = '$idmachine'";
    } else {
        $table = "annuel";
        $requete = "UPDATE $table SET effectue = $effectue WHERE nom = '$nom' AND idmachine = '$idmachine'";
    }

    $resultat = $mysqli->query($requete) or die($mysqli->error);

    // Rediriger vers modif.php après la mise à jour
    header("Location: modif.php?idmachine=$idmachine");
    exit();
}
?>
