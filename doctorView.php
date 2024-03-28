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
    $url="ArogyaSair/tblDoctor/$id";
    $datalist = $database->getReference($url)->getSnapshot()->getValue();

    // Delete image from fatabase folder
    $existingFile = $bucket->object("DoctorImage/".$datalist['Photo']);
    $existingFile->delete();
    
    $record=$database->getReference($url)->remove();
    header("location:doctorView.php"); 
  }
  $datalist = $database->getReference('ArogyaSair/tblDoctor')->getSnapshot()->getValue();
  include_once("header.php");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11">
                        <h5 class="card-title">All Doctors</h5>
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
                                <th>Doctor Name</th>
                                <th>Doctor Specilization</th>
                                <th style="width: 50px;">Gender</th>
                                <th>Doctor Address</th>
                                <th style="width: 150px;">Doctor Date Of Birth</th>
                                <th>Doctor Contact number</th>
                                <th>Doctor Email</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($datalist as $key=>$row)
                            {
                                if($row["Photo"]!=null){
                                    $file1=$row['Photo'];
                                    $path="DoctorImage/$file1";
                                    $object = $bucket->object($path);
                                    $expirationDate = new \DateTimeImmutable('2030-01-01T00:00:00Z');
                                    $downloadUrl = $object->signedUrl($expirationDate);
                                }else{
                                    $path="DoctorImage/ArogyaSair.png";
                                    $object = $bucket->object($path);
                                    $expirationDate = new \DateTimeImmutable('2030-01-01T00:00:00Z');
                                    $downloadUrl = $object->signedUrl($expirationDate);
                                }
                        ?>
                            <tr>
                                <td><img src='<?php echo $downloadUrl;?>' style="border-radius: 20px;" width=50px
                                        height=50px /></td>
                                <td><?=$row['DoctorName']?></td>
                                <td><?=$row['Speciality']?></td>
                                <td style="width: 50px;"><?=$row['Gender']?></td>
                                <td><?=$row['DoctorAddress']?></td>
                                <td style="width: 150px;"><?=$row['DateOfBirth']?></td>
                                <td><?=$row['Contact'];?></td>
                                <td><?=$row['Email'];?></td>
                                <td>
                                    <a class="edit" href="doctorUpdate.php?id=<?php echo $key?>"><i
                                            class="fa fa-edit"></i></a>
                                    <a class="delete" href="DoctorView.php?id=<?php echo $key?>"
                                        onclick="return confirm('Are you sure you want to delete <?=$row['DoctorName'];?> doctor ?');"><i
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