<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("location:dashboard.php");
    }

    require_once("config.php");

    if(isset($_POST['login'])){
        $user=$_POST['username'];
        $pass=$_POST['password'];
        if(str_contains($user,"@admin")){
            $url="ArogyaSair/tblAdmin/";
            $record = $database->getReference($url)->orderByChild('Username')->equalTo($user)->getSnapshot()->getValue();
            $DatabaseQnA = $database->getReference("ArogyaSair/tblUserQuestions")->getSnapshot()->getValue();
            $DatabaseTreatment = $database->getReference('ArogyaSair/tblTreatment')->getSnapshot()->getValue();
            $DatabaseAppointment = $database->getReference('ArogyaSair/tblAppointment')->getSnapshot()->getValue();
            if(sizeof($record)>0){
                foreach($record as $key=>$x){
                    if (password_verify($pass, $x['Password'])){
                        $_SESSION['name']=$x['Name'];
                        $_SESSION['username']=$x['Username'];
                        $_SESSION['aid']=$key;
                        $_SESSION["QnA"]=$DatabaseQnA;
                        $_SESSION["tblTreatment"]=$DatabaseTreatment;
                        $_SESSION["tblAppointment"]=$DatabaseAppointment;
                        header("location:dashboard.php");
                    }
                    else{
                        echo "<script>alert('Sorry..!! Wrong password..!!')</script>";
                    }
                }
            }
            else{
                echo "<script>alert('Sorry..!! Wrong username..!!')</script>";
            }
        }
        else{
            $url="ArogyaSair/tblDoctor/";
            $record = $database->getReference($url)->orderByChild('Email')->equalTo($user)->getSnapshot()->getValue();
            if(sizeof($record)>0){
                    foreach($record as $key=>$x){
                        if ($pass == $x['Password']){
                            $_SESSION['name']=$x['DoctorName'];
                            $_SESSION['username']=$x['Email'];
                            $_SESSION['did']=$key;
                            header("location:DoctorAppointment.php");
                        }
                        else{
                            echo "<script>alert('Sorry..!! Wrong password..!!')</script>";
                        }
                }
            }
            else{
                echo "<script>alert('Sorry..!! Wrong username..!!')</script>";
            }
        }
        
    }

?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/png" sizes="16x16" href="Images/ArogyaSairRound.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Arogya Sair Admin Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="Images/ArogyaSairRound1.png" />
    <link href="dist/css/style.min.css" rel="stylesheet" />
</head>

<body>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <center>
        <div class="row col-sm-4 ">
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
                <div class="auth-box bg-dark border-top border-secondary">
                    <div id="loginform">
                        <div class="text-center pt-3 pb-3">
                            <span class="db"><img src="Images/ArogyaSairName.png" width="280px" alt="logo" /></span>
                        </div>
                        <form class="form-horizontal mt-3" method="POST" id="loginform">
                            <div class="row pb-4">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white h-100"
                                                id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                                        </div>
                                        <input type="text" name="username" class="form-control form-control-lg"
                                            placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                            required="" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white h-100"
                                                id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form form-control-lg"
                                            placeholder="Password" aria-label="Password-describedby" basic-addon1 required="Please " />
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top border-secondary">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="pt-3">
                                            <button name="login" class="btn btn-success float-end text-white"
                                                type="submit">
                                                Login
                                            </button>
                                            <a href="forgotpass.php">
                                                <button class="btn btn-info" id="to-recover" type="button">
                                                    <i class="mdi mdi-lock me-1"></i>Lost password?
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(".preloader").fadeOut();
    $("#to-recover").on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $("#to-login").click(function() {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
</body>

</html>