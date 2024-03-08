<?php
session_start();

    require_once("config.php");
    if(isset($_POST['btnReset'])){
        $newPassword = $_POST['password'];
        $cPassword = $_POST['confirm-password'];
        if($newPassword == $cPassword){
            $id=$_REQUEST['id'];
            $url="ArogyaSair/tblAdmin/$id";
            $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $database->getReference($url)->update([
                "Password"=>$hashPassword
            ]);
            echo "<script>alert('Passwords changed successfully..!!')</script>";
            header("location:login.php");
        }else{
            echo "<script>alert('Passwords do not match. Please try again.')</script>";
        }
    }
?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
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
                                            <span class="input-group-text bg-success text-white h-100"c id="basic-addon1"><i class="mdi mdi-lock fs-4"></i></span>
                                        </div>
                                        <input type="text" name="password" class="form-control form-control-lg" placeholder="Enter New Password" aria-describedby="basic-addon1" required />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                                        </div>
                                        <input type="text" name="confirm-password" class="form form-control-lg" placeholder="Enter Password Again" basic-addon1 required />
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top border-secondary">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="pt-3">
                                            <input type="submit" name="btnReset" value="Reset Password" class="btn btn-success text-white">
                                        </div>
                                    </div>
                                </div>
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