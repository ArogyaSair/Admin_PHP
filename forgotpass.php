<?php
session_start();
    require_once('config.php');
    $otp = "";
    $name = "";
    if(isset($_POST['btnSendOTP'])){
        $adminName = $_POST['name'];
        $name = $adminName;
        if(str_contains($adminName,"@admin")){
            $url="ArogyaSair/tblAdmin/";
            $Email="";
            $record = $database->getReference($url)->orderByChild('Username')->equalTo($adminName)->getSnapshot()->getValue();
            foreach($record as $data){
                $Email = $data['Email'];
            }
            $url= "PHPMailer/class.smtp.php";
            include("$url"); 
            // optional, gets called from within class.phpmailer.php if not 
            $url2="PHPMailer/class.phpmailer.php";
            require_once("$url2");
            
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username   = "arogyasair@gmail.com";  // GMAIL username
            $mail->Password   = "nrtj tjtr cfzf yzej";            // GMAIL password
            
            $mail->SetFrom("arogyasair@gmail.com");
            $mail->Subject = "Arogya Sair Admin Password Change Request";
            $email=$Email;
            
            $permitted_chars = '0123456789';
            $otp=substr(str_shuffle($permitted_chars), 0, 5);
            $_SESSION['OTP'] = $otp;
            foreach($record as $key=>$data){
                $_SESSION['id'] = $key;
            }
            
            //http://127.0.0.1/hope/CodeIgniter-3.1.6//index.php/login_con/resetpass
            $mail->Body = "Hello OTP is $otp";
            $mail->AddAddress($email);
            $mail->Send();
        }else{
            $url="ArogyaSair/tblDoctor/";
            $Email="";
            $doctorName = "";
            $record = $database->getReference($url)->orderByChild('Email')->equalTo($adminName)->getSnapshot()->getValue();
            foreach($record as $data){
                $Email = $data['Email'];
                $doctorName = $data["DoctorName"];
            }
            $url= "PHPMailer/class.smtp.php";
            include("$url"); 
            // optional, gets called from within class.phpmailer.php if not 
            $url2="PHPMailer/class.phpmailer.php";
            require_once("$url2");
            
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username   = "arogyasair@gmail.com";  // GMAIL username
            $mail->Password   = "nrtj tjtr cfzf yzej";            // GMAIL password
            
            $mail->SetFrom("arogyasair@gmail.com");
            $mail->Subject = "Arogya Sair Doctor Password Change Request";
            $email=$Email;
            
            $permitted_chars = '0123456789';
            $otp=substr(str_shuffle($permitted_chars), 0, 5);
            $_SESSION['OTP'] = $otp;
            foreach($record as $key=>$data){
                $_SESSION['id'] = $key;
            }
            
            //http://127.0.0.1/hope/CodeIgniter-3.1.6//index.php/login_con/resetpass
            $mail->Body = "OTP is to change the password for Dr.$doctorName is $otp";
            $mail->AddAddress($email);
            $mail->Send();
        }
    }
    if(isset($_POST['btnVerifyOTPAdmin'])){
        $userOtp = $_POST["OTP"];
        if($userOtp == $_SESSION['OTP']){
            header("location:NewPassword.php?aid={$_SESSION['id']}");
        }
        else{
            echo "<script>alert('Wrong OTP')</script>";
        }
    }
    if(isset($_POST['btnVerifyOTPDoctor'])){
        $userOtp = $_POST["OTP"];
        if($userOtp == $_SESSION['OTP']){
            header("location:NewPassword.php?did={$_SESSION['id']}");
        }
        else{
            echo "<script>alert('Wrong OTP')</script>";
        }
    }
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Arogya Sair Admin Password Reset</title>
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
                        <Form method="POST">
                            <div class="main-wrapper">
                                <div
                                    class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
                                    <div class="auth-box bg-dark border-top border-secondary">
                                        <div id="loginform">
                                            <div id="recoverform">
                                                <?php
                                                if(!isset($_POST['btnSendOTP'])){
                                                    ?>
                                                    <div class="text-center mt-3">
                                                        <span class="text-white">Enter your admin name / Doctor Email below for OTP to reset password.</span>
                                                    </div>
                                                    <div class="input-group mb-3 mt-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter Admin username" required name="name" aria-label="Username" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="row mt-3 pt-3 border-top border-secondary">
                                                        <center>
                                                            <div class="pb-4">
                                                                <input type="submit" value="Send OTP" class="btn btn-info me-5" name="btnSendOTP">
                                                                <a class="btn btn-success text-white  ms-5" href="Login.php" id="to-login" name="action">Back To Login</a>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <?php
                                                if(isset($_POST['btnSendOTP']) && str_contains($name,"@admin")){
                                                    ?>
                                                        <div class="text-center"><span class="text-white">Enter OTP</span></div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-danger text-white h-100"
                                                                    id="basic-addon1"><i class="mdi mdi-email fs-4"></i></span>
                                                            </div>
                                                    <?php
                                                    foreach($record as $data){
                                                    ?>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Your email" aria-label="Username" value="<?=$data['Email']?>" aria-describedby="basic-addon1" readonly />
                                                        <?php
                                                    }
                                                    ?>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-key fs-4"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter OTP" name="OTP" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="row mt-3 pt-3 border-top border-secondary">
                                                        <div class="col-12">
                                                            <input type="submit" value="Verify OTP" class="btn btn-info float-end" name="btnVerifyOTPAdmin">
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else if(isset($_POST['btnSendOTP'])){
                                                    ?>
                                                        <div class="text-center"><span class="text-white">Enter OTP</span></div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-danger text-white h-100"
                                                                    id="basic-addon1"><i class="mdi mdi-email fs-4"></i></span>
                                                            </div>
                                                    <?php
                                                    foreach($record as $data){
                                                    ?>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Your email" aria-label="Username" value="<?=$data['Email']?>" aria-describedby="basic-addon1" readonly />
                                                        <?php
                                                    }
                                                    ?>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-key fs-4"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-lg" placeholder="Enter OTP" name="OTP" aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="row mt-3 pt-3 border-top border-secondary">
                                                        <div class="col-12">
                                                            <input type="submit" value="Verify OTP" class="btn btn-info float-end" name="btnVerifyOTPDoctor">
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </Form>

                    </div>
                </div>
            </div>
            </form>
        </div>
        </div>
        </div>
        </div>
    </center>
</body>

</html>