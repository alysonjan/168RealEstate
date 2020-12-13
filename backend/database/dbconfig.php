<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $databasename = "realtybrokerage";


    $connection = mysqli_connect($server,$username,$password,$databasename);

    $dbconfig = mysqli_select_db($connection,$databasename);

  if($dbconfig)
  { 
    // echo "Database Connected";
 }
  else
 {
    echo '
            <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                    <div class="card-body">
                    <h1 class="card-title bg-danger text-white">DATABASE CONNECTION FAILED </h1>
                    <h2 class="card-title">DATABASE FAILURE</h2>
                    <p class="card-text">PLEASE CHECK YOUR DATABASE CONNECTION.</p>
                
                    </div>
                </div>  
            </div>  
        </div>  
    </div>    

    ';
}
    