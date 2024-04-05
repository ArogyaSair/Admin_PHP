<?php
session_start();
require_once("config.php");

if(isset($_REQUEST["aid"])){
    $id = $_REQUEST["aid"];
    $DatabaseTreatmentComplete = $database->getReference("ArogyaSair/tblTreatment/$id")->getSnapshot()->getValue();
    $sppointmentId = $DatabaseTreatmentComplete["AppointmentID"];
    $database->getReference("ArogyaSair/tblTreatment/$id")->update([
        "Status"=>"Complete"
    ]);
    $database->getReference("ArogyaSair/tblAppointment/$sppointmentId")->update([
        "Status"=>"Complete"
    ]);
    $delayedAppointmentsRef = $database->getReference("ArogyaSair/tblDelayedAppointment")->orderByChild("AppointmentId")->equalTo($sppointmentId)->getSnapshot()->getValue();
    foreach ($delayedAppointmentsRef as $delayedAppointmentKey => $delayedAppointment) {
        $database->getReference("ArogyaSair/tblDelayedAppointment/$delayedAppointmentKey")->update([
            "Status" => "Complete"
        ]);
    }
    header("location:DoctorAppointment.php");
}

$DatabaseTreatment = $database->getReference('ArogyaSair/tblTreatment')->getSnapshot()->getValue();
$name=$_SESSION['did'];
   
include_once("header.php");

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="background-color: lavender">
                <div class="row">
                    <div class="col-md-11">
                        <h5 class="card-title">General checkup Appointments</h5>
                    </div>
                </div>
                <?php
                   $now = new DateTime();
                   $formattedDate = $now->format('j-n-Y');
                    foreach($DatabaseTreatment as $key=>$x){
                        if($x["DoctorName"] == $name && $x["DateOfAppointment"]==$formattedDate)
                        {
                            $hospitalId = $x["HospitalID"];
                            $DatabaseHospital = $database->getReference("ArogyaSair/tblHospital/$hospitalId")->getSnapshot()->getValue();
                            $patientId = $x["PatientID"];
                            $DatabaseUser = $database->getReference("ArogyaSair/tblUser/$patientId")->getSnapshot()->getValue();
                            if($x["Status"] == "Approved" && $x["Disease"] == "General Checkup"){
                                ?>
                            <div class="card">
                                <div class="card-body" style="background-color: white">
                                    <div class="card1">
                                        <h4><b><?php echo "Date: ".$x["DateOfAppointment"]; ?></b></h4>
                                        <p><?php echo "Patient Name: ".$DatabaseUser["Name"] ?></p>
                                        <p><?php echo "Disease: ".$x["Disease"]; ?></p>
                                        <p><?php echo "Status: ".$x["Status"]; ?></p>
                                        <p><?php echo "Hospital Name: ".$DatabaseHospital["HospitalName"] ?></p>
                                        <p><?php echo "Visit time: ".$x["VisitingTime"] ?></p>
                                        <a href="DoctorAppointment.php?aid=<?=$key?>" class="btn-success float-start text-white p-2">Complete</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
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