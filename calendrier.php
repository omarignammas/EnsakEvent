<?php 
include ("includes/connexion.php");
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Calendrier</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
 
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
    .main-content-container {
        max-width: calc(100% - 220px); /* Ajustez la largeur selon vos besoins */
        margin-left: 220px;/* Largeur de votre barre de navigation */
    }
</style>
</head>
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar fixed-top align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Ensak Event</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link" href="pages/admin/dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/admin/dem_org_reçu/form_org_reçu.php"><i class="far fa-clock"></i><span>Demande Organisateur</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="pages/admin/orgs.php/form_orgs.php"><i class="fas fa-user"></i><span>Organisateur</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="pages/admin/dem_event_reçu/form-event_reçu.php"><i class="far fa-clock"></i><span>Demande Evenement</span></a></li>
                    <li class="nav-item"><a class="nav-link " href="pages/admin/dem_event_reçu/dem-mod-event.php"><i class="far fa-clock"></i><span>Dem Modif Even</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/admin/org_events.php/event_org.php"><i class="fas fa-check"></i><span>Evenement programmées</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="calendrier.php"><i class="fas fa-table"></i><span>Calendrier</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="deconnexion.php"><i class="far fa-user-circle"></i><span>Deconnexion</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column main-content-container " id="content-wrapper">
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Administration</span><img class="border rounded-circle img-profile" src="assets/img/avatars/ensak.jpg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="pages/admin/dashboard.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Dashboard</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="pages/admin/deconnexion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Tableau init-->
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Calendrier Evenement</p>
                        </div>
                        <div class="card-body"> 

                            <div id="calendar"></div>



<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                <?php
                $sql = "SELECT * FROM event WHERE checked=1";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $dateTimeStart = explode(" ", $row['debut']);
                    $dateTimeEnd   = explode(" ", $row['fin']);
                    $eventColor = getRandomColor(); // Utilisez une fonction pour obtenir une couleur aléatoire

                    echo '{';
                    echo 'title: "' . $row['titre'] . '",';
                    echo 'start: "' . $dateTimeStart[0] . 'T' . $dateTimeStart[1] . '",';
                    echo 'end: "' . $dateTimeEnd[0] . 'T' . $dateTimeEnd[1] . '",';
                    echo 'color: "' . $eventColor . '"'; // Ajoutez la couleur pour chaque événement
                    echo '},';
                }

                // Fonction pour obtenir une couleur aléatoire
                function getRandomColor() {
                    $letters = '0123456789ABCDEF';
                    $color = '#';
                    for ($i = 0; $i < 6; $i++) {
                        $color .= $letters[rand(0, 15)];
                    }
                    return $color;
                }
                ?>
            ],
            themeSystem: 'bootstrap4', // Utilisez le thème Bootstrap 4
            eventTextColor: '#ffffff', // Couleur du texte de l'événement
        });
    });
</script>

                        </div>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>



