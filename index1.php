<?php
session_start();

include_once("header.php")
?>
<div class="row">
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-view-dashboard"></i>
                </h1>
                <h6 class="text-white">Dashboard</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-chart-areaspline"></i>
                </h1>
                <h6 class="text-white">Charts</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-collage"></i>
                </h1>
                <h6 class="text-white">Queries</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-border-outside"></i>
                </h1>
                <h6 class="text-white">Tables</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">
                    <i class="mdi mdi-calendar-check"></i>
                </h1>
                <h6 class="text-white">Calnedar</h6>
            </div>
        </div>
    </div>
</div>
    <?php
  include_once("footer.php")
  ?>