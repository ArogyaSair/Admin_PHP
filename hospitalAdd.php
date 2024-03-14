<script>
function getCity() {
    var dstate = document.getElementById("state").value;
    var xhtp;
    xhtp = new XMLHttpRequest();
    var data = "stated=" + dstate;
    xhtp.open("POST", "getCity.php", true);
    xhtp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhtp.send(data);
    xhtp.onreadystatechange = display_data;
    // alert(data);
    function display_data() {
        if (xhtp.readyState == 4) {
            if (xhtp.status == 200) {
                // alert(xhtp.responseText);    
                document.getElementById("city").innerHTML = xhtp.responseText;
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}
</script>

<?php
session_start();
    require_once("config.php");
    $DatabaseFacilities = $database->getReference('ArogyaSair/AllServices')->getSnapshot()->getValue();
    $DatabaseState = $database->getReference('ArogyaSair/tblStates')->getSnapshot()->getValue();
    $DatabaseCity = $database->getReference('ArogyaSair/tblCity')->getSnapshot()->getValue();
    $DatabaseTreatment = $database->getReference('ArogyaSair/AllTreatment')->getSnapshot()->getValue();
    $DatabaseDoctors = $database->getReference('ArogyaSair/AllDoctor')->getSnapshot()->getValue();
    $DatabaseHospital = $database->getReference("ArogyaSair/tblHospital")->getSnapshot()->getValue();
    $DatabaseDisease = $database->getReference("ArogyaSair/tblDisease")->getSnapshot()->getValue();

    use Kreait\Firebase\Factory;

    $storage = (new Factory())
    ->withServiceAccount('jsonkeys/arogyasair-157e8-firebase-adminsdk-mrqpy-bba49d8268.json')
        ->withDefaultStorageBucket('arogyasair-157e8.appspot.com')
        ->createStorage();
    
    $bucket = $storage->getBucket();

    if(isset($_POST["btnSubmit"])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $states = $_POST['state'];
        $city = $_POST['city'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $photo=$_FILES['f1']['name'];
        $facility="";
        $doctor = "";
        $treatment="";
        $Disease = "";
        // Image insert in database in folder
        if($_FILES['f1']['name']){
            $bucket->upload(
                file_get_contents($_FILES['f1']['tmp_name']),
                [
                'name' =>"HospitalImage/".$_FILES['f1']['name']
                ]
            );
        }
        if (isset($_POST['facility'])) {
            $Facilities = $_POST['facility'];
            foreach ($Facilities as $Facility) {
                $facility = $Facility .", ". $facility;
            }
        }
        if (isset($_POST['treatment'])) {
            $Treatments = $_POST['treatment'];
            foreach ($Treatments as $Treatment) {    
                $treatment = $Treatment .", ". $treatment;
            }
        }
        if (isset($_POST['doctor'])) {
            $Doctors = $_POST['doctor'];
            foreach ($Doctors as $doctors) {
                $doctor = $doctors .", ". $doctor;
            }
        }
        if (isset($_POST['Disease'])) {
            $Diseases = $_POST['Disease'];
            foreach ($Diseases as $diseases) {
                $Disease = $diseases .", ". $Disease;
            }
        }
        $count = 0;
        foreach($DatabaseHospital as $data){
            if(strtolower($data['HospitalName']) == strtolower($name)) 
            {
                if($data['HospitalCity'] == $city){
                    $count=$count+1;
                }
            }
        }
        if($count>0){
            echo "<script>alert('$name already exists in $city')</script>";
        }else{
            $newData = $database->getReference("ArogyaSair/tblHospital")->push([
                'HospitalName'=>$name,
                'Email'=>$email,
                'Password'=>$password,
                'HospitalAddress'=>$address,
                'HospitalState'=>$states,
                'HospitalCity'=>$city,
                'AvailableTreatments'=>$treatment,
                'AvailableFacilities'=>$facility,
                'AvailableDoctors'=>$doctor,
                'AvailableDisease'=>$Disease,
                'Photo' =>$photo,
            ])->getKey();
            header("location:hospitalView.php");
        }        
    }

    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Hospital</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" placeholder="Enter Hospital name" required
                        oninvalid="this.setCustomValidity('Please enter Hospital name')"
                        oninput="this.setCustomValidity('')">
                    <div class="invalid-feedback">
                        Please provide name.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Email</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="email" placeholder="Enter Hospital email ID" required>
                    <div class="invalid-feedback">
                        Please provide email.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Create Password</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="password" placeholder="Create password for hispital"
                        required>
                    <div class="invalid-feedback">
                        Please provide password.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Address</label>
                <div class="col-md-9">
                    <textarea name="address" class="form-control" required id="address" cols="10" rows="5"></textarea>
                    <div class="invalid-feedback">
                        Please provide address.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select State</label>
                <div class="col-md-9">
                    <select class="form-select select2 form-control" onChange="getCity()" name="state"
                        style="width: 100%; height: 36px;" id="state">
                        <option>Select State</option>
                        <?php
                    foreach($DatabaseState as $key=>$data){
                        ?>
                        <option value="<?=$key?>"><?=$data['StateName']?></option>
                        <?php
                    }
                ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select City</label>
                <div class="col-md-9">
                    <select class="select2 form-select" required name="city" id="city"
                        style="width: 100%; height: 36px;">
                    </select>
                    <div class="invalid-feedback">
                        Please provide city.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Diseases</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none mt-3" required name="Disease[]" multiple
                        style="height: 36px; width: 100%">
                        <?php
                        foreach($DatabaseDisease as $data){
                            ?>
                        <option value="<?=$data['DiseaseName']?>"><?=$data['DiseaseName']?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Please provide treatments.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Treatments</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none mt-3" required name="treatment[]" multiple
                        style="height: 36px; width: 100%">
                        <?php
                        foreach($DatabaseTreatment as $data){
                            ?>
                        <option value="<?=$data['TreatmentName']?>"><?=$data['TreatmentName']?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Please provide treatments.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Doctors</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none mt-3" required multiple
                        style="height: 36px; width: 100%" name="doctor[]">
                        <?php
                        foreach($DatabaseDoctors as $data){
                            ?>
                        <option value="<?=$data['DoctorName']?>"><?=$data['DoctorName']?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Please provide doctors.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Facilities</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none mt-3" required multiple name="facility[]"
                        style="height: 36px; width: 100%">
                        <?php
                        foreach($DatabaseFacilities as $data){
                            ?>
                        <option value="<?=$data['ServiceName']?>"><?=$data['ServiceName']?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Please provide Facilities.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">File Upload</label>
                <div class="col-md-4">
                    <div class="custom-file">
                        <!-- Image prview -->
                        <script type="text/javascript">
                        function previewImage(event) {
                            var input = event.target;
                            var image = document.getElementById('preview');
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    image.src = e.target.result;
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        </script>
                        <input type="file" name="f1" class="custom-file-input form-control" required
                            onchange="previewImage(event)" id="validatedCustomFile" />
                        <div class="invalid-feedback">
                            Please provide image.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom-file">
                        <img src="Images\NoImage.jpeg.jpg" id="preview" name="DatabaseImage" alt="" width=200px
                            height=140px>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add Hospital">
            </div>
        </div>
    </div>
</form>


<script>
document.querySelector('form')
    .addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

function validateForm() {
    var stateSelect = document.getElementById("stateSelect");
    var stateError = document.getElementById("stateError");

    if (stateSelect.value === "Select State") {
        stateError.style.display = "block";
        return false;
    } else {
        stateError.style.display = "none";
        return true;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('.needs-validation');

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity() || !validateForm()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    }, false);
});
</script>



<?php include_once("Footer.php");?>