<?php
session_start();

include('./database/dbconfig.php');

if($dbconfig)
 {
     // echo "Database Connected";
  }
 else 
 {
      header('Location: ./database/dbconfig.php');
 }

 if(!$_SESSION['email'])
{
     header('Location:index.php');
 }

?>