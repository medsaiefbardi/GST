<?php
include "connexion.php";
$requete = "SELECT * FROM piece";
$resultat = $mysqli->query($requete) or die ($mysqli->error());
// $Pieces ="";
// while ($ligne = $resultat->fetch_assoc())
// {
//     $Pieces .= "<p>" .$ligne["N°"] . " - " .$ligne["Nom"] . " - " .$ligne["Designation"] . " - ".$ligne["Ref"] . " - " .$ligne["Qte"] . "</p>";
// } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magasin</title>
</head>
<style>
       table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .logo {
        margin-left: 2cm;
        height: 120px;
        font-weight: bold;
        color: white;
        text-decoration: none;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        margin-left: 9cm;
        margin-top: 0.5cm;
    }

    nav {
        display: flex;
    }

    nav li {
        margin-left: 5cm;
        margin-top: 0.5cm;
    }

    nav a {
        color: black;
        justify-content: space-between;
        text-shadow: 1cqmax white;
        font-size: x-large;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-decoration: none;
    }

    nav a:hover {
        color: red;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background-color: white;
    }

    .pieces {
        margin-top: 20px;
    }

    .pieces table {
        border: none;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        margin: 0 auto;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .pieces th,
    .pieces td {
        padding: 10px 15px;
        vertical-align: middle;
    }

    .pieces th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
    }

    .pieces td {
        border-top: 1px solid #ccc;
    }

    .pieces tr:hover {
        background-color: #f6f6f6;
    }
</style>
<body>
<header>
    <nav>
        <img src="../ressources/logo.jpg" alt="logo">
        <ul>
            <li>
                <a href="../maintenance.html">Acceuil</a>
            </li>
            <li>
                <a href="../preventive/data/data.php">Preventive</a>
            </li>
            <li>
                <a href="../curative/data/data.php">Curative</a>
            </li>
        </ul>
    </nav>
    </header>
    <div class="pieces">
    <table align="center" border="1" style="width: 100%; text-align: center;">
        <tr>
            <td>N°</td>
            <td>Designation</td>
            <td>Position</td>
            <td>Ref</td>
            <td>Machine</td>
            <td>Quantité</td>
        </tr>
        <?php while ($ligne = $resultat->fetch_assoc()) { ?>
            <tr>
                <td><?= $ligne["N°"] ?></td>
                <td><?= $ligne["designation"] ?></td>
                <td><?= $ligne["position"] ?></td>
                <td><?= $ligne["Ref"] ?></td>
                <td><?= $ligne["machine"] ?></td>
                <td><?= $ligne["Qte"] ?></td>
                
            </tr>
        <?php } ?>
    </table>

        
    </div>
    
</body>
</html>