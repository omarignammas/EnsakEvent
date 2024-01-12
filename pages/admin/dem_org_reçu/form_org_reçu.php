
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
    display: flex;
    flex-direction: column;
    height: 100vh; /* Set the body to take up the full height of the viewport */
}

nav {
    background-color: rgb(31, 104, 143);
    color: #fff;
    text-align: center;
    padding: 1em;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 6px;
}

table {
    width: 90%;
    margin:5%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    flex-grow: 1; /* Allow the table to take up the remaining height */
}

        header {
            background-color: rgb(31, 104, 143);
            color: #fff;
            text-align: center;
            padding: 1em;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
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
            font-size: 1.1rem;
            text-transform: none;
            border-radius: 8px;
            padding: 5px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }
        nav ul li a:hover{
            color: #b1abab;
            transition: 0.3 ease;
            
        }

        a{
         text-decoration: none;
         color: #221e1e;
         font-weight:bold ;
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
        <h2 >Les demandes d'inscriptions des organisateurs</h2>
        <table>
            <thead >
                <tr>
                    <th>Email</th>
                    <th>Organization Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>nom responsable</th>
                    <th>prenom responsable</th>
                    <th>CIN responsable</th>
                    <th>Acceptation des demandes</th>
                </tr>
            </thead>
            <tbody>
            <?php

include ("../../../includes/connexion.php");
$sql = "SELECT * FROM demande_org";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while ($row= mysqli_fetch_assoc($result)) {
        $_SESSION['Mail_Org']=$row['Mail_Org'];
        echo "<tr>";
        echo "<td>{$row['Mail_Org']}</td>";
        echo "<td>{$row['Nom_Org']}</td>";
        echo "<td>{$row['Type_Org']}</td>";
        echo "<td>{$row['Description']}</td>";
        echo "<td>{$row['Nom_resp']}</td>";
        echo "<td>{$row['Prenom_resp']}</td>";
        echo "<td>{$row['CIN']}</td>";
        echo "<td>";
        echo "<form action='Envoyer_compte.php' method='POST'>";
        echo "<input type='hidden' name='id' value='{$row['Mail_Org']}'>";
        echo "<button type='submit' name='valider'style='padding:10px;Width:140px;margin:5%;'>Valider</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No registration requests found.</td></tr>";
}
?> 
            </tbody>
        </table>
    </div>
    </form>
</body>
</html>
