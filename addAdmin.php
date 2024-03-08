<?php
session_start();

    require_once("config.php");
    if(isset($_POST['btnSubmit'])){
            $name = $_POST["name"];
            $username = strtolower($name."@admin");
            $pass = $_POST['password'];
            $add = $_POST['address'];
            $number = $_POST['contact'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $age = $_POST['DOB'];
            $hashPassword = password_hash($pass, PASSWORD_DEFAULT);
            $newDate = $database->getReference('ArogyaSair/tblAdmin')->push(['Name'=>$name, "Username"=>$username, 'Password'=>$hashPassword, 'Address'=>$add, 'Contact'=>$number, 'Email'=>$email, 'Gender'=>$gender, 'DateOfBirth'=>$age])->getKey();
            header("location:adminView.php");
    }
    include_once("header.php");
?>
<form Method="POST">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Admin</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Name</label>
                <div class="col-md-9">
                    <input class="form-control border-dark" type="text" required name="name" id="name" placeholder="Enter Your name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Create Passwprd</label>
                <div class="col-md-9">
                    <input class="form-control border-dark" required type="text" name="password" id="name" placeholder="Create pasasword">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Address</label>
                <div class="col-md-9">
                    <textarea name="address" class="form-control border-dark" id="address" cols="10" rows="5"></textarea>
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
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Date Of Birth</label>
                <div class="col-md-9">
                        <input type="DATE" class="form-control border-dark" name="DOB" value="<?= isset($datalist['DateOfBirth'])?>" />
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Phone Number</label>
                <div class="col-md-9">
                    <input type="tel" name="contact" id="number" required class="form-control border-dark" placeholder="Enter number" autocomplete="off" pattern="[0-9]*" title="Please enter only numeric characters" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Email Adderss</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control border-dark" placeholder="Enter Email" required />
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit">
            </div>
        </div>
    </div>
</form>
<?php 
    include_once("footer.php");
?>