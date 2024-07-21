<?php 
include ("../../../includes/connexion.php");
$cd=0;

if(($_SERVER["REQUEST_METHOD"]=="POST")){
    if(isset($_POST['submit'])){
        echo'after condition';
        // Récupérer les données du formulaire
        $nom_org = mysqli_real_escape_string($conn, $_SESSION['nom_org']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $titre = mysqli_real_escape_string($conn, $_POST['titre']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $gsm = mysqli_real_escape_string($conn, $_POST['gsm']);
        $datedebut = mysqli_real_escape_string($conn, $_POST['datedebut']);
        $datefin = mysqli_real_escape_string($conn, $_POST['datefin']);
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
        $detail = mysqli_real_escape_string($conn, $_POST['detail']);
        $lieu = mysqli_real_escape_string($conn, $_POST['local']);

    // Télécharger l'image
        if(isset($_FILES['fichier']) and $_FILES['fichier']['error']==0){
            $dossier='images/';
            $temp_name=$_FILES['fichier']['tmp_name'];
            if(!is_uploaded_file($temp_name)){
                 exit("le fichier est introuvable!");
            }
            if($_FILES['fichier']['size']>=10000000){
                exit("Erreur,fichier stockage ");
            }
            $infosfichier=pathinfo($_FILES['fichier']['name']);
            $extension_upload=$infosfichier['extension'];

            $extension_upload=strtolower($extension_upload);
            $extension_autorities=array('png','jpeg','jpg');

            if(!in_array($extension_upload,$extension_autorities)){
                exit("Erreur,Veuillez inserer une image svp (extentions autorisee png)");
            }
            $nom_photo=$titre.".".$extension_upload;
            if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
                exit("<h2>Probleme dans telechargement de l'image,Ressayer!</h2>");
            }

        }
// Insérer les données dans la base de données
    $login=$_SESSION['login'];
    $sql= "INSERT INTO `event`( `titre`, `type`, `detail`, `debut`, `fin`, `local`, `img`, `descp`, `deadline`, `gsm`, `checked`, `nom_org`, `mail`) VALUES ('$titre','$type','$detail','$datedebut','$datefin','$lieu','$nom_photo','$description','$deadline','$gsm','2','$nom_org','$login')";
    $result=mysqli_query($conn, $sql);
    if ($result){
        header("Location: etat-form-event.php");
        exit();
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}  } 
if(isset($_GET['modifier']) && $_GET['modifier'] == 'True'){
    $cd=1;
    $id=$_GET['id'];
    $_SESSION['id']=$id; 
    $query="SELECT `id_event`, `titre`, `type`, `detail`, `debut`, `fin`, `local`, `img`, `descp`, `deadline`, `mail`, `gsm`, `checked`, `nom_org`, `justif` FROM `event` WHERE `id_event`='$id'";
    $result=mysqli_query($conn,$query);
    if ($result!=null){
        $row=mysqli_fetch_assoc($result);
        $titre=$row['titre'];
        $type=$row['type'];
        $detail=$row['detail'];
        $debut=$row['debut'];
        $debutFormatted = (isset($cd) && $cd == 1) ? (new DateTime($debut))->format('Y-m-d H:i:s') : '';

        $fin=$row['fin'];
        $finFormatted = (isset($cd) && $cd == 1) ? (new DateTime($fin))->format('Y-m-d H:i:s') : '';
        $local=$row['local'];
        $descp=$row['descp'];
        $deadline=$row['deadline'];
        $deadlineFormatted = (isset($cd) && $cd == 1) ? (new DateTime($deadline))->format('Y-m-d H:i:s') : '';
        $mail=$row['mail'];
        $gsm=$row['gsm'];
        $nom_org=$row['nom_org'];
        $justif=$row['justif'];
    }
}
if ($cd==1){
    $act="update-event.php";
}else if($cd==0){
    $act="form-prom.php";
}
//$conn->close();
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

#btp1{
padding: 10px;
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
                    <li class="nav-item"><a class="nav-link" href="../dashebord.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="form-prom.php"><i class="far fa-clock"></i><span>Créer Evenement</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="etat-form-event.php"><i class="fas fa-clock"></i><span>Etat demandes</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../calendrier-org.php"><i class="fas fa-table"></i><span>Calendrier</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../deconnexion.php"><i class="far fa-user-circle"></i><span>Deconnexion</span></a></li>
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
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="../../assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION['nom_org']; ?></span>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Tableau init-->
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Espace Organisateur</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Demande Evenement</p>
                            
                        </div>
                        <div class="card-body">
 
                        <form  action=<?= $act ?> method="POST" enctype="multipart/form-data">

        

<label for="titre">Titre d'evenement :</label>
<input type="text" name="titre" id="titre" required value="<?php echo (isset($cd) && $cd==1) ? $titre : ''; ?>">

<label for="type">Type d'evenement :</label>
<input type="text" name="type" id="type" required value="<?php echo (isset($cd) && $cd==1) ? $type : ''; ?>">

<label for="description">Description :</label>
<textarea name="description" id="description" rows="4" required ><?php echo (isset($cd) && $cd==1) ? $descp : ''; ?></textarea>


<label for="gsm">Tel :</label>
<input type="text" name="gsm" id="gsm"  required value="<?php echo (isset($cd) && $cd==1) ? $gsm : ''; ?>">


<label for="datedebut">Date debut :</label>
<input type="datetime-local" name="datedebut" id="datedebut" required value="<?php echo $debutFormatted; ?>">

<label for="datefin">Date fin :</label>
<input type="datetime-local" name="datefin" id="datefin" required value="<?php echo $finFormatted; ?>">

<label for="deadline">Date limite :</label>
<input type="datetime-local" name="deadline" id="deadline" required value="<?php echo $deadlineFormatted; ?>">


<label for="local">Lieu :</label>
<input type="text" name="local" id="local" required value="<?php echo (isset($cd) && $cd==1) ? $local : ''; ?>">

<label for="detail">Details:</label>
<textarea name="detail" rows="4" id="detail" required ><?php echo (isset($cd) && $cd==1) ? $detail : ''; ?></textarea>

<label for="fichier">Image :</label>
<input type="file" name="fichier" id="fichier" accept="photo/*" value="<?=$nom_photo ?>" required>
<div class='text-center '>
<button type="submit" name="submit" class='btn btn-success btn-sm ms-2 text-white d-inline-block p-2 '>Envoyer la demande</button>
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