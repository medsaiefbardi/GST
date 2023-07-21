<?php
include "connexion.php";
$requete1 = "SELECT * FROM machines";
$resultat1 = $mysqli->query($requete1) or die($mysqli->error());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preventive</title>
    <style>
        /* Styles pour la liste des machines */
        .logo {
            /* font-size: 2rem; */
            margin-left: 2cm;
            height: 120px;
            
            font-weight: 300px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            margin-left : 9cm;
            margin-top : 0.5cm
        }
        nav{
            display : flex;
        }

        nav li {
            margin-left : 5cm;
            margin-top : 0.5cm
        }

        nav a {
            color: black;
            /* margin-right: 2cm; */
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
            background-color : white;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 0 10px;
            text-align: center;
            width: 200px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card a {
            text-decoration: none;
            color: #333;
        }

        .card h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1rem;
            color: #888;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <img src="../../ressources/logo.jpg" alt="logo">
            <ul>
                <li>
                    <a href="../../maintenance.html">Acceuil</a>
                </li>
                <li>
                    <a href="../../magasin/piece.php">Magasin</a>
                </li>
                <li>
                    <a href="../../curative/data/data.php">Curative</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <?php
        while ($ligne1 = $resultat1->fetch_assoc()) {
            $machineId = $ligne1["id"];
            $machineNom = $ligne1["nom"];
            echo "<div class='card'>";
            echo "<a href='../processus/modif.php?idmachine=$machineId'>";
            echo "<h2>$machineNom</h2>";
            echo "<p>Description de la machine</p>";
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
