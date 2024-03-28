<?php

session_start();

    require_once("config.php");
    if(isset($_SESSION["DatabaseCity"])){
        $DatabaseCity = $_SESSION["DatabaseCity"];
    }else{
        $DatabaseCity = $database->getReference('ArogyaSair/tblCity')->getSnapshot()->getValue();
    }
    if(isset($_SESSION['DatabaseState'])){
        $DatabaseState = $_SESSION['DatabaseState'];
    }else{
        $DatabaseState = $database->getReference('ArogyaSair/tblStates')->getSnapshot()->getValue();
    }
    if(isset($_POST['btnSubmit'])){
        $cityName = $_POST['name'];
        $stateName = $_POST['state'];

        $database->getReference('ArogyaSair/tblCity')->push([
            'CityName'=>$cityName,
            'StateID'=>$stateName
        ])->getKey();
        header("location:CityAddView.php");
    }
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $url="ArogyaSair/tblCity/$id";
        $datalist = $database->getReference($url)->getSnapshot()->getValue(); 
        $record=$database->getReference($url)->remove();
        header("location:CityAddView.php");
    }
    include_once("header.php");
?>
<form Method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add City</h5>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Enter City Name</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter City name"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 mt-3">Select State</label>
                <div class="col-md-9">
                    <select class="form-select select2" name="state" style="width: 100%; height: 36px;" id="state">
                        <option>Select State</option>
                        <?php
                        foreach($DatabaseState as $key=>$data){
                            ?>
                        <option value="<?=$key?>"><?=$data['StateName']?></option>
                        <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Add City">
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
                                <th>City Name</th>
                                <th>State Name</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($DatabaseState as $key=>$row)
                            {
                                $id = $key;
                                $url="ArogyaSair/tblCity/";
                                $DatabaseCity = $database->getReference($url)->orderByChild('StateID')->equalTo($id)->getSnapshot()->getValue();
                                foreach($DatabaseCity as $key=>$data){
                            ?>
                            <tr>
                                <td><?=$data['CityName'];?></td>
                                <td><?=$row['StateName'];?></td>
                                <td>
                                    <a class="delete" href="CityAddView.php?id=<?php echo $key?>"
                                        onclick="return confirm('Are you sure you want to delete <?=$data['CityName'];?> city ?');"><i
                                            class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
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