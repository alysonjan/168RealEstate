<?php
include('./database/security.php');
include('./database/dbconfig.php');
include('./includes/header.php');
include('./includes/scripts.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator</title>
</head>

<body>
    <div id="wrapper">

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Total Property Listing</small>
                        </h1>

                    </div>
                </div>


                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-yellow">
                            <div class="panel-left pull-left yellow">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="panel-right">
                            <?php 
                            $query = "SELECT id FROM users ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);
                             echo'<h3>'.$row.'</h3>';
                             echo'<strong>Total Users</strong>';
                            ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red">
                                <i class="fa fa-home fa-5x"></i>
                            </div>
                            <div class="panel-right">
                            <?php 
                            $query = "SELECT id FROM houseandlot ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);

                                echo'<h3>'.$row.'</h3>';
                                echo'<strong>House &amp; Lot</strong>';
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red">
                                <i class="fa fa-building-o fa-5x"></i>
                            </div>
                            <div class="panel-right">
                            <?php 
                            $query = "SELECT id FROM condominiums ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);

                                echo'<h3>'.$row.'</h3>';
                                echo'<strong>Condominiums</strong>';
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red">
                                <i class="fa fa-building-o fa-5x"></i>
                            </div>
                            <div class="panel-right">
                            <?php 
                            $query = "SELECT id FROM commercials ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);

                                echo'<h3>'.$row.'</h3>';
                                echo'<strong>Commercial Park</strong>';
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red">
                                <i class="fa fa-square fa-5x"></i>
                            </div>
                            <div class="panel-right">
                            <?php 
                            $query = "SELECT id FROM lots ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);

                                echo'<h3>'.$row.'</h3>';
                                echo'<strong>Lots</strong>';
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red">
                                <i class="fa fa-plus-square fa-5x"></i>
                            </div>
                            <div class="panel-right">
                            <?php 
                            $query = "SELECT id FROM memorial ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);

                                echo'<h3>'.$row.'</h3>';
                                echo'<strong>Memorial Park</strong>';
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-left pull-left brown">
                                <i class="fa fa-question fa-5x"></i>
                            </div>
                            <div class="panel-right">
                            <?php 
                            $query = "SELECT id FROM faqs ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);

                                echo'<h3>'.$row.'</h3>';
                                echo'<strong>FAQs</strong>';
                            ?>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->


</body>

</html>