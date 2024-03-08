<?php
session_start();

    // $a = array("ab","dc","as");
    // $b = array("a","ab");

    // $c = array_intersect($a,$b);

    // print_r($c);
    require_once("config.php");
    $DatabaseHospital = $database->getReference("MyProject/tblHospital")->getSnapshot()->getValue();
    $DatabaseCity = $database->getReference('ArogyaSair/tblCity')->getSnapshot()->getValue();

    if(isset($_POST['btnAdd'])){
        $hospitalName = $_POST["txtHospital"];
        $city = $_POST['city'];
        $count = 0;
        foreach($DatabaseHospital as $data){
            if(strtolower($data['HospitalName']) == strtolower($hospitalName)) 
            {
                if($data['HospitalCity'] == $city){
                    $count=$count+1;
                }
            }
        }
        if($count>0){
            echo "<script>alert('$hospitalName already exists in $city')</script>";
        }else{
            $database->getReference('MyProject/tblHospital')->push([
                'HospitalName'=>$hospitalName,
                'HospitalCity'=>$city
            ])->getKey();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        Enter Hospital Name: <input type="text" name="txtHospital" id="txtHospital">
        <select name="city" style="height: 36px; width: 100%">
            <?php
                foreach($DatabaseCity as $data){
                    ?>
                    <option value="<?=$data['CityName']?>"><?=$data['CityName']?></option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" name="btnAdd" value="Add">
    </form>
</body>

</html>