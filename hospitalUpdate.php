<?php
session_start();
    require_once("config.php");

    $DatabaseFacilities = $database->getReference('ArogyaSair/AllServices')->getSnapshot()->getValue();
    $DatabaseState = $database->getReference('ArogyaSair/tblStates')->getSnapshot()->getValue();
    $DatabaseCity = $database->getReference('ArogyaSair/tblCity')->getSnapshot()->getValue();
    $DatabaseTreatment = $database->getReference('ArogyaSair/AllTreatment')->getSnapshot()->getValue();
    $DatabaseDoctors = $database->getReference('ArogyaSair/AllDoctor')->getSnapshot()->getValue();

    use Kreait\Firebase\Factory;

    $storage = (new Factory())
    ->withServiceAccount('jsonkeys/arogyasair-157e8-firebase-adminsdk-mrqpy-bba49d8268.json')
        ->withDefaultStorageBucket('arogyasair-157e8.appspot.com')
        ->createStorage();
    
    $bucket = $storage->getBucket();

    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $url="ArogyaSair/tblHospital/$id";
        $datalist=$database->getReference($url)->getSnapshot()->getValue();
        $ExplodTreatments = explode(",",$datalist['AvailableTreatments']);
        $TreatmentSize = sizeof($ExplodTreatments)-1;
        $ExplodDoctors = explode(",",$datalist['AvailableDoctors']);
        $DoctorSize = sizeof($ExplodDoctors)-1;

        $ExplodServices = explode(",",$datalist['AvailableFacilities']);
        $ServiceSize = sizeof($ExplodServices)-1;
        
        // Retriving image from database
        $file1=$datalist['Photo'];
        $path="HospitalImage/$file1";
        $object = $bucket->object($path);
        $expirationDate = new \DateTimeImmutable('2030-01-01T00:00:00Z');
        $downloadUrl = $object->signedUrl($expirationDate);
    }

    

    if(isset($_POST["btnSubmit"])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $photo = $_FILES['f1']['name'];
        $facility="";
        $doctor = "";
        $treatment="";
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
        // Image inserting in database folder
        if($_FILES['f1']['name']){
            $bucket->upload(
                file_get_contents($_FILES['f1']['tmp_name']),
                [
                    'name' =>"HospitalImage/".$_FILES['f1']['name']
                ]
            );
        }

        // If image is not selected for update then keep the previous image else get the new one
        if($_FILES['f1']['name']){
            $bucket->upload(
                file_get_contents($_FILES['f1']['tmp_name']),
                [
                    'name' =>"HospitalImage/".$_FILES['f1']['name']
                ]
            );

            $existingFile = $bucket->object($datalist['Photo']);
            if ($existingFile->exists()) {
                $existingFile->delete();
            }
            $database->getReference($url)->update([
                'HospitalName'=>$name,
                'HospitalAddress'=>$address,
                'HospitalState'=>$state,
                'HospitalCity'=>$city,
                'Email'=>$email,
                'AvailableTreatments'=>$treatment,
                'AvailableFacilities'=>$facility,
                'AvailableDoctors'=>$doctor,
                'Photo'=>$photo,
            ]);
        } else {
            $database->getReference($url)->update([
                'HospitalName'=>$name,
                'HospitalAddress'=>$address,
                'HospitalState'=>$state,
                'HospitalCity'=>$city,
                'AvailableTreatments'=>$treatment,
                'AvailableFacilities'=>$facility,
                'AvailableDoctors'=>$doctor,
            ]);
        }
        header("location:hospitalView.php");
    }
    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Hospital</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Hospital Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" id="name"
                        value="<?=$datalist['HospitalName']?>" placeholder="Enter Your name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Email ID</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="email" id="name"
                        value="<?=$datalist['Email']?>" placeholder="Enter Your name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Address</label>
                <div class="col-md-9">
                    <textarea name="address" class="form-control" id="address" cols="10"
                        rows="5"><?=$datalist['HospitalAddress']?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select State</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none" name="state" style="width: 100%; height: 36px">
                        <option>Select State</option>
                        <?php
                            foreach($DatabaseState as $key=>$data){
                                if($datalist['HospitalState'] == $data['StateName']){
                                ?>
                                    <option value="<?=$data['StateName']?>" selected><?=$data['StateName']?></option>
                                <?php
                                }
                                    ?>
                                    <option value="<?=$data['StateName']?>"><?=$data['StateName']?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select City</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none" name="city" style="width: 100%; height: 36px">
                        <option>Select City</option>
                        <?php
                        foreach($DatabaseCity as $data){
                            ?>
                        <?php
                                    if($datalist['HospitalCity']==$data['CityName']){
                                        ?>
                        <option value="<?=$data['CityName']?>" selected><?=$data['CityName']?></option>
                        <?php
                                    }
                                ?>
                        <option value="<?=$data['CityName']?>"><?=$data['CityName']?></option>
                        <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Treatments</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none mt-3" name="treatment[]" multiple
                        style="height: 36px; width: 100%">
                        <?php
                            for($i=0;$i<$TreatmentSize;$i++){
                                $t['AvailableTreatments']=$ExplodTreatments[$i];
                                ?>
                        <option value="<?=$ExplodTreatments[$i]?>" selected><?=$ExplodTreatments[$i]?></option>
                        <?php
                            }
                            foreach($DatabaseTreatment as $data){
                                ?>
                        <option value="<?=$data['TreatmentName']?>"><?=$data['TreatmentName']?></option>
                        <?php
                       }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Doctors</label>
                <div class="col-md-9">
                <select class="select2 form-select shadow-none mt-3" name="doctor[]" multiple
                        style="height: 36px; width: 100%">
                        <?php
                            for($i=0;$i<$DoctorSize;$i++){
                                $t['AvailableDoctors']=$ExplodDoctors[$i];
                                ?>
                        <option value="<?=$ExplodDoctors[$i]?>" selected><?=$ExplodDoctors[$i]?></option>
                        <?php
                            }
                            foreach($DatabaseDoctors as $data){
                                ?>
                        <option value="<?=$data['DoctorName']?>"><?=$data['DoctorName']?></option>
                        <?php
                       }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Facilities</label>
                <div class="col-md-9">
                <select class="select2 form-select shadow-none mt-3" name="facility[]" multiple style="height: 36px; width: 100%">
                        <?php
                            for($i=0;$i<$ServiceSize;$i++){
                                $t['AvailableServices']=$ExplodServices[$i];
                            ?>
                                <option value="<?=$ExplodServices[$i]?>" selected><?=$ExplodServices[$i]?></option>
                            <?php
                            }
                            foreach($DatabaseFacilities as $data){
                            ?>
                                <option value="<?=$data['ServiceName']?>"><?=$data['ServiceName']?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">File Upload</label>
                <div class="col-md-4">
                    <div class="custom-file">
                        <!-- Image preview -->
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
                        <input type="file" name="f1" class="custom-file-input" onchange="previewImage(event)" id="validatedCustomFile" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom-file">
                        <img src="<?=$downloadUrl?>" id="preview" name="DatabaseImage" alt="" width=150px height=150px>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Update Hospital">
            </div>
        </div>
    </div>
</form>

<?php include_once("Footer.php");?>