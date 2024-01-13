<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Administration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgb(31, 104, 143);
            color: #fff;
            text-align: center;
            padding: 1em;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
        }

        nav {
            
            padding: 1em;
            
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        nav ul li {
            display: inline;
            margin-right: 60px;
            font-size: 1.0rem;
            text-transform: none;
            border-radius: 8px;
            padding: 6px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }
        nav ul li a:hover{
            color: #bbabab;
            text-decoration: underline;
            transition: 0.3 ease;
            
        }

        a{
         text-decoration: none;
         color: #221e1e;
         font-weight:bold ;
        }
        
        table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
         box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
         
        }

        th, td {
         padding: 22px;
         border: 1px solid #ddd;
         text-align: left;
        }

        th {
         background-color: #3498db;
         color: #fff;
        }

        button {
         background-color: #2ecc71;
         color: #fff;
         border: none;
         padding: 8px 12px;
         border-radius: 4px;
         cursor: pointer;
        }

         button:hover {
         background-color: #27ae60;
        }

        h2{
         text-align: center;
         font-family: serif;
         font-size: 2.1rem;
        }

    </style>
</head>
<body>

<?php include ("../header.html"); ?>

     <main>
        <section id="demandes-inscription" class="dashboard-container">
        <div class="dashboard-container">
        <h2 >Les ev&eacutenements organise&eacutes</h2>
        <table>
            <thead>
                <tr>
                    <th>Email d'organisation</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Detail</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>local</th>
                    <th>deadline</th>
                    <th>desc</th>
                    <th>gsm</th>
                </tr>
            </thead>
            <tbody>
<?php
include ("../../../includes/connexion.php");

$sql = "SELECT * FROM event WHERE checked = 1"; // Ajout de la condition checked = 1
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Email d'organisation</th>";
    echo "<th>Titre</th>";
    echo "<th>Type</th>";
    echo "<th>Detail</th>";
    echo "<th>Debut</th>";
    echo "<th>Fin</th>";
    echo "<th>Local</th>";
    echo "<th>Deadline</th>";
    echo "<th>Description</th>";
    echo "<th>GSM</th>";
    echo "<th>Acceptation des demandes</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['Mail_Org'] = $row['mail'];
        $_SESSION['id_event'] = $row['id_event'];
        echo "<tr>";
        echo "<td>{$row['mail']}</td>";
        echo "<td>{$row['titre']}</td>";
        echo "<td>{$row['type']}</td>";
        echo "<td>{$row['detail']}</td>";
        echo "<td>{$row['debut']}</td>";
        echo "<td>{$row['fin']}</td>";
        echo "<td>{$row['local']}</td>";
        echo "<td>{$row['deadline']}</td>";
        echo "<td>{$row['descp']}</td>";
        echo "<td>{$row['gsm']}</td>";
        echo "<td>";
        echo "<button type='submit' name='validation'><a href='trait-prom_reçu.php?id={$row['id_event']}' style='color:white;width:200px;height:50px;'>Voir en détails</a></button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Aucun événement trouvé.";
}
?>
