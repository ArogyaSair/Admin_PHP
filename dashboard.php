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
                            ?>
                            <hr>
                                <div class="card">
                                <div class="card-body" style="background-color: white">
                                    <div class="card1">
                                        <h4><b><?php echo "Question: ".$data["Question"]; ?></b></h4>
                                        <p><?php echo "User Name: ".$DatabaseUser["Name"] ?></p>
                                        <p><?php echo "DateTime: ".$data["DateTime"]; ?></p>
                                        <!-- <input type="submit" value="Reply" class="btn btn-success float-start text-white">
                                        <a href="" class="btn btn-success float-start text-white p-2">Reply</a> -->
                                        <div id="reply-section-<?php echo $data['Question']; ?>" style="display: none;"> 
                                        <textarea name="reply-text" rows="4" cols="50"></textarea><br>
                                        <a href="#" class="btn btn-success send-reply" data-question-id="<?php echo $data['Question']; ?>">Send Reply</a> 
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php
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
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    $('.btnReply').click(function() {
        $(this).closest('.card').find('.reply-section').toggle();
    });
});

$('.send-reply').click(function(event) {
    event.preventDefault(); // Prevent default link behavior

    var replyText = $(this).closest('.reply-section').find('textarea').val();
    var questionId = $(this).data('question-id');

    $.ajax({
        url: 'send-reply.php', // Adjust the URL for your server-side script
        type: 'POST',
        data: {
            questionId: questionId,
            replyText: replyText
        },
        success: function(response) {
            // Handle successful reply submission (e.g., show a success message)
        },
        error: function(error) {
            // Handle any errors
        }
    });
});
</script>
<?php
    include_once("footer.php");
?>