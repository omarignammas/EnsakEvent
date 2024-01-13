<?php
include ("../../../includes/connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'&eacutev&eacutenement promotion details</title>
     <style>
        body {
    font-family: 'Poppins', sans-serif;    background-color: whitesmoke;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 170vh;
}

.container {
    padding: 20px;
    width: 600px;
    text-align: center;
    border:3px solid #3498db;
    border-radius:7px;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);

}

label {
    display: block;
    margin: 15px 0 5px;
    text-align: left;
    font-family: 'Poppins', sans-serif;  
    font-weight: bold;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
textarea {
    width: 100%;
    padding: 20px;
    margin-bottom: 15px;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.input{
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    background: rgba(255, 255, 255, 0.2);
}

button {
    background-color: #3498db;
    margin-left:6%;
    margin-top:20px;
    color: #fff;
    cursor: pointer;
    padding: 10px;
    width: 25%;
    border: none;
    border-radius: 4px;
    font-weight: bold;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

}

button:hover {
    background-color: #2980b9;
}

     </style>
</head>
<body>
    <div class="container">
        <h2 style="font-family: serif;font-size: xx-large;">Details d'événement</h2>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $justif = mysqli_real_escape_string($conn, $_POST['justif']); // Assure la sécurité contre les injections SQL
    $eventId = $_SESSION['id_event'];

    if ($action == 'Accepter') {
        $updateCheckedQuery = "UPDATE event SET checked = 1, justif = '$justif' WHERE id_event = $eventId";
    } elseif ($action == 'Refuser') {
        $updateCheckedQuery = "UPDATE event SET checked = 0, justif = '$justif' WHERE id_event = $eventId";
    }

    if(mysqli_query($conn, $updateCheckedQuery)){
        header('location:..\dem_event_reçu\form-event_reçu.php');
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'événement : " . mysqli_error($conn);
    }
}

        $Mail_Org=$_SESSION['Mail_Org'];

        // Retrieve event details from the event table using the event_id
        $sql = "SELECT * FROM event WHERE mail = '$Mail_Org' AND checked = 2 ";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $eventDetails = mysqli_fetch_assoc($result);
        }
            ?>
                <label>Mail d'organisation:</label>
                <input type="text" value="<?php echo $eventDetails['mail']; ?>" readonly>

                <label>Titre d'evenement:</label>
                <input type="text" value="<?php echo $eventDetails['titre']; ?>" readonly>

                <label>Lieu:</label>
                <input type="text" value="<?php echo $eventDetails['local']; ?>" readonly>

                <label>Date:</label>
                <input type="text" value="<?php echo $eventDetails['deadline']; ?>" readonly>

                <label>justificatif:</label>
                <textarea  name="justif" placeholder="Justifier votre decision..." required></textarea>

                <div>
                <?php
                 $img = $eventDetails['img'];
                 $imagePath = $img;
                if (!empty($imagePath)) {
                 echo "<label>Image:</label>";
                 echo "<img src='../../organisateur/dem_event/images/$img' alt='Event Image' style='max-width: 100%; height: 200px;'>";
                 }
               ?>        
                </div>
                

                <button type="submit" name="action" value="Refuser">Refuser</button>
                <button type="submit" name="action" value="Accepter">Accepter</button>
           
        </form>
    </div>
</body>
</html>