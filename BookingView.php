<?php
    session_start();
    require_once("config.php");
    
    
    $DatabaseUserQuestion = $database->getReference('ArogyaSair/tblUserQuestions')->getSnapshot()->getValue();
    $DatabaseTreatment = $database->getReference('ArogyaSair/tblTreatment')->getSnapshot()->getValue();
    $DatabaseAppointment = $database->getReference('ArogyaSair/tblAppointment')->getSnapshot()->getValue();
    $DatabasePackages = $database->getReference('ArogyaSair/tblBookedPackages')->getSnapshot()->getValue();

    include_once("header.php");
?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Booked Appointments</h4>
                <div class="todo-widget scrollable" style="height: 450px">
                    <?php
                        foreach($DatabaseTreatment as  $key=>$data){
                            $userId = $data["PatientID"];
                            $DatabaseUser = $database->getReference("ArogyaSair/tblUser/$userId")->getSnapshot()->getValue();
                            $hospitalId = $data["HospitalID"];
                            $DatabaseHospital = $database->getReference("ArogyaSair/tblHospital/$hospitalId")->getSnapshot()->getValue();
                           
                            ?>
                            <hr>
                                <div class="card">
                                <div class="card-body" style="background-color: white">
                                    <div class="card1">
                                        <h4><b><?php echo "Doctor name: ".$data["DoctorName"];?></b></h4>
                                        <p><?php echo "User name: ".$DatabaseUser["Name"]?></p>
                                        <p><?php echo "DateTime: ".$data["DateOfAppointment"];?></p>
                                        <p><?php echo "Status: ".$data["Status"];?></p>
                                        <p><?php echo "Hospital name: ".$DatabaseHospital["HospitalName"];?></p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <?php
                            }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Booked Packages</h4>
                <div class="todo-widget scrollable" style="height: 450px">
                    <?php
                        foreach($DatabasePackages as $key=>$data){
                            $userId = $data["UserName"];
                            $DatabaseUser = $database->getReference("ArogyaSair/tblUser/$userId")->getSnapshot()->getValue();
                            $hospitalId = $data["HospitalName"];
                            $DatabaseHospital = $database->getReference("ArogyaSair/tblHospital/$hospitalId")->getSnapshot()->getValue();
                            if($data != ""){
                            ?>
                            <hr>
                                <div class="card">
                                <div class="card-body" style="background-color: white">
                                    <div class="card1">
                                        <h4><b><?php echo "Package Name: ".$data["PackageName"]; ?></b></h4>
                                        <p><?php echo "User Name: ".$DatabaseUser["Name"] ?></p>
                                        <p><?php echo "Starting Date: ".$data["Date_of_starting"]; ?></p>
                                        <p><?php echo "Hospital Name: ".$DatabaseHospital["HospitalName"]; ?></p>
                                        
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
    include_once("footer.php");
?>