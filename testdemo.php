<?php
session_start();

    require_once("config.php");

    


    // Image upload in folder demo
    // use Kreait\Firebase\Factory;

    // $storage = (new Factory())
    // ->withServiceAccount('jsonkeys/arogyasair-157e8-firebase-adminsdk-mrqpy-e9ccfb55b0.json')
    //     ->withDefaultStorageBucket('arogyasair-157e8.appspot.com')
    //     ->createStorage();

    // $bucket = $storage->getBucket();

    // if (isset($_POST['s1']))
    // {
    //     // $catname=$_POST['catname'];
    //     // $description=$_POST['description'];
    //     $photo=$_FILES['f1']['name'];

    //     if($_FILES['f1']['name']){
    //         $bucket->upload(
    //             file_get_contents($_FILES['f1']['tmp_name']),
    //             [
    //             'name' =>$_FILES['f1']['name']
    //             ]
    //         );
        
    //     }

    //     $newcat = $database
    //     ->getReference('MyProject/Category')
    //     ->push([
    //         // 'catname' => $catname,
    //         // 'description' =>  $description,
    //         'photo' =>$photo,
    //     ])->getKey();
    //     //   echo $newfaq;
    
    // }

    // $DatabaseFacilities = $database->getReference('MyProject/AllServices')->getSnapshot()->getValue();
    // $DatabaseState = $database->getReference('MyProject/AllState')->getSnapshot()->getValue();
    // $DatabaseCity = $database->getReference('MyProject/AllCity')->getSnapshot()->getValue();
    // $DatabaseTreatment = $database->getReference('MyProject/AllTreatment')->getSnapshot()->getValue();
    // $DatabaseDoctors = $database->getReference('MyProject/AllDoctor')->getSnapshot()->getValue();

    // if(isset($_REQUEST['id'])){
    //     $id=$_REQUEST['id'];
    //     $url="MyProject/tblHospital/$id";
    //     $datalist=$database->getReference($url)->getSnapshot()->getValue();
    //     $ExplodTreatments = explode(",",$datalist['AvailableTreatments']);
    //     $TreatmentSize = sizeof($ExplodTreatments)-1;
    //     $AllTreatmentSize = sizeof($DatabaseTreatment);

        
    // }

    // if(isset($_POST["btnSubmit"])){
    //     $name = $_POST['name'];
    //     $address = $_POST['address'];
    //     $state = $_POST['state'];
    //     $city = $_POST['city'];
    //     $facility="";
    //     $doctor = "";
    //     $treatment="";
    //     if (isset($_POST['facility'])) {
    //         $Facilities = $_POST['facility'];
    //         foreach ($Facilities as $Facility) {
    //             $facility = $Facility .", ". $facility;
    //         }
    //     }
    //     if (isset($_POST['treatment'])) {
    //         $Treatments = $_POST['treatment'];
    //         foreach ($Treatments as $Treatment) {    
    //             $treatment = $Treatment .", ". $treatment;
    //         }
    //     }
    //     if (isset($_POST['doctor'])) {
    //         $Doctors = $_POST['doctor'];
    //         foreach ($Doctors as $doctors) {
    //             $doctor = $doctors .", ". $facility;
    //         }
    //     }

    //     $newData = $database->getReference("MyProject/tblHospital")->update([
    //         'HospitalName'=>$name,
    //         'HospitalAddress'=>$address,
    //         'HospitalState'=>$state,
    //         'HospitalCity'=>$city,
    //         'AvailableTreatments'=>$treatment,
    //         'AvailableFacilities'=>$facility,
    //         'AvailableDoctors'=>$doctor
    //     ]);
    //     header("location:hospitalView.php");
    // }
    include_once("header.php");
    // if(isset($_REQUEST['id'])){
    //     $id=$_REQUEST['id'];
    //     $url="MyProject/tblHospital/$id";
    //     $datalist=$database->getReference($url)->getSnapshot()->getValue();
    //     $ExplodTreatments = explode(",",$datalist['AvailableTreatments']);
    //     $TreatmentSize = sizeof($ExplodTreatments)-1;
    //     $ExplodDoctors = explode(",",$datalist['AvailableDoctors']);
    //     $DoctorSize = sizeof($ExplodDoctors)-1;
    //     $ExplodServices = explode(",",$datalist['AvailableFacilities']);
    //     $ServiceSize = sizeof($ExplodServices)-1;
    //     $diff = array_diff($DatabaseTreatment,$ExplodTreatments);
    // }

    // print_r($DatabaseTreatment);
    // print_r($diff);

?>
<!-- <form Method="POST">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Hospital</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select Available Treatments</label>
                <div class="col-md-9">
                    <select class="select2 form-select shadow-none mt-3" name="treatment[]" multiple
                        style="height: 36px; width: 100%">
                        <?php
                            // for($i=0;$i<$TreatmentSize;$i++){
                            //     $t['AvailableTreatments']=$ExplodTreatments[$i];
                                ?>
                                    <option value="<?=$ExplodTreatments[$i]?>" selected><?=$ExplodTreatments[$i]?></option>
                                <?php
                            // }
                            // foreach($DaatabaseTreatment as $data){
                                ?>
                                <option value="<?=$data['TreatmentName']?>"><?=$data['TreatmentName']?></option>
                            <?php
                    //    }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <?php
            // for($i=0;$i<$TreatmentSize;$i++){
                // foreach ($DatabaseTreatment as $j) {
                //     if($ExplodTreatments[$i]== $j['TreatmentName']){
                //         print_r($ExplodTreatments[$i]);
                //         echo "<br>";
                //     }
                // }
                // print_r($ExplodTreatments[$i]."<br>");
            // }
       

            // foreach ($DatabaseTreatment as $j){
            //     for($i=0;$i<$TreatmentSize;$i++){
            //         if($j == $ExplodTreatments[$i]){
            //             print_r("".$i);
            //         }
            //     }
            //     // print_r($ExplodTreatments[$i]."<br>");
            // }
            // foreach($DatabaseTreatment as $j){
                // $data1 = $j['TreatmentName']."-";
                // $array = implode('-',$data1);
                // echo "<br>";
                // print_r($j['TreatmentName']."-");
                // print_r($array);
                // echo "<br>";
                // print_r($data1);
                // print_r(explode('-',$data1));
                // print_r($DatabaseTreatment);
                // echo "<br>";
            // }

            // Extract "TreatmentName" values
            
            
            // print_r($indexedArray);


            // for($j=0;$j<sizeof($indexedArray);$j++){
            //     for($i=0;$i<$TreatmentSize;$i++){
            //         if(strcmp($ExplodTreatments[$i], $indexedArray[$j])){
            //             echo $i;
            //         }
            //     }
            // }


        ?>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add Hospital">
            </div>
        </div>
    </div>
</form>-->
<!-- <div class="form-group row">
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
</div> -->

<form action="" method="POST" enctype="multipart/form-data" name="ex_card" class="forms-sample">
    <div class="form-group">
        <label>File To Upload </label>
        <input type="file" name="f1" class="file-upload-default">
    </div>
    <button type="submit" id='s1' name='s1' class="btn btn-info">Submit</button>

</form>

<?php include_once("Footer.php");?>