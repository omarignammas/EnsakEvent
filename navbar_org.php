<?php
function nav_bar($act,$baseURL = ''){
    $range = array_fill(0, 4, 'nav-link');
    $range[$act] = 'nav-link active';
 echo '<nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Ensak Event</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    
                    <li class="nav-item"><a class='.$range['0'].' href="'.$baseURL.'pages\organisateur\dashebord.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class='.$range['1'].' href="'.$baseURL.'pages\organisateur\dem_event\form-prom.php"><i class="far fa-clock"></i><span>Créer Evenement</span></a></li>
                    <li class="nav-item"><a class='.$range['2'].' href="'.$baseURL.'pages\organisateur\dem_event\etat-form-event.php"><i class="fas fa-clock"></i><span>Etat demandes</span></a></li>
                    <li class="nav-item"><a class='.$range['3'].' href="'.$baseURL.'calendrier-org.php"><i class="fas fa-table"></i><span>Calendrier</span></a></li>
                    <li class="nav-item"><a class='.$range['4'].' href="'.$baseURL.'deconnexion.php"><i class="far fa-user-circle"></i><span>Deconnexion</span></a></li>
                   

                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>';
    }