<?php
include("includes/connexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sub'])) {
    $_SESSION['login']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    $login = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM `organisateur` WHERE Mail_Org='$login';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        if ($data && $password = $data['pass']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['login'] = $login;
            $_SESSION['pass'] = $pass;
            $_SESSION['nom_org'] = $data['nom_org'];
            $_SESSION['CIN_resp'] = $data['CIN_resp'];
            if($login=='ensakenitraadm@gmail.com'){  
            header('location: pages/admin/dem_event_reçu/form-event_reçu.php');
           }else{
            header('location: pages/organisateur/dem_event/etat-form-event.php');
            exit;}
        } else {
            
            echo "<h2>Votre login ou password est incorrect</h2>";
        }
    } else {
        die('Error: ' . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/ENSAFENTAINE.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" action="#" method="POST" >
                                        <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success d-block btn-user w-100 text-white" name='sub' type="submit">Login</button>
                                        <hr>
                                    </form>
                                  
                                     <div class="mb-3"></div>
                                    <button  class='btn btn-success btn-sm ms-2' type="submit"><a class='text-white text-decoration-none d-inline-block p-2' href="pages\index\index.php">Retou à l'acceuil</a></button>
                                    <button class='btn btn-success btn-sm ms-2' type="submit"> <a class='text-white text-decoration-none d-inline-block p-2' href="pages\organisateur\dem_org\form_org.html">Create an Account!</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>