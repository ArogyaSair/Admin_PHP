<?php
session_start();

    include_once("config.php");
    $DatabaseTreatment = $database->getReference('ArogyaSair/AllTreatment')->getSnapshot()->getValue();
    if (isset($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $url="ArogyaSair/AllTreatment/$id";
        $record=$database->getReference($url)->remove();
        header("location:TreatmentAddView.php");
    }
    if(isset($_REQUEST['btnSubmit']))
    {
        $treatment=$_REQUEST['Treatment'];
        $TreatmentData=$database->getReference('ArogyaSair/AllTreatment')->push([
            "TreatmentName"=>$treatment,
        ])->getKey();
        header("location:TreatmentAddView.php");
    }
    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Treatment</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Treatment Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="Treatment" id="name" placeholder="Enter Treatment name" required>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add Treatment">
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11">
                        <h5 class="card-title">All Treatment</h5>
                    </div>
                    <div class="col-md-1">
                        <a href="CityAdd.php" class="mdi mdi-plus btn btn-primary">&nbsp; Add</a>
                    </div>
                </div>
                <div><br></div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Treatment Name</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($DatabaseTreatment as $key=>$row)
                            {
                            ?>
                            <tr>
                                <td><?=$row['TreatmentName'];?></td>
                                <td>
                                    <a class="delete" href="TreatmentAddView.php?id=<?php echo $key?>" onclick="return confirm('Are you sure you want to delete <?=$row['TreatmentName'];?> Treatment ?');"><i class="mdi mdi-delete"></i></a>
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
</div>
<?php
    include_once("footer.php");
?>