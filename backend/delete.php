<?php
include('./database/security.php');



$user_delete_property_id=$_POST['user_delete_property_id'];

$query ="DELETE FROM users WHERE id = '".$user_delete_property_id. " ' ";
$query_run=mysqli_query($connection,$query);

########################## HOUSE and LOT ######################################################


$delete_property_id=$_POST['delete_property_id'];

$query ="DELETE FROM houseandlot WHERE id = '".$delete_property_id. " ' ";
$query_run=mysqli_query($connection,$query);

########################## condominiums ######################################################

$condo_delete_property_id=$_POST['condo_delete_property_id'];

$query ="DELETE FROM condominiums WHERE id = '".$condo_delete_property_id. " ' ";
$query_run=mysqli_query($connection,$query);

########################## commercials ######################################################

$commercials_delete_property_id=$_POST['commercials_delete_property_id'];

$query ="DELETE FROM commercials WHERE id = '".$commercials_delete_property_id. " ' ";
$query_run=mysqli_query($connection,$query);

########################## lots ######################################################

$lots_delete_property_id=$_POST['lots_delete_property_id'];

$query ="DELETE FROM lots WHERE id = '".$lots_delete_property_id. " ' ";
$query_run=mysqli_query($connection,$query);

########################## memorial ######################################################

$memorial_delete_property_id=$_POST['memorial_delete_property_id'];

$query ="DELETE FROM memorial WHERE id = '".$memorial_delete_property_id. " ' ";
$query_run=mysqli_query($connection,$query);

 
 
 



