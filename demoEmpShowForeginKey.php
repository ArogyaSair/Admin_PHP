<?php
session_start();

    require_once("config.php");
    $datalist = $database->getReference("DemoDB/Employee")->getSnapshot()->getValue();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach($datalist as $data){
            ?>
                <h2><?=$data['EmployeeName']?></h2>
            <?php
        }
    ?>
</body>
</html>