<?php
session_start();

    include_once("config.php");
    $DatabaseDisease = $database->getReference('ArogyaSair/tblDisease')->getSnapshot()->getValue();
    if (isset($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $url="ArogyaSair/tblDisease/$id";
        $record=$database->getReference($url)->remove();
    }
    if(isset($_REQUEST['btnSubmit']))
    {
        $Service=$_REQUEST['Disease'];
        $DiseaseData=$database->getReference('ArogyaSair/tblDisease')->push([
            "DiseaseName"=>$Service,
        ])->getKey();
        header("location:DiseaseAddView.php");
    }
    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Disease</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Disease Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="Disease" id="name" placeholder="Enter Disease name" required>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add Disease">
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
                        <h5 class="card-title">All Disease</h5>
                    </div>
                </div>
                <div><br></div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Disease Name</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($DatabaseDisease as $key=>$row)
                            {
                            ?>
                            <tr>
                                <td><?=$row['DiseaseName'];?></td>
                                <td>
                                    <a class="delete" href="DiseasAddView.php?id=<?php echo $key?>" onclick="return confirm('Are you sure you want to delete <?=$row['DiseaseName'];?> Disease ?');"><i class="mdi mdi-delete"></i></a>
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