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
        <form action="promotion.php" method="post" enctype="multipart/form-data">
        <?php
        include ("../../../includes/connexion.php");

        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            $eventId = $_SESSION['id_event'];
            if ($action === 'accepter') {
                $updateCheckedQuery = "UPDATE event SET checked = 1 WHERE event_id = $eventId";
                mysqli_query($conn, $updateCheckedQuery);
            } elseif ($action === 'refuser') {
                $updateCheckedQuery = "UPDATE event SET checked = 0 WHERE event_id = $eventId";
                mysqli_query($conn, $updateCheckedQuery);
            }
        }

        $Mail_Org=$_SESSION['Mail_Org'];

        // Retrieve event details from the event table using the event_id
        $sql = "SELECT * FROM event WHERE mail = '$Mail_Org' ";
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

                <label>image:</label>
                <input type="text" value="<?php echo $eventDetails['img']; ?>" readonly>

                <button type="button" name="action" value="refuser"  onclick="refuser()">Refuser</button>
                <button type="button" name="action" value="accepter" onclick="accepter()">Accepter</button>
           
        </form>
    </div>
</body>
</html>