<?php
session_start();

require_once("config.php");

// username creator
// $word = "fox jumps1";
// $mystring = "The quick brown fox jumps over the lazy dog";
 
// // Test if string contains the word 
// if(strpos($mystring, $word) !== false){
//     echo "Word Found!";
// } else{
//     echo "Word Not Found!";
// }

// Doctor specilities add database demo
    if(isset($_POST['btnSubmit'])){
        $spe = array("General Internal Medicine","Cardiology","Gastroenterology","Nephrology","Pulmonology");
        foreach($spe as $data){
            $database->getReference("ArogyaSair/tblSpe")->push(['Specilization'=>$data,])->getKey();
        }
    }


// All Services

// if(isset($_POST['btnSubmit'])){
//     $service=array("Emergency Department","Inpatient Care","Outpatient Department (OPD)","Diagnostic Services","Pharmacy","Surgery","Intensive Care Unit (ICU)","Maternal and Child Health","Mental Health Services","Rehabilitation Services","Oncology Services","Medical Records","Nutrition Services","Social Work Services","Spiritual Support Services","Administrative Services");    
//     foreach($service as $data){
//         $newData = $database->getReference("ArogyaSair/AllServices/")->push(["ServiceName"=>$data])->getKey();
//     }
    
// }
// $datalist = $database->getReference("ArogyaSair/AllServices")->getSnapshot()->getValue();

// All Treatments

// if(isset($_POST['btnSubmit'])){

//     $all_treatments = array("Surgery","Preoperative Surgery","Intraoperative Surgery","Postoperative Care","Physical Therapy","Cognitive Behavioral Therapy","Radiation Therapy","Chemotherapy","Psycological Therapy","Intensive Care","Occupational Therapy","Speech Therapy","Dental Procedures","Medication","Dialysis","Palliative Care","Wound Care","Blood Transfusion","Cardiac Rehabilitation","Kidney Transplant","Liver Transplant","Lung Transplant","Pancreas Transplant","Intestinal Transplant","Bone Marrow Transplant","Corneal Transplant","Coronary Artery Bypass Surgery (CABS)","Implantable Device Surgery","Heart Valve Repair or Replacement Surgery","Electrophysiology Studies and Ablation","Angioplasty and Stenting","Routine Dental Check-ups");

//     foreach($all_treatments as $data){
//         $newData = $database->getReference("ArogyaSair/AllTreatment")->push(["TreatmentName"=>$data])->getKey();
//     }

// }
// $datalist = $database->getReference("ArogyaSair/AllTreatment")->getSnapshot()->getValue();

// All states
// if(isset($_POST['btnSubmit'])){
//     $states = array("Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal");
//     foreach($states as $data){
//         $newData = $database->getReference("MyPeroject/AllStates")->push(["StateName"=>$data])->getKey();
//     }
// }

// All States And cities

// if(isset($_POST["btnSubmit"])){
//     $state = array("Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal");
//     $city=array("Adoni","Amaravati","Anantapur","Chandragiri","Chittoor","Dowlaiswaram","Eluru","Guntur","Kadapa","Kakinada","Kurnool","Machilipatnam","Nagarjunakoṇḍa","Rajahmundry","Srikakulam","Tirupati","Vijayawada","Visakhapatnam","Vizianagaram","Yemmiganur","Itanagar","Dhuburi","Dibrugarh","Dispur","Guwahati","Jorhat","Nagaon","Sivasagar","Silchar","Tezpur","Tinsukia","Ara","Barauni","Begusarai","Bettiah","Bhagalpur","Bihar Sharif","Bodh Gaya","Buxar","Chapra","Darbhanga","Dehri","Dinapur Nizamat","Gaya","Hajipur","Jamalpur","Katihar","Madhubani","Motihari","Munger","Muzaffarpur","Patna","Purnia","Pusa","Saharsa","Samastipur","Sasaram","Sitamarhi","Siwan","Chandigarh","Ambikapur","Bhilai","Bilaspur","Dhamtari","Durg","Jagdalpur","Raipur","Rajnandgaon","Daman","Diu","Silvassa","Delhi","New Delhi","Madgaon","Panaji","Ahmadabad","Amreli","Bharuch","Bhavnagar","Bhuj","Dwarka","Gandhinagar","Godhra","Jamnagar","Junagadh","Kandla","Khambhat","Kheda","Mahesana","Morbi","Nadiad","Navsari","Okha","Palanpur","Patan","Porbandar","Rajkot","Surat","Surendranagar","Valsad","Veraval","Ambala","Bhiwani","Chandigarh","Faridabad","Firozpur Jhirka","Gurugram","Hansi","Hisar","Jind","Kaithal","Karnal","Kurukshetra","Panipat","Pehowa","Rewari","Rohtak","Sirsa","Sonipat","Bilaspur","Chamba","Dalhousie","Dharmshala","Hamirpur","Kangra","Kullu","Mandi","Nahan","Shimla","Una",);

    // foreach($states as $data){
    //     // foreach($data as $city){
    //     //     $newData = $database->getReference("MyPeroject/AllStates")->push(["StateName"=>$data,"CityName"=>$city])->getKey();
    //     // }
    //     print_r($data);
    // }

    // foreach($state as $data){
    //     $newData = $database->getReference("ArogyaSair/AllState")->push(["StateName"=>$data])->getKey();
    // }
    // foreach($city as $data){
    //     $newData = $database->getReference("ArogyaSair/AllCity")->push(["CityName"=>$data])->getKey();
    // }
    
// }

// $verify  = "";

// Password encryption
// $plaintext_password = "Password@123"; 
  
// The hash of the password that 
// can be stored in the database 
//   $hash = password_hash($plaintext_password,  PASSWORD_DEFAULT);
// if(isset($_POST['btnSubmit'])){
//     $datalist = $database->getReference("ArogyaSair/tblAdmin/-Nn7s4Pkgbo4SIqqSJal")->getSnapshot()->getValue();
//     $verify = password_verify($_POST['password'], $datalist['Password']);
//                                  Password@123        hashCode
// }

// if(isset($_POST['btnSubmit'])){
//     $name = $_POST['password'];
//     $username = strtolower($name."@admin");
//     $datalist = $database->getReference("MyPeroject/tblUserDemo")->push([
//         "name"=>$name,
//         "username"=>$username
//     ])->getKey();
// }


// All Doctors
// if(isset($_POST['btnSubmit'])){
//     $all_doctors = array("Dr.Sandeep Vaishya - Neurosurgeon","Dr.Naresh Treshan - Chief Cardiac Surgeon","Dr.Arun Saroha - Neurosurgeon","Dr.Hs Bhatya - Cardiovascular and Cardiothoraic Surgeon","Dr.Vinod Raina - MBBS,MD,FRCP","Dr.Ashok Rajgopal - Musculoskeleton Disorder and Orthopaedic Surgeon","Dr.Ips Oberoi - MBBS,MS,MCh","Dr.Subhash Chandra - MBBS,DCH","Dr.Vaibhav Mishra - Cardiac Surgeon","Dr. Vivek Jawali - Adult Cardiac Surgery and Arterial Bypass Surgery","Aditya Gupta - Neurosurgeon","Dr.Gaurav Shekhar - Head Pediatric Hemato-oncology Immunology & Bone Marrow Transplant","Dr.Hemant Sharma - Orthopaedic","Dr.Rana Patir - Neurosurgeon","Dr.Abhideep Chaudhary - HPB Surgery and Liver Transplantation","Dr.Devi Prasad Shetty - Cardiothoraic Surgeon","Dr.Hitesh Garg - Surgeon Consultant,MBBS,MS","Dr.j k Gupta - Cardiologist","Dr.Lokesh Kumar - Oncologist","Dr.Manoj Gupta - Therapy (HBOT)","Dr.Pawan Kumar - Diabetologist","Dr.Ashish Jain - Otolaryngologist,MBBS,DCH,MS");

//     foreach($all_doctors as $data){
//         $datalist = $database->getReference('ArogyaSair/AllDoctor')->push(['DoctorName'=>$data])->getKey();
//     }
// }

// $datalist = $database->getReference("MyPeroject/AllStates")->getSnapshot()->getValue();

include_once("header.php");
?>

<!-- Test button and one field -->
<form Method="POST">
    <div class="border-top">
        <div class="card-body">
            <input type="submit" class="btn btn-primary" name="btnSubmit" value="Button">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 mt-3">Enter Your Name</label>
        <div class="col-md-9">
            <input class="form-control border-dark" type="text" name="password" id="name"
                placeholder="Create pasasword">
        </div>
    </div>
</form>

<!-- Table -->
<!-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Treatment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($datalist as $key=>$row){
                                    ?>
                            <tr>
                                <td><?=$key?></td>
                                <td><?=$row['TreatmentName'];?></td>
                                <td>
                                    <a class="edit" href="editUser.php?id=<?php echo $key?>">Edit</a>
                                    <a class="delete" href="tables.php?id=<?php echo $key?>"
                                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->

<!-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Admin Data</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Admin Data
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>State Name</th>
                                <th>City Name</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // foreach($datalist as $key=>$row){
                                    ?>
                                    <tr>
                                        <td><?=$row['StateName'];?></td>
                                        <td><?=$row['CityName'];?></td>
                                        <td>
                                            <a class="edit" href="addCity.php?id=<?php echo $key?>">Edit</a> &nbsp;
                                            <a class="delete" href="addCity.php?id=<?php echo $key?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                // }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->


<?php
    include_once("footer.php");
?>