<?php
session_start();
    require_once("config.php");    
    if(isset($_POST['btnSubmit'])){
        $stateName = $_POST['state'];

        $database->getReference('ArogyaSair/tblSpe')->push([
            'StateName'=>$Specilization
        ])->getKey();
        header("location:SpecilizationAddView.php");
    }
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $url="ArogyaSair/tblSpe/$id";
        $datalist = $database->getReference($url)->getSnapshot()->getValue(); 
        $record=$database->getReference($url)->remove();
        header("location:SpecilizationAddView.php");
    }
    include_once("header.php");
    $DatabaseState = $database->getReference('ArogyaSair/tblSpe')->getSnapshot()->getValue();
?>
<form Method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add States</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter State Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="state" id="name" placeholder="Enter State name" required>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add Specilization">
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
                        <h5 class="card-title">All City and State</h5>
                    </div>
                    <div class="col-md-1">
                        <a href="CityAddView.php" class="mdi mdi-plus btn btn-primary">&nbsp; Add</a>
                    </div>
                </div>
                <div><br></div>
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
                            foreach($DatabaseState as $key=>$row)
                            {
                            ?>
                            <tr>
                                <td><?=$row['Specilization'];?></td>
                                <td>
                                    <a class="delete" href="SpecilizationAddView.php?id=<?php echo $key?>"
                                        onclick="return confirm('Are you sure you want to delete <?=$row['Specilization'];?> specilization ?');"><i
                                            class="mdi mdi-delete"></i></a>
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