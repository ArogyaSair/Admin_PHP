<?php 
session_start();
include_once("header.php");?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Help Desk</h4>
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Browesr statistics</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Browser</th>
                        <th scope="col">Visits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Chrome</td>
                        <td>8850</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td>Internet Explorer</td>
                        <td>1540</td>
                    </tr>
                    <tr>
                        <td>Opera</td>
                        <td>1230</td>
                    </tr>
                    <tr>
                        <td>Safari</td>
                        <td>1590</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Website statistics</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Site</th>
                        <th scope="col">Visits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#" class="link">Themeforest.com</a></td>
                        <td>1240</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1542</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1230</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Themedesigner.in</a></td>
                        <td>1542</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Visited Pages</h5>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Page</th>
                        <th scope="col">Visits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#" class="link">Freebies</a></td>
                        <td>1240</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Blog</a></td>
                        <td>1200</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Work</a></td>
                        <td>1542</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">Site Template</a></td>
                        <td>1230</td>
                    </tr>
                    <tr>
                        <td><a href="#" class="link">All categories</a></td>
                        <td>1542</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>