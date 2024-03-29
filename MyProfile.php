<?php
    session_start();
    require_once("config.php");
    use Kreait\Firebase\Factory;

    $storage = (new Factory())
    ->withServiceAccount('jsonkeys/arogyasair-157e8-firebase-adminsdk-mrqpy-bba49d8268.json')
        ->withDefaultStorageBucket('arogyasair-157e8.appspot.com')
        ->createStorage();
    
    $bucket = $storage->getBucket();
    
    if(isset($_SESSION["did"])){
        $id=$_SESSION['did'];
        $url="ArogyaSair/tblDoctor/$id";
        $datalist=$database->getReference($url)->getSnapshot()->getValue();
        $file1=$datalist['Photo'];
        $path="DoctorImage/$file1";
        $object = $bucket->object($path);
        $expirationDate = new \DateTimeImmutable('2030-01-01T00:00:00Z');
        $downloadUrl = $object->signedUrl($expirationDate);
    }

    if(isset($_SESSION["aid"])){
        $id=$_SESSION['aid'];
        $url="ArogyaSair/tblAdmin/$id";
        $datalist=$database->getReference($url)->getSnapshot()->getValue();
        $file1=$datalist['Photo'];
        $path="AdminImage/$file1";
        $object = $bucket->object($path);
        $expirationDate = new \DateTimeImmutable('2030-01-01T00:00:00Z');
        $downloadUrl = $object->signedUrl($expirationDate);
    }

    if(isset($_POST['btnSubmit'])){
        if(isset($_SESSION["aid"])){
            $name=$_POST['name'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $gender = $_POST['gender'];
            $age = $_POST['DOB'];
            $photo = $_FILES['f1']['name'];
            if($_FILES['f1']['name']){
                $bucket->upload(
                    file_get_contents($_FILES['f1']['tmp_name']),
                    [
                        'name' =>"AdminImage/".$_FILES['f1']['name']
                    ]
                );
        
                $existingFile = $bucket->object($datalist['Photo']);
                if ($existingFile->exists()) {
                    $existingFile->delete();
                }
                $record=$database->getReference($url)->update([
                    'Contact'=>$contact,
                    'Gender'=>$gender,
                    'Name'=>$name,
                    'Email'=>$email,
                    'DateOfBirth'=>$age,
                    'Photo' =>$photo
                ]);
            } else {
                $record=$database->getReference($url)->update([
                    'Contact'=>$contact,
                    'Gender'=>$gender,
                    'Name'=>$name,
                    'Email'=>$email,
                    'DateOfBirth'=>$age,
                ]);
            }
        }else if(isset($_SESSION["did"])){
            $name=$_POST['name'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $gender = $_POST['gender'];
            $age = $_POST['DOB'];
            $photo = $_FILES['f1']['name'];
            if($_FILES['f1']['name']){
                $bucket->upload(
                    file_get_contents($_FILES['f1']['tmp_name']),
                    [
                        'name' =>"DoctorImage/".$_FILES['f1']['name']
                    ]
                );
        
                $existingFile = $bucket->object($datalist['Photo']);
                if ($existingFile->exists()) {
                    $existingFile->delete();
                }
                $record=$database->getReference($url)->update([
                    'Contact'=>$contact,
                    'Gender'=>$gender,
                    'DoctorName'=>$name,
                    'Email'=>$email,
                    'DateOfBirth'=>$age,
                    'Photo' =>$photo
                ]);
            } else {
                $record=$database->getReference($url)->update([
                    'Contact'=>$contact,
                    'Gender'=>$gender,
                    'DoctorName'=>$name,
                    'Email'=>$email,
                    'DateOfBirth'=>$age,
                ]);
            }
        }
        header("location:Myprofile.php");
    }

    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data">
    <?php
        if(isset($_SESSION["aid"])){
            ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">My Profile</h5>
                <?php
                        if(isset($_REQUEST['btnUpdate'])){
                ?>
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
                                id="validatedCustomFile" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-file">
                            <img src="<?=$downloadUrl?>" id="preview" name="DatabaseImage" alt="" width=200px
                                height=140px>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3"> Name</label>
                    <div class="col-md-9">
                        <input class="form-control" value="<?=$datalist['Name']?>" type="text" name="name" id="name"
                            placeholder="Enter name " required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Email</label>
                    <div class="col-md-9">
                        <input class="form-control" required value="<?=$datalist['Email']?>" type="email" name="email"
                            placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Contact number</label>
                    <div class="col-md-9">
                        <input class="form-control" required value="<?=$datalist['Contact']?>" type="number" name="contact"
                            placeholder="Enter Contact number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Gender</label>
                    <div class="col-md-9">
                        <?php
                            if($datalist['Gender']=="Male"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Male" class="form-check-input" id="customControlValidation1"
                                name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Male" class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                        </div>
                        <?php
                            }
                        ?>
                        <?php
                            if($datalist['Gender']=="Female"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Female" class="form-check-input" id="customControlValidation1"
                                name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Female" class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                        </div>
                        <?php
                            }
                        ?>
                        <?php
                            if($datalist['Gender']=="Others"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Others" class="form-check-input" required
                                id="customControlValidation1" name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Others" class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Date Of Birth</label>
                    <div class="col-md-9">
                        <input type="DATE" class="form-control" name="DOB" value="<?=$datalist['DateOfBirth']?>" />
                    </div>
                </div>

                <div class="border-top">
                    <div class="card-body">
                        <input type="submit" class="btn btn-primary" name="btnSubmit" value="Save">
                    </div>
                </div>

            </div>
            <?php
                        }
                        else{
                ?>
                <div class="form-group row">
                    <label class="col-md-3">Your photo</label>
                    <div class="col-md-4">
                        <div class="custom-file">
                            <img src="<?=$downloadUrl?>" id="preview" name="DatabaseImage" alt="" width=200px
                                height=140px>
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3"> Name</label>
                <div class="col-md-9">
                    <input class="form-control" value="<?=$datalist['Name']?>" type="text" name="name" id="name" readonly
                        placeholder="Enter name " required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Email</label>
                <div class="col-md-9">
                    <input class="form-control" required value="<?=$datalist['Email']?>" type="email" name="email" readonly
                        placeholder="Enter email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Contact number</label>
                <div class="col-md-9">
                    <input class="form-control" required value="<?=$datalist['Contact']?>" type="number" name="contact"
                        readonly placeholder="Enter Contact number">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Gender</label>
                <div class="col-md-9">
                    <?php
                            if($datalist['Gender']=="Male"){
                                ?>
                    <div class="form-check">
                        <input type="radio" value="Male" disabled class="form-check-input" id="customControlValidation1"
                            name="gender" required checked="true" />
                        <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                    </div>
                    <?php
                            }
                            else{
                                ?>
                    <div class="form-check">
                        <input type="radio" value="Male" disabled class="form-check-input" id="customControlValidation1"
                            name="gender" required />
                        <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                    </div>
                    <?php
                            }
                        ?>
                    <?php
                            if($datalist['Gender']=="Female"){
                                ?>
                    <div class="form-check">
                        <input type="radio" value="Female" disabled class="form-check-input" id="customControlValidation1"
                            name="gender" required checked="true" />
                        <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                    </div>
                    <?php
                            }
                            else{
                                ?>
                    <div class="form-check">
                        <input type="radio" value="Female" disabled class="form-check-input" id="customControlValidation1"
                            name="gender" required />
                        <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                    </div>
                    <?php
                            }
                        ?>
                    <?php
                            if($datalist['Gender']=="Others"){
                                ?>
                    <div class="form-check">
                        <input type="radio" value="Others" class="form-check-input" required id="customControlValidation1"
                            disabled name="gender" required checked="true" />
                        <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                    </div>
                    <?php
                            }
                            else{
                                ?>
                    <div class="form-check">
                        <input type="radio" value="Others" disabled class="form-check-input" id="customControlValidation1"
                            name="gender" required />
                        <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                    </div>
                    <?php
                            }
                        ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3">Date Of Birth</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" readonly name="DOB" value="<?= $datalist['DateOfBirth']?>" />
                </div>
            </div>

            <div class="border-top">
                <div class="card-body">
                    <input type="submit" class="btn btn-primary" name="btnUpdate" value="Update">
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
    <?php
        }else if(isset($_SESSION["did"])){
            ?>
                <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Profile</h5>
                <?php
                        if(isset($_REQUEST['btnUpdate'])){
                ?>
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
                            <input type="file" name="f1" class="form-control" onchange="previewImage(event)"
                                id="validatedCustomFile" readonly/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-file">
                            <img src="<?=$downloadUrl?>" id="preview" name="DatabaseImage" alt="" width=200px height=140px>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3"> Name</label>
                    <div class="col-md-9">
                        <input class="form-control" value="<?=$datalist['DoctorName']?>" type="text" name="name" id="name" placeholder="Enter name " readonly required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Email</label>
                    <div class="col-md-9">
                        <input class="form-control" required value="<?=$datalist['Email']?>" type="email" name="email" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Contact number</label>
                    <div class="col-md-9">
                        <input class="form-control" required value="<?=$datalist['Contact']?>" type="number" name="contact" placeholder="Enter Contact number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Gender</label>
                    <div class="col-md-9">
                        <?php
                            if($datalist['Gender']=="Male"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Male"  class="form-check-input" id="customControlValidation1"
                                name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Male"  class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                        </div>
                        <?php
                            }
                        ?>
                        <?php
                            if($datalist['Gender']=="Female"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Female"  class="form-check-input" id="customControlValidation1"
                                name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Female"  class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                        </div>
                        <?php
                            }
                        ?>
                        <?php
                            if($datalist['Gender']=="Others"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Others" class="form-check-input" required
                                id="customControlValidation1"  name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Others"  class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label class="col-md-3">Date Of Birth</label>
                    <div class="col-md-9">
                            <input type="DATE" class="form-control" name="DOB" value="<?=$datalist['DateOfBirth']?>" />
                        </div>
                </div>

                <div class="border-top">
                <div class="card-body">
                    <input type="submit" class="btn btn-primary" name="btnSubmit" value="Save">
                </div>
            </div>
                
            </div>
                <?php
                        }
                        else{
                ?>
                <div class="form-group row">
                    <label class="col-md-3">Your photo</label>
                    <div class="col-md-4">
                        <div class="custom-file">
                            <img src="<?=$downloadUrl?>" id="preview" name="DatabaseImage" alt="" width=200px height=140px>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3"> Name</label>
                    <div class="col-md-9">
                        <input class="form-control" value="<?=$datalist['DoctorName']?>" type="text" name="name" id="name" readonly placeholder="Enter name " required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Email</label>
                    <div class="col-md-9">
                        <input class="form-control" required value="<?=$datalist['Email']?>" type="email" name="email" readonly placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 mt-3">Contact number</label>
                    <div class="col-md-9">
                        <input class="form-control" required value="<?=$datalist['Contact']?>" type="number" name="contact" readonly placeholder="Enter Contact number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Gender</label>
                    <div class="col-md-9">
                        <?php
                            if($datalist['Gender']=="Male"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Male" disabled class="form-check-input" id="customControlValidation1"
                                name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Male" disabled class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                        </div>
                        <?php
                            }
                        ?>
                        <?php
                            if($datalist['Gender']=="Female"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Female" disabled class="form-check-input" id="customControlValidation1"
                                name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Female" disabled class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Female</label>
                        </div>
                        <?php
                            }
                        ?>
                        <?php
                            if($datalist['Gender']=="Others"){
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Others" class="form-check-input" required
                                id="customControlValidation1" disabled name="gender" required checked="true" />
                            <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                        </div>
                        <?php
                            }
                            else{
                                ?>
                        <div class="form-check">
                            <input type="radio" value="Others" disabled class="form-check-input" id="customControlValidation1"
                                name="gender" required />
                            <label class="form-check-label mb-0" for="customControlValidation1">Others</label>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Date Of Birth</label>
                    <div class="col-md-9">
                            <input type="date" class="form-control" readonly name="DOB" value="<?= $datalist['DateOfBirth']?>" />
                    </div>
                </div>
                
                <div class="border-top">
                <div class="card-body">
                    <input type="submit" class="btn btn-primary" name="btnUpdate" value="Update">
                </div>
            </div>
            </div>
                <?php } ?>
                
        </div>
            <?php
        }
    ?>
</form>
<?php
    include_once("footer.php");
?>