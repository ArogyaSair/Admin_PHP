<?php
// session_start();

    // require_once("config.php");

    //     $newfaq = $database
    //     ->getReference('MyProject/category')
    //     ->push([
    //         'catname' => "Clothes",
    //         'description' => 'Ethnics to be used for occasion'
    //     ])->getKey();

    // $AndhraPradesh=array("Adoni","Amaravati","Anantapur","Chandragiri","Chittoor","Dowlaiswaram","Eluru","Guntur","Kadapa","Kakinada","Kurnool","Machilipatnam","Nagarjunakoṇḍa","Rajahmundry","Srikakulam","Tirupati","Vijayawada","Visakhapatnam","Vizianagaram","Yemmiganur");
    // $ArunachalPradesh=array("Itanagar");
    // $Assam=array("Dhuburi","Dibrugarh","Dispur","Guwahati","Jorhat","Nagaon","Sivasagar","Silchar","Tezpur","Tinsukia");
    // $Bihar=array("Ara","Barauni","Begusarai","Bettiah","Bhagalpur","Bihar Sharif","Bodh Gaya","Buxar","Chapra","Darbhanga","Dehri","Dinapur Nizamat","Gaya","Hajipur","Jamalpur","Katihar","Madhubani","Motihari","Munger","Muzaffarpur","Patna","Purnia","Pusa","Saharsa","Samastipur","Sasaram","Sitamarhi","Siwan");
    // $Chandigarh=array("Chandigarh");
    // $Chhattisgarh=array("Ambikapur","Bhilai","Bilaspur","Dhamtari","Durg","Jagdalpur","Raipur","Rajnandgaon");
    // $DadraAndNagarHaveliAndDamanAndDiu=array("Daman","Diu","Silvassa");
    // $Delhi=array("Delhi","New Delhi");
    // $Goa=array("Madgaon","Panaji");
    // $Gujarat=array("Ahmadabad","Amreli","Bharuch","Bhavnagar","Bhuj","Dwarka","Gandhinagar","Godhra","Jamnagar","Junagadh","Kandla","Khambhat","Kheda","Mahesana","Morbi","Nadiad","Navsari","Okha","Palanpur","Patan","Porbandar","Rajkot","Surat","Surendranagar","Valsad","Veraval");
    // $Haryana=array("Ambala","Bhiwani","Chandigarh","Faridabad","Firozpur Jhirka","Gurugram","Hansi","Hisar","Jind","Kaithal","Karnal","Kurukshetra","Panipat","Pehowa","Rewari","Rohtak","Sirsa","Sonipat");
    // $HimachalPradesh=array("Bilaspur","Chamba","Dalhousie","Dharmshala","Hamirpur","Kangra","Kullu","Mandi","Nahan","Shimla","Una");
    // $JammuAndKashmir=array("Anantnag","Baramula","Doda","Gulmarg","Jammu","Kathua","Punch","Rajouri","Srinagar","Udhampur");
    // $Jharkhand=array("Bokaro","Chaibasa","Deoghar","Dhanbad","Dumka","Giridih","Hazaribag","Jamshedpur","Jharia","Rajmahal","Ranchi","Saraikela");
    // $Karnataka=array("Badami","Ballari","Bengaluru","Belagavi","Bhadravati","Bidar","Chikkamagaluru","Chitradurga","Davangere","Halebid","Hassan","Hubballi-Dharwad","Kalaburagi","Kolar","Madikeri","Mandya","Mangaluru","Mysuru","Raichur","Shivamogga","Shravanabelagola","Shrirangapattana","Tumakuru","Vijayapura");
    // $Kerala=array("Alappuzha","Vatakara","Idukki","Kannur","Kochi","Kollam","Kottayam","Kozhikode","Mattancheri","Palakkad","Thalassery","Thiruvananthapuram","Thrissur");
    // $Ladakh=array("Kargil","Leh");
    // $MadhyaPradesh=array("Balaghat","Barwani","Betul","Bharhut","Bhind","Bhojpur","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dr. Ambedkar Nagar(Mhow)","Guna","Gwalior","Hoshangabad","Indore","Itarsi","Jabalpur","Jhabua","Khajuraho","Khandwa","Khargone","Maheshwar","Mandla","Mandsaur","Morena","Murwara","Narsimhapur","Narsinghgarh","Narwar","Neemuch","Nowgong","Orchha","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Sarangpur","Satna","Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Ujjain","Vidisha");
    // $Maharashtra=array("Ahmadnagar","Akola","Amravati","Aurangabad","Bhandara","Bhusawal","Bid","Buldhana","Chandrapur","Daulatabad","Dhule","Jalgaon","Kalyan","Karli","Kolhapur","Mahabaleshwar","Malegaon","Matheran","Mumbai","Nagpur","Nanded","Nashik","Osmanabad","Pandharpur","Parbhani","Pune","Ratnagiri","Sangli","Satara","Sevagram","Solapur","Thane","Ulhasnagar","Vasai-Virar","Wardha","Yavatmal");
    // $Manipur=array("Imphal");
    // $Meghalaya=array("Cherrapunji","Shillong");
    // $Mizoram=array("Aizawl","Lunglei");
    // $Nagaland=array("Kohima","Mon","Phek","Wokha","Zunheboto");
    // $Odisha=array("Balangir","Baleshwar","Baripada","Bhubaneshwar","Brahmapur","Cuttack","Dhenkanal","Kendujhar","Konark","Koraput","Paradip","Phulabani","Puri","Sambalpur","Udayagiri");
    // $Puducherry=array("Karaikal","Mahe","Yanam");
    // $Punjab=array("Amritsar","Batala","Chandigarh","Faridkot","Firozpur","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Nabha","Patiala","Rupnagar","Sangrur");
    // $WestBengal=array("Alipore","Alipur Duar","Asansol","Baharampur","Bally","Balurghat","Bankura","Baranagar","Barasat","Barrackpore","Basirhat","Bhatpara","Bishnupur","Budge Budge","Burdwan","Chandernagore","Darjeeling","Diamond Harbour","Dum Dum","Durgapur","Halisahar","Haora","Hugli","Ingraj Bazar","Jalpaiguri","Kalimpong","Kamarhati","Kanchrapara","Kharagpur","Cooch Behar","Kolkata","Krishnanagar","Malda","Midnapore","Murshidabad","Nabadwip","Palashi","Panihati","Purulia","Raiganj","Santipur","Shantiniketan","Shrirampur","Siliguri","Siuri","Tamluk","Titagarh");
    // $Uttarakhand = array("Almora","Dehra Dun","Haridwar","Mussoorie","Nainital","Pithoragarh");
    // $UttarPradesh= array("Agra","Aligarh","Amroha","Ayodhya","Azamgarh","Bahraich","Ballia","Banda","Bara Banki","Bareilly","Basti","Bijnor","Bithur","Budaun","Bulandshahr","Deoria","Etah","Etawah","Faizabad","Farrukhabad-cum-Fatehgarh","Fatehpur","Fatehpur Sikri","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur","Lakhimpur","Lalitpur","Lucknow","Mainpuri","Mathura","Meerut","Mirzapur-Vindhyachal","Moradabad","Muzaffarnagar","Partapgarh","Pilibhit","Prayagraj","Rae Bareli","Rampur","Saharanpur","Sambhal","Shahjahanpur","Sitapur","Sultanpur","Tehri","Varanasi");
    // $Tripura = array("Agartala");
    // $Telangana = array("Hyderabad","Karimnagar","Khammam","Mahbubnagar","Nizamabad","Sangareddi","Warangal");
    // $TamilNadu = array("Arcot","Chengalpattu","Chennai","Chidambaram","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanniyakumari","Kodaikanal","Kumbakonam","Madurai","Mamallapuram","Nagappattinam","Nagercoil","Palayamkottai","Pudukkottai","Rajapalayam","Ramanathapuram","Salem","Thanjavur","Tiruchchirappalli","Tirunelveli","Tiruppur","Thoothukudi","Udhagamandalam","Vellore");
    // $Sikkim = array("Gangtok","Gyalshing","Lachung","Mangan");
    // $Rajasthan = array("Abu","Ajmer","Alwar","Amer","Barmer","Beawar","Bharatpur","Bhilwara","Bikaner","Bundi","Chittaurgarh","Churu","Dhaulpur","Dungarpur","Ganganagar","Hanumangarh","Jaipur","Jaisalmer","Jalor","Jhalawar","Jhunjhunu","Jodhpur","Kishangarh","Kota","Merta","Nagaur","Nathdwara","Pali","Phalodi","Pushkar","Sawai Madhopur","Shahpura","Sikar","Sirohi","Tonk","Udaipur");

    include_once("header.php");
    require_once("config.php");
    $states = array("andhra pradesh","arunachal pradesh","assam","bihar","chandigarh","chhattisgarh","dadra and nagar haveli and daman and diu","delhi","goa","gujarat","haryana","himachal pradesh","jammu and kashmir","jharkhand","karnataka","kerala","ladakh","madhya pradesh","maharashtra","manipur","meghalaya","mizoram","nagaland","odisha","puducherry","punjab","rajasthan","sikkim","tamil nadu","telangana","tripura","uttar pradesh","uttarakhand","west bengal");
    // if(isset($_REQUEST['btnSubmit'])){
    //     $states = $database->getReference("ArogyaSair/tblStates")->getSnapshot()->getValue();
    //     // $newdata = $database->getReference('MyPeroject/tblUser')->push(['Username' => $name,'Address' => $add,'ContactNo' => $phone,'Email' => $email])->getKey();
    //     foreach($states as $key=>$data){
    //         if($data['StateName'] == "Andhra Pradesh"){
    //             foreach($AndhraPradesh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Arunachal Pradesh"){
    //             foreach($ArunachalPradesh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Assam"){
    //             foreach($Assam as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Bihar"){
    //             foreach($Bihar as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Chandigarh"){
    //             foreach($Chandigarh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Chhattisgarh"){
    //             foreach($Chhattisgarh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Dadra and Nagar Haveli and Daman and Diu"){
    //             foreach($DadraAndNagarHaveliAndDamanAndDiu as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Delhi"){
    //             foreach($Delhi as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Goa"){
    //             foreach($Goa as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Gujarat"){
    //             foreach($Gujarat as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Haryana"){
    //             foreach($Haryana as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Himachal Pradesh"){
    //             foreach($HimachalPradesh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Jammu and Kashmir"){
    //             foreach($JammuAndKashmir as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Jharkhand"){
    //             foreach($Jharkhand as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Karnataka"){
    //             foreach($Karnataka as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Kerala"){
    //             foreach($Kerala as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Ladakh"){
    //             foreach($Ladakh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Madhya Pradesh"){
    //             foreach($MadhyaPradesh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Maharashtra"){
    //             foreach($Maharashtra as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Manipur"){
    //             foreach($Manipur as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Meghalaya"){
    //             foreach($Meghalaya as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Mizoram"){
    //             foreach($Mizoram as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Nagaland"){
    //             foreach($Nagaland as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }if($data['StateName'] == "Odisha"){
    //             foreach($Odisha as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }if($data['StateName'] == "Puducherry"){
    //             foreach($Puducherry as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Rajasthan"){
    //             foreach($Rajasthan as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Sikkim"){
    //             foreach($Sikkim as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Tamil Nadu"){
    //             foreach($TamilNadu as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Telangana"){
    //             foreach($Telangana as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Tripura"){
    //             foreach($Tripura as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Uttar Pradesh"){
    //             foreach($UttarPradesh as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "Uttarakhand"){
    //             foreach($Uttarakhand as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //         if($data['StateName'] == "West Bengal"){
    //             foreach($Wes as $CityData){
    //                 $database->getReference("ArogyaSair/tblCity")->push([
    //                     'StateID'=>$key,
    //                     'CityName'=>strtolower($CityData)
    //                 ])->getKey();
    //             }
    //         }
    //     }
    // }
    if(isset($_POST['btnSubmit'])){
        foreach($states as $data){
        $database->getReference("ArogyaSair/tblStates")->push([
            'StateName'=> strtolower($data)
        ])->getKey();
        }
    }
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
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
        <!-- <div class="card-body">
            <h5 class="card-title">Form Elements</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Name</label>
                <div class="col-md-9">
                    <input class="form-control border-dark" type="text" name="name" id="name"
                        placeholder="Enter Your name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Address</label>
                <div class="col-md-9">
                    <textarea name="address" class="form-control border-dark" id="address" cols="10"
                        rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
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
            </div>
            <div class="form-group row">
                <label class="col-md-3">File Upload</label>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required />
                        <label class="custom-file-label" for="validatedCustomFile">Choose
                            file...</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Phone Number</label>
                <div class="col-md-9">
                    <input type="number" name="contact" id="number" class="form-control border-dark" placeholder="Enter number" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Email Adderss</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control border-dark" placeholder="Enter Email" />
                </div>
            </div>
        </div> -->
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