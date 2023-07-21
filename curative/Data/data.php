<?php
include "connexion.php";

$requete1 = "SELECT `N°`, `DateI`, `Machine`, `Departement`, `Station` FROM description";
$resultat1 = $mysqli->query($requete1) or die($mysqli->error());

$requete2 = "SELECT `Diagnostic`, `Nom` FROM diagnostic";
$resultat2 = $mysqli->query($requete2) or die($mysqli->error());

$requete3 = "SELECT `intervenant`, `Duree`, `Resultat` FROM intervention";
$resultat3 = $mysqli->query($requete3) or die($mysqli->error());

$requete4 = "SELECT `Efficacite` FROM validation";
$resultat4 = $mysqli->query($requete4) or die($mysqli->error());

$requete5 = "SELECT * FROM piece";
$resultat5 = $mysqli->query($requete5) or die($mysqli->error());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curative</title>
</head>
<style>
    /* Styles pour la table */
    table {
        border-collapse: collapse;
        width: 100%;
    }
    
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    /* Styles pour le formulaire d'ajout */
    .ajout {
        margin-top: 20px;
    }
    
    .bloc {
        margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }
    
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }
    
    h2,
    h3 {
        margin-bottom: 10px;
    }

    /* Styles personnalisés */
    body {
        font-family: Arial, sans-serif;
        background-color: #f6f6f6;
    }
    
    .tableau {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    
    .ajout {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
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
</style>
<body>
    <header>
        <nav>
            <img src="../../ressources/logo.jpg" alt="logo">
            <ul>
                <li>
                    <a href="../../maintenance.html">Acceuil</a>
                </li>
                <li>
                    <a href="../../preventive/data/data.php">Préventive</a>
                </li>
                <li>
                    <a href="../../magasin/piece.php">Magasin</a>
                </li>
            </ul>
        </nav>
    </header>

    <h1>Les dernières opérations</h1>
    <table class="tableau">
        <thead>
            <tr>
                <th>N°</th>
                <th>Date</th>
                <th>Machine</th>
                <th>Département</th>
                <th>Station</th>
                <th>Diagnostic</th>
                <th>Durée</th>
                <th>Résultat</th>
                <th>Efficacité</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($ligne1 = $resultat1->fetch_assoc()) {
                $ligne2 = $resultat2->fetch_assoc();
                $ligne3 = $resultat3->fetch_assoc();
                $ligne4 = $resultat4->fetch_assoc();

                echo "<tr>";
                echo "<td>" . $ligne1["N°"] . "</td>";
                echo "<td>" . $ligne1["DateI"] . "</td>";
                echo "<td>" . $ligne1["Machine"] . "</td>";
                echo "<td>" . $ligne1["Departement"] . "</td>";
                echo "<td>" . $ligne1["Station"] . "</td>";
                
                // Vérification des résultats avant d'afficher les valeurs
                echo "<td>" . ($ligne2 ? $ligne2["Diagnostic"] : "") ."</td>";
                echo "<td>" . ($ligne3 ? $ligne3["Duree"] : "") . "</td>";
                echo "<td>" . ($ligne3 ? $ligne3["Resultat"] : "") . "</td>";
                echo "<td>" . ($ligne4 ? $ligne4["Efficacite"] : "") . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="ajout">
        <h2>Ajouter une intervention</h2>
        <form action="../processus/ajout.php" method="post">
            <!-- Bloc Description -->
            <div class="bloc">
                <h3>Description</h3>
                <input type="text" name="description" placeholder="Description">
                <input type="date" name="dateI" placeholder="DateI">
                <select name="machine">
                    <option value="Bottomeuse-AD2360">Bottomeuse-AD2360</option>
                    <option value="Bottomeuse-AD2377">Bottomeuse-AD2377</option>
                    <option value="Tubeuse-AM2145">Tubeuse-AM2145</option>
                    <option value="Tubeuse-AM2140">Tubeuse-AM2140</option>
                </select>
                <input type="text" name="station" placeholder="Station">
                <input type="text" name="departement" placeholder="Département">
            </div>
            
            <!-- Bloc Diagnostic -->
            <div class="bloc">
                <h3>Diagnostic</h3>
                <input type="text" name="diagnostic" placeholder="Diagnostic">
                <input type="text" name="nom" placeholder="Nom d'intervenant">
                <input type="date" name="dateDiagnostic" placeholder="Date">
            </div>
            
            <!-- Bloc Intervention -->
            <div class="bloc">
                <h3>Intervention</h3>
                <select name="intervenant">
                    <option value="sous-traitance">Sous-traitance</option>
                    <option value="interne">Interne</option>
                </select>
                <input type="text" name="detail" placeholder="Détail">
                <input type="text" name="duree" placeholder="Durée">
                <input type="text" name="resultat" placeholder="Résultat">
                <input type="text" name="observation" placeholder="Observation">
                <input type="date" name="date" placeholder="Date">
                
                <!-- Champ pour les pièces -->
                <h3>Pièces</h3>
                <select name="piece" multiple>
                    <?php
                    while ($ligne5 = $resultat5->fetch_assoc()) {
                        echo "<option value='" . $ligne5["designation"] . "'>" . $ligne5["Ref"] . "</option>";
                    }
                    ?>
                </select>
                <input type="number" name="quantite" placeholder="Quantité" min="1">
            </div>
            
            <!-- Bloc Validation -->
            <div class="bloc">
                <h3>Validation</h3>
                <select name="efficacite">
                    <option value="resolue">Résolue</option>
                    <option value="non-resolue">Non Résolue</option>
                    <option value="depannage">Dépannage</option>
                </select>
                <input type="text" name="decision" placeholder="Décision">
            </div>
            
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
