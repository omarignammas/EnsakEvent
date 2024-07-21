<?php 
include ("../../../includes/connexion.php");
$eveId = mysqli_real_escape_string($conn, $_GET['id']);
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $justif = mysqli_real_escape_string($conn, $_POST['justif']); // Assure la sécurité contre les injections SQL

    if ($action == 'Accepter') {
        $updateCheckedQuery = "UPDATE `event` SET checked = 1 , justif = '$justif' WHERE `id_event` = $eveId ;";
    } elseif ($action == 'Refuser') {
        $updateCheckedQuery = "UPDATE `event` SET checked = 0 , justif = '$justif' WHERE `id_event` = $eveId ;";
    }
    if(mysqli_query($conn, $updateCheckedQuery)){
        header('location:..\dem_event_reçu\form-event_reçu.php');
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'événement : " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../../../assets/fonts/fontawesome-all.min.css">
    <style>
    /* Styles CSS personnalisés pour le tableau */
    thead .card-header th {
        text-align: center;
    }

    thead .card-header th {

        text-align: center;
    }

    thead .card-header th.text-primary {
        text-align: center;
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

td{
        vertical-align: middle;
    }

    
</style>
</head>
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Ensak Event</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="../dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../dem_org_reçu/form_org_reçu.php"><i class="far fa-clock"></i><span>Demande Organisateur</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../orgs.php/form_orgs.php"><i class="fas fa-user"></i><span>Organisateur</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="form-event_reçu.php"><i class="far fa-clock"></i><span>Demande Evenement</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="dem-mod-event.php"><i class="far fa-clock"></i><span>Dem Modif Even</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../org_events.php/event_org.php"><i class="fas fa-check"></i><span>Evenement programmées</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../calendrier.php"><i class="fas fa-table"></i><span>Calendrier</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Deconnexion</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Administration</span><img class="border rounded-circle img-profile" src="../../../assets/img/avatars/ensak.jpg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="../dashboard.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Dashboard</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../../../deconnexion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Tableau init-->
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Espace Admin </h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Demande Evenement</p>
                            
                        </div>
                        <div class="card-body">

                        <form action="" method="POST" enctype="multipart/form-data">
        <?php

        $sql = "SELECT * FROM event WHERE id_event = $eveId AND (checked = 2 OR checked = 3) ";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $eventDetails = mysqli_fetch_assoc($result);
        }
            ?>
                <label>Mail d'organisation:</label>
                <input type="text" value="<?php echo $eventDetails['mail']; ?>" readonly>

                <label>Titre d'evenement:</label>
                <input type="text" value="<?php echo $eventDetails['titre']; ?>" readonly>

                <label>Type d'evenement:</label>
                <input type="text" value="<?php echo $eventDetails['type']; ?>" readonly>

                <label>Description:</label>
                <textarea  name="desc" required readonly><?php echo $eventDetails['descp']; ?></textarea>

                <label>Lieu:</label>
                <input type="text" value="<?php echo $eventDetails['local']; ?>" readonly>
                
                <label>Date debut:</label>
                <input type="text" value="<?php echo $eventDetails['debut']; ?>" readonly>

                <label>Date fin:</label>
                <input type="text" value="<?php echo $eventDetails['debut']; ?>" readonly>

                <label>Detail:</label>
                <textarea  name="detail" required readonly><?php echo $eventDetails['detail']; ?></textarea>

                <label>justificatif:</label>
                <textarea  name="justif" placeholder="Justifier votre decision..." required></textarea>

                <div>
                <?php
                 $img = $eventDetails['img'];
                 $imagePath = $img;
                if (!empty($imagePath)) {
                 echo "<label>Image:</label>";
                 echo "<img src='../../organisateur/dem_event/images/$img' alt='Event Image' style='max-width: 100%; height: 200px; margin:5px '>" ;
                 }
               ?>        
                </div>
                <div class="mb-3"></div>

                <div class="d-flex justify-content-center">
    <button type="submit" name="action" value="Refuser" class='btn btn-success btn-sm ms-2 text-white d-inline-block p-2'>Refuser</button>
    <button type="submit" name="action" value="Accepter" class='btn btn-success btn-sm ms-2 text-white d-inline-block p-2 '>Accepter</button>
</div>

        </form>
                        
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Ensak_Event 2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/bs-init.js"></script>
    <script src="../../../assets/js/theme.js"></script>
</body>

</html>



