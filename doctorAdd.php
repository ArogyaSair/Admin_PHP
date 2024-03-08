<?php
session_start();

    require_once("config.php");
    $DatabaseSpe = $database->getReference("ArogyaSair/tblSpe")->getSnapshot()->getValue();


    use Kreait\Firebase\Factory;

    $storage = (new Factory())
    ->withServiceAccount('jsonkeys/arogyasair-157e8-firebase-adminsdk-mrqpy-bba49d8268.json')
        ->withDefaultStorageBucket('arogyasair-157e8.appspot.com')
        ->createStorage();
    
    $bucket = $storage->getBucket();

    if(isset($_POST["btnSubmit"])){
        $Fname = $_POST['name'];
        $Sname = $_POST['surname'];
        $name = $Fname." ".$Sname;
        $username = strtolower($Fname."@doctor");
        $password = $_POST['password'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $DOB = $_POST['DOB'];
        $photo=$_FILES['f1']['name'];
        $doc=$_FILES['doc']['name'];
        $gender = $_POST['gender'];
        $spe="";
        $hashPassword = password_hash($pass, PASSWORD_DEFAULT);
        // Image insert in database in folder
        if($_FILES['f1']['name']){
            $bucket->upload(
                file_get_contents($_FILES['f1']['tmp_name']),
                [
                'name' =>"DoctorImage/".$_FILES['f1']['name']
                ]
            );
        }
        if($_FILES['doc']['name']){
            $bucket->upload(
                file_get_contents($_FILES['doc']['tmp_name']),
                [
                'name' =>"DoctorDocument/".$_FILES['doc']['name']
                ]
            );
        }
        if (isset($_POST['speciality'])) {
            $Speciality = $_POST['speciality'];
            foreach ($Speciality as $Specialities) {
                $spe = $Specialities .", ". $spe;
            }
        }
        // $count = 0;
        // foreach($DatabaseHospital as $data){
        //     if(strtolower($data['HospitalName']) == strtolower($name)) 
        //     {
        //         if($data['HospitalCity'] == $city){
        //             $count=$count+1;
        //         }
        //     }
        // }
        // if($count>0){
            // echo "<script>alert('$name already exists in $city')</script>";
        // }else{
            $newData = $database->getReference("ArogyaSair/tblDoctor")->push([
                'DoctorName'=>$name,
                'Username'=>$username,
                'Password'=>$hashPassword,
                'Email'=>$email,
                'Contact'=>$contact,
                'DoctorAddress'=>$address,
                'Speciality'=>$spe,
                'Photo' =>$photo,
                'Documents' => $doc,
                'DateOfBirth' => $DOB,
                'Gender'=>$gender
            ])->getKey();
            header("location:doctorView.php");
        // }        
    }

    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Doctor</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name"  placeholder="Enter name (without prefix DR.)" required>
                    <div class="invalid-feedback">
                        Please provide name.
                    </div>
               </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Surname</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="surname" id="name" placeholder="Enter Surname" required>
                    <div class="invalid-feedback">
                        Please provide surname.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Create Passwprd</label>
                <div class="col-md-9">
                    <input class="form-control" required type="text" name="password" placeholder="Create pasasword">
                    <div class="invalid-feedback">
                        Please provide password.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Address</label>
                <div class="col-md-9">
                    <textarea name="address" class="form-control" required id="address" cols="10" rows="5"></textarea required>
                    <div class="invalid-feedback">
                        Please provide address.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Email</label>
                <div class="col-md-9">
                    <input class="form-control" required type="email" name="email" placeholder="Enter email" required>
                    <div class="invalid-feedback">
                        Please provide email.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Contact number</label>
                <div class="col-md-9">
                    <input class="form-control" required type="number" name="contact" placeholder="Enter Contact number" required>
                    <div class="invalid-feedback">
                        Please provide contact number.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Gender</label>
                <div class="col-md-9">
                    <div class="form-check">
                        <input type="radio" value="Male" class="form-check-input" id="customControlValidation1" name="gender" required />
                        <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" value="Female" class="form-check-input" id="customControlValidation2" name="gender" required />
                        <label class="form-check-label mb-0" for="customControlValidation2">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" value="Others" class="form-check-input" id="customControlValidation3" name="gender" required />
                        <label class="form-check-label mb-0" for="customControlValidation3">Others</label>
                    </div>
                    <div class="invalid-feedback">
                        Please provide gender.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Speciality</label>
                <div class="col-md-9">
                    <select class="select2 shadow-none mt-3 form-select" required name="speciality[]" multiple
                        style="height: 36px; width: 100%">
                        <?php
                        foreach($DatabaseSpe as $key=>$data){
                            ?>
                        <option value="<?=$data['Specilization']?>"><?=$data['Specilization']?></option>
                        <?php
                        }
                    ?>
                    </select>
                    <div class="invalid-feedback">
                        Please provide Speciality.
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Date Of Birth</label>
                <div class="col-md-9">
                        <input type="DATE" class="form-control" name="DOB" value="<?= isset($datalist['DateOfBirth'])?>" required />
                    </div>
                    <div class="invalid-feedback">
                        Please provide date of birth.
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Your photo</label>
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
                        <input type="file" name="f1" class="custom-file-input form-control" onchange="previewImage(event)"
                            id="" required />
                            <div class="invalid-feedback">
                        Please provide image.
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom-file">
                        <img src="Images\NoImage.jpeg.jpg" id="preview" name="DatabaseImage" alt="" width=200px height=140px>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Upload your documents</label>
                <div class="col-md-4">
                    <div class="custom-file">
                        <input type="file" accept="application/pdf" name="doc" class="custom-file-input form-control" id="validatedCustomFile" required/>
                        <div class="invalid-feedback">
                        Please provide documents.
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add Doctor">
            </div>
        </div>
    </div>
</form>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<?php
    include_once("footer.php");
?>