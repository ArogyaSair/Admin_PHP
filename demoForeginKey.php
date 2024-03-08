<?php
session_start();

    require_once("config.php");

    $dept = array("IT","Accounts","HR","Service");

    // foreach($dept as $data){
    //     $data=$database->getReference("DemoDB/Department")->push([
    //         'DepartmentName' => $data
    //     ])->getKey();
    // }
    $Department = $database->getReference("DemoDB/Department")->getSnapshot()->getValue();
    if(isset($_POST['btnSubmit'])){
        $empName = $_POST['EmpName'];
        $dept = $_POST['dept'];
        $database->getReference("DemoDB/Employee")->push([
            'EmployeeName' => $empName,
            'DepartmentName' => $dept
        ])->getKey();
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
    <form action="" method="post">
        Employee Name: <input type="text" name="EmpName"><br>
        Department : 
        <select name="dept" id="">
            <option value="0">Select Department</option>
            <?php
                foreach ($Department as $key => $value) {
                    ?>
                        <option value="<?=$key?>"><?=$value['DepartmentName']?></option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" name="btnSubmit" value="Submit">
    </form>
</body>
</html>