<?php
    session_start();
    require_once("config.php");
    if(isset($_REQUEST['btnSubmit'])){
        $name = $_REQUEST['name'];
        $add = $_REQUEST['address'];
        $phone = $_REQUEST['contact'];
        $email = $_REQUEST['email'];
        $newdata = $database->getReference('MyPeroject/tblUser')->push(['Username' => $name,'Address' => $add,'ContactNo' => $phone,'Email' => $email])->getKey();
    }
    if(isset($_REQUEST['btnReply'])){
        $answer=$_REQUEST['answere'];
        $id = $_REQUEST["id"];
        $database->getReference("ArogyaSair/tblUserQuestions/$id")->update([
            "Status"=>"Answered",
        ]);
        $url="ArogyaSair/tblUserQuestions/$id";
        $Email="";
        $record = $database->getReference($url)->getSnapshot()->getValue();
        $question = $record["Question"];
        $userId = $record["UserId"];
        $userData = $database->getReference("ArogyaSair/tblUser/$userId")->getSnapshot()->getValue();
        $Email = $userData["Email"];
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
        $mail->Subject = "Arogya Sair ".$record["Question"];
        $email=$Email;
        
        //http://127.0.0.1/hope/CodeIgniter-3.1.6//index.php/login_con/resetpass
        $mail->Body = "Question: $question <br> Answer: $answer <br> Feel free to ask any other quries <br> From Arogya Sair Admin";
        $mail->AddAddress($email);
        $mail->Send();
        header("location:dashboard.php");
    }
    $DatabaseUserQuestion = $database->getReference('ArogyaSair/tblUserQuestions')->getSnapshot()->getValue();
    $DatabaseTreatment = $database->getReference('ArogyaSair/tblTreatment')->getSnapshot()->getValue();
    $DatabaseAppointment = $database->getReference('ArogyaSair/tblAppointment')->getSnapshot()->getValue();
    include_once("header.php");
?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Questions</h4>
                <div class="todo-widget scrollable" style="height: 450px">
                    <?php
                        foreach($DatabaseUserQuestion as $key=>$data){
                            $userId = $data["UserId"];
                            $DatabaseUser = $database->getReference("ArogyaSair/tblUser/$userId")->getSnapshot()->getValue();
                            if($data["Status"] != "Answered"){
                            ?>
                            <hr>
                                <div class="card">
                                <div class="card-body" style="background-color: white">
                                    <div class="card1">
                                        <h4><b><?php echo "Question: ".$data["Question"]; ?></b></h4>
                                        <p><?php echo "User Name: ".$DatabaseUser["Name"] ?></p>
                                        <p><?php echo "DateTime: ".$data["DateTime"]; ?></p>
                                        <a  class="btn btn-success float-start text-white p-2" href="dashboard.php?id=<?php echo $key?>">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Complete Appointments</h4>
                <div class="todo-widget scrollable" style="height: 450px">
                    <?php
                        foreach($DatabaseTreatment as $key=>$data){
                            $userId = $data["PatientID"];
                            $DatabaseUser = $database->getReference("ArogyaSair/tblUser/$userId")->getSnapshot()->getValue();
                            $hospitalId = $data["HospitalID"];
                            $DatabaseHospital = $database->getReference("ArogyaSair/tblHospital/$hospitalId")->getSnapshot()->getValue();
                            if($data["Status"] == "Complete"){
                            ?>
                            <hr>
                                <div class="card">
                                <div class="card-body" style="background-color: white">
                                    <div class="card1">
                                        <h4><b><?php echo "Doctor name: ".$data["DoctorName"];?></b></h4>
                                        <p><?php echo "User name: ".$DatabaseUser["Name"]?></p>
                                        <p><?php echo "DateTime: ".$data["DateOfAppointment"];?></p>
                                        <p><?php echo "Hospital name: ".$DatabaseHospital["HospitalName"];?></p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Panding Appointments</h4>
                <div class="todo-widget scrollable" style="height: 450px">
                    <?php
                        foreach($DatabaseAppointment as $key=>$data){
                            $userId = $data["UserId"];
                            $DatabaseUser = $database->getReference("ArogyaSair/tblUser/$userId")->getSnapshot()->getValue();
                            $hospitalId = $data["HospitalId"];
                            $DatabaseHospital = $database->getReference("ArogyaSair/tblHospital/$hospitalId")->getSnapshot()->getValue();
                            if($data != ""){
                            if($data["Status"] == "Pending"){
                            ?>
                            <hr>
                                <div class="card">
                                <div class="card-body" style="background-color: white">
                                    <div class="card1">
                                        <h4><b><?php echo "Hospital Name: ".$DatabaseHospital["HospitalName"]; ?></b></h4>
                                        <p><?php echo "User Name: ".$DatabaseUser["Name"] ?></p>
                                        <p><?php echo "Date: ".$data["AppointmentDate"]; ?></p>
                                        <p><?php echo "Appointment for: ".$data["Disease"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php
                            }
                        }else{
                            ?>
                                <hr>
                                <div class="card">
                                    <div class="card-body" style="background-color: white">
                                        <div class="card1">
                                            <h4><b>No Pending Questions available</b></h4>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php
                        }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_REQUEST["id"]))
        {
            $Id = $_REQUEST["id"];
            $DatabaseQuestionId = $database->getReference("ArogyaSair/tblUserQuestions/$Id")->getSnapshot()->getValue();   
    ?>
    <form method="post">
    <div class="card">
        <div class="card-body">
            <div class="card-1">
            <h4><b><?php echo "Question: ".$DatabaseQuestionId["Question"]; ?></b></h4>
            <textarea name="answere" class="form-control" required id="address" cols="10" rows="5"></textarea required>
            <input type="submit" class="btn btn-success float-start text-white p-2" value="Send Reply" name="btnReply">                     
            </div>
        </div>
    </div>
        </form>
    <?php
        }
    ?>
</div>
<?php
    include_once("footer.php");
?>