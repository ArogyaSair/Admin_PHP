<?php
session_start();

require_once("config.php");

if(isset($_POST["btnSubmit"])){
    $states = array("Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal");

    foreach($states as $data){
        $newData = $database->getReference("ArogyaSair/AllStates")->push(["StateName"=>$data])->getKey();
    }
}

$datalist = $database->getReference("ArogyaSair/AllStates")->getSnapshot()->getValue();

include_once("header.php");
?>
<form Method="POST">
    <div class="border-top">
        <div class="card-body">
            <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add States">
        </div>
    </div>
</form>

<div class="page-breadcrumb">
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
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($datalist as $key=>$row){
                                    ?>
                                    <tr>
                                        <td><?=$row['StateName'];?></td>
                                        <td>
                                            <a class="edit" href="addCity.php?id=<?php echo $key?>">Edit</a> &nbsp;
                                            <a class="delete" href="addCity.php?id=<?php echo $key?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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
    </div>
<?php
    include_once("footer.php");
?>