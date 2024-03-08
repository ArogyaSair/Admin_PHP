<?php 
session_start();
include_once("header.php"); ?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Charts</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Charts
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bar Chart</h5>
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-line-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>