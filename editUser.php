<?php
session_start();

    require_once("config.php");

    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $url="MyPeroject/tblUser/$id";
        $datalist=$database->getReference($url)->getSnapshot()->getValue();
    }

    if(isset($_REQUEST['btnUpd'])){
        $id=$_REQUEST['id'];
        $name=$_REQUEST['name'];
        $add=$_REQUEST['address'];
        $contact=$_REQUEST['contact'];
        $email=$_REQUEST['email'];
        $record=$database->getReference($url)->update([
            'Address'=>$add,
            'ContactNo'=>$contact,
            'Username'=>$name,
            'Email'=>$email
        ]);
        // echo $record;
        header("Location:tables.php");
    }
    include_once("header.php");
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit User Information</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
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
            <h5 class="card-title">Form Elements</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Name</label>
                <div class="col-md-9">
                    <input class="form-control border-dark" type="text" name="name" id="name" placeholder="Enter Your name" value="<?=$datalist['Username']?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Address</label>
                <div class="col-md-9">
                    <textarea name="address" class="form-control border-dark" id="address" cols="10"rows="5"><?=$datalist['Address']?></textarea>
                </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-md-3">Gender</label>
                <div class="col-md-9">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="customControlValidation1" name="radio-stacked"
                            required />
                        <label class="form-check-label mb-0" for="customControlValidation1">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="customControlValidation2" name="radio-stacked"
                            required />
                        <label class="form-check-label mb-0" for="customControlValidation2">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="customControlValidation3" name="radio-stacked"
                            required />
                        <label class="form-check-label mb-0" for="customControlValidation3">Others</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Hobby</label>
                <div class="col-md-9">
                    <div class="form-check mr-sm-2">
                        <input type="checkbox" class="form-check-input" id="customControlAutosizing1" />
                        <label class="form-check-label mb-0" for="customControlAutosizing1">Reading</label>
                    </div>
                    <div class="form-check mr-sm-2">
                        <input type="checkbox" class="form-check-input" id="customControlAutosizing2" />
                        <label class="form-check-label mb-0" for="customControlAutosizing2">Writting</label>
                    </div>
                    <div class="form-check mr-sm-2">
                        <input type="checkbox" class="form-check-input" id="customControlAutosizing3" />
                        <label class="form-check-label mb-0" for="customControlAutosizing3">Sleeping</label>
                    </div>
                </div>
            </div> -->
            <!-- <div class="form-group row">
                <label class="col-md-3">File Upload</label>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required />
                        <label class="custom-file-label" for="validatedCustomFile">Choose
                            file...</label>
                    </div>
                </div>
            </div> -->
            <div class="form-group row">
                <label class="col-md-3">Phone Number</label>
                <div class="col-md-9">
                    <input type="number" name="contact" id="number" class="form-control border-dark" placeholder="Enter number" value="<?=$datalist['ContactNo']?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Email Adderss</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control border-dark" placeholder="Enter Email" value="<?=$datalist['Email']?>" />
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
<?php
    include_once("footer.php");
?>