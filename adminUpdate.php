<?php
session_start();

    require_once("config.php");

    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $url="ArogyaSair/tblAdmin/$id";
        $datalist=$database->getReference($url)->getSnapshot()->getValue();
    }

    if(isset($_POST['btnUpd'])){
        $name=$_POST['name'];
        $username = $_POST['username'];
        $add=$_POST['address'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $gender = $_POST['gender'];
        $age = $_POST['DOB'];
        $record=$database->getReference($url)->update([
            'Address'=>$add,
            'Contact'=>$contact,
            'Gender'=>$gender,
            'Name'=>$name,
            'Username'=>$username,
            'Email'=>$email,
            'DateOfBirth'=>$age,
        ]);
        header("location:adminView.php");
    }

    include_once("header.php");
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Admin Information</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Admin
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<form Method="POST">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Admin</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Username</label>
                <div class="col-md-9">
                    <input class="form-control border-dark" type="text" name="username"
                        value="<?=$datalist['Username']?>" required id="name" placeholder="Enter Your Username">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Name</label>
                <div class="col-md-9">
                    <input class="form-control border-dark" type="text" name="name" value="<?=$datalist['Name']?>"
                        required id="name" placeholder="Enter Your name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Address</label>
                <div class="col-md-9">
                    <textarea name="address" class="form-control border-dark" required id="address" cols="10"
                        rows="5"><?=$datalist['Address']?></textarea>
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
                        <input type="date" class="form-control border-dark" name="DOB" value="<?= $datalist['DateOfBirth']?>" />
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Phone Number</label>
                <div class="col-md-9">
                    <input type="tel" name="contact" id="number" required class="form-control border-dark" placeholder="Enter number" value="<?=$datalist['Contact']?>" pattern="[0-9]*" title="Please enter only numeric characters" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Email Adderss</label>
                <div class="col-md-9">
                    <input type="email" name="email" required id="email" class="form-control border-dark"
                        placeholder="Enter Email" value="<?=$datalist['Email']?>" />
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnUpd" value="Update">
            </div>
        </div>
    </div>
</form>
<?php include_once("footer.php");?>