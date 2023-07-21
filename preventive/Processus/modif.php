<?php
include "connexion.php";

$idmachine = $_GET["idmachine"];

$requete1 = "SELECT nom FROM machines WHERE id = '$idmachine'";
$resultat1 = $mysqli->query($requete1) or die($mysqli->error);
$ligne1 = $resultat1->fetch_assoc();

$requete2 = "SELECT * FROM hebdo WHERE idmachine = '$idmachine'";
$resultat2 = $mysqli->query($requete2) or die($mysqli->error);
$ligne2 = $resultat2->fetch_assoc();

$requete3 = "SELECT * FROM mensuel WHERE idmachine = '$idmachine'";
$resultat3 = $mysqli->query($requete3) or die($mysqli->error);
$ligne3 = $resultat3->fetch_assoc();

$requete4 = "SELECT * FROM annuel WHERE idmachine = '$idmachine'";
$resultat4 = $mysqli->query($requete4) or die($mysqli->error);
$ligne4 = $resultat4->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preventive</title>
    <style>
        /* Styles personnalisés */
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
        }
        
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
        
        h1, h2, h3 {
            text-align: center;
            margin-top: 2rem;
        }
        
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 2rem;
        }
        
        th, td {
            padding: 0.5rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        form {
            text-align: center;
            margin-top: 2rem;
        }
        
        select, input[type="checkbox"] {
            padding: 0.5rem;
            margin-top: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <img src="../../ressources/logo.jpg" alt="logo" class="logo">
            <ul>
                <li><a href="../../maintenance.html">Acceuil</a></li>
                <li><a href="../../magasin/piece.php">Magasin</a></li>
                <li><a href="../../curative/data/data.php">Curative</a></li>
            </ul>
        </nav>
    </header>
    <h1>Machine</h1>
    <h2><?php echo $ligne1['nom']?></h2>
    <form action="valider_modif.php?idmachine=<?php echo $ligne1['id'];?>" method="post">
        <h3>Les opérations hebdomadaires</h3>
        <table>
            <tr>
                <th>Opération</th>
                <th>Mois</th>
                <th>Semaine</th>
                <th>Validation</th>
            </tr>
            <tr>
                <td>
                    <select name="nom">
                        <option value="gr&lub">Graissage et lubrification</option>
                        <option value="net">Nettoyage filtres</option>
                    </select>
                </td>
                <td>
                    <select name="mois">
                        <option value="Janvier">Janvier</option>
                        <option value="Fevrier">Février</option>
                        <option value="Mars">Mars</option>
                        <option value="Avril">Avril</option>
                        <option value="Mai">Mai</option>
                        <option value="Juin">Juin</option>
                        <option value="Juillet">Juillet</option>
                        <option value="Aout">Août</option>
                        <option value="Septembre">Septembre</option>
                        <option value="Octobre">Octobre</option>
                        <option value="Novembre">Novembre</option>
                        <option value="Decembre">Décembre</option>
                    </select>
                </td>
                <td>
                    <select name="semaine">
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="S4">S4</option>
                    </select>
                </td>
                <td>
                    <input type="checkbox" name="validation">
                </td>
            </tr>
        </table>
        <input type="submit" value="Valider">
    </form>
    <form action="valider_modif.php?id=<?php echo $ligne1['id'];?>" method="post">
    <h3>Les opérations mensuelles</h3>
        <table>
            <tr>
                <th>Opération</th>
                <th>Mois</th>
                <th>Validation</th>
            </tr>
            <tr>
                <td>
                    <select name="nom">
                        <option value="Controle état+tension courroies moteurs">Contrôle état + tension courroies moteurs</option>
                        <option value="Controle courroies transport">Contrôle courroies transport</option>
                        <option value="Contrôle ensembles encolleurs">Contrôle ensembles encolleurs</option>
                        <option value="Vérification circuit air et huile">Vérification circuit air et huile</option>
                        <option value="Contrôle niveau huile">Contrôle niveau huile</option>
                        <option value="Vérification circuit colle">Vérification circuit colle</option>
                        <option value="Contrôle courroie transport (sys S)">Contrôle courroie transport (sys S)</option>
                        <option value="Contrôle chaine de transmission (sys S)">Contrôle chaine de transmission (sys S)</option>
                        <option value="Contrôle circuit air (sys S)">Contrôle circuit air (sys S)</option>
                        <option value="Contrôle chaine table élévatrice (palitiseur)">Contrôle chaine table élévatrice (palitiseur)</option>
                        <option value="Contrôle bonde convoyeur">Contrôle bonde convoyeur</option>

                    </select>
                </td>
                <td>
                    <select name="mois">
                        <option value="Janvier">Janvier</option>
                        <option value="Février">Février</option>
                        <option value="Mars">Mars</option>
                        <option value="Avril">Avril</option>
                        <option value="Mai">Mai</option>
                        <option value="Juin">Juin</option>
                        <option value="Juillet">Juillet</option>
                        <option value="Août">Août</option>
                        <option value="Septembre">Septembre</option>
                        <option value="Octobre">Octobre</option>
                        <option value="Novembre">Novembre</option>
                        <option value="Décembre">Décembre</option>
                    </select>
                </td>
                <td>
                    <input type="checkbox" name="validation">
                </td>
            </tr>
        </table>
        <input type="submit" value="Valider">
        </form>
        <form action="valider_modif.php?id=<?php echo $ligne1['id'];?>" method="post">
        <h3>Les opérations annuelles</h3>
        <table>
            <tr>
                <th>Opération</th>
                <th>Validation</th>
            </tr>
            <tr>
                <td>
                    <select name="nom">
                        <option value="Changement courroies">Changement courroies</option>
                        <option value="Changement détendeurs à air avec filtre">Changement détendeurs à air avec filtre</option>
                        <option value="Vidange huile">Vidange huile</option>
                        <option value="Contrôle des leviers aluminium des rails de transport">Contrôle des leviers aluminium des rails de transport</option>
                        <option value="Vérification dispositif encolleurs">Vérification dispositif encolleurs</option>
                        <option value="Vérification traceurs et cylindre contre pression">Vérification traceurs et cylindre contre pression</option>
                        <option value="Contrôle circuit pneumatique">Contrôle circuit pneumatique</option>
                        <option value="Contrôle circuit colle">Contrôle circuit colle</option>
                        <option value="Contrôle galets aluminium">Contrôle galets aluminium</option>
                    </select>
                </td>
                <td>
                    <input type="checkbox" name="validation">
                </td>
            </tr>
        </table>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
