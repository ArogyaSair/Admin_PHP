<?php
session_start();

    require_once("config.php");

    use Kreait\Firebase\Factory;

    $storage = (new Factory())
    ->withServiceAccount('jsonkeys/arogyasair-157e8-firebase-adminsdk-mrqpy-bba49d8268.json')
        ->withDatabaseUri('https://arogyasair-157e8.firebaseio.com')
        ->createStorage();
    $bucket = $storage->getBucket();
  if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $url="ArogyaSair/tblHospital/$id";
    $datalist = $database->getReference($url)->getSnapshot()->getValue();

    // Delete image from fatabase folder
    $existingFile = $bucket->object("HospitalImage/".$datalist['Photo']);
    $existingFile->delete();
    
    $record=$database->getReference($url)->remove();
    header("location:hospitalView.php"); 
  }
  $datalist = $database->getReference('ArogyaSair/tblHospital')->getSnapshot()->getValue();
  include_once("header.php");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11">
                        <h5 class="card-title">All Hospital</h5>
                    </div>
                    <div class="col-md-1">
                        <a href="hospitalAdd.php" class="mdi mdi-plus btn btn-primary">&nbsp; Add</a>
                    </div>
                </div>
                <div><br></div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Hospital Name</th>
                                <th>Available Doctors</th>
                                <th>Available Facilities</th>
                                <th>Address</th>
                                <th>Available Treatments</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($datalist as $key=>$row)
                            {
                                $file1=$row['Photo'];
                                $path="HospitalImage/$file1";
                                $object = $bucket->object($path);
                                $expirationDate = new \DateTimeImmutable('2030-01-01T00:00:00Z');
                                $downloadUrl = $object->signedUrl($expirationDate);
                                $datalist = $database->getReference('ArogyaSair/tblState')->getSnapshot()->getValue();
                        ?>
                            <tr>
                                <td><img src='<?php echo $downloadUrl;?>' style="border-radius: 20px;" width=150px
                                        height=150px /></td>
                                <td><?=$row['HospitalName'];?></td>
                                <td><?=$row['AvailableDoctors']?></td>
                                <td><?=$row['AvailableFacilities']?></td>
                                <td><?=$row['HospitalAddress']?>, <?=$row['HospitalCity']?>, <?=$row['HospitalState']?></td>
                                <td><?=$row['AvailableTreatments'];?></td>
                                <td>
                                    <a class="edit" href="HospitalUpdate.php?id=<?php echo $key?>"><i
                                            class="fa fa-edit"></i></a>
                                    <a class="delete" href="HospitalView.php?id=<?php echo $key?>"
                                        onclick="return confirm('Are you sure you want to delete <?=$row['HospitalName'];?> hospital ?');"><i
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