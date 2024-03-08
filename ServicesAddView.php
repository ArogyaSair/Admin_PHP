<?php
session_start();

    include_once("config.php");
    $DatabaseService = $database->getReference('ArogyaSair/AllServices')->getSnapshot()->getValue();
    if (isset($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $url="ArogyaSair/AllServices/$id";
        $record=$database->getReference($url)->remove();
        header("location:ServicesAddView.php");
    }
    if(isset($_REQUEST['btnSubmit']))
    {
        $Service=$_REQUEST['Service'];
        $ServicesData=$database->getReference('ArogyaSair/AllServices')->push([
            "ServiceName"=>$Service,
        ])->getKey();
        header("location:ServicesAddView.php");
    }
    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Service</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter Service Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="Service" id="name" placeholder="Enter Service name" required>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add Service">
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
                        <h5 class="card-title">All Services</h5>
                    </div>
                </div>
                <div><br></div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($DatabaseService as $key=>$row)
                            {
                            ?>
                            <tr>
                                <td><?=$row['ServiceName'];?></td>
                                <td>
                                    <a class="delete" href="ServicesAddView.php?id=<?php echo $key?>" onclick="return confirm('Are you sure you want to delete <?=$row['ServiceName'];?> Service ?');"><i class="mdi mdi-delete"></i></a>
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