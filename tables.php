<?php
session_start();

  require_once("config.php");
  if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $url="MyPeroject/tblUser/$id";
    $record=$database->getReference($url)->remove();
    header("location:tables.php"); 
  }
  $datalist = $database->getReference('MyPeroject/tblUser')->getSnapshot()->getValue();
  include_once("header.php");
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Tables</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Tables
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($datalist as $key=>$row){
                                    ?>
                                    <tr>
                                        <td><?=$row['Username'];?></td>
                                        <td><?=$row['Email'];?></td>
                                        <td><?=$row['Address'];?></td>
                                        <td><?=$row['ContactNo'];?></td>
                                        <td>
                                            <!-- <a class="edit" href="editUser.php?id=<?php echo $key?>"><i class="fa fa-edit"></i></a> -->
                                            <a class="edit" href="editUser.php?id=<?php echo $key?>">Edit</a>
                                            <!-- <a class="delete" href="dataShow.php?id=<?php echo $key?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o" ></i></a> -->
                                            <a class="delete" href="tables.php?id=<?php echo $key?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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