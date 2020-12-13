<?php
require '../backend/database/dbconfig.php';


if(isset($_POST['query'])) {
    // $propertyType = $_POST['propertyType'];
    $inpText = $_POST['query'];
    $query = "SELECT DISTINCT developer,property_name,locations FROM houseandlot
     WHERE developer LIKE '%$inpText%' OR property_name LIKE '%$inpText%'  OR locations LIKE '%$inpText%'  ";
    $result = $connection->query($query);

    if($result->num_rows> 0 ){
        while($row= $result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['developer']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['property_name']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['locations']."</a> ";
         
        }
    }
    // else{
    //     echo "<a href='#' class='list-group-item list-group-item-action border-1'>No record</a>";
    // }
}
##############################################################################################################
if(isset($_POST['query'])) {
    // $propertyType = $_POST['propertyType'];
    $inpText = $_POST['query'];
    $query = "SELECT DISTINCT developer,property_name,locations FROM condominiums
     WHERE developer LIKE '%$inpText%' OR property_name LIKE '%$inpText%'  OR locations LIKE '%$inpText%'  ";
    $result = $connection->query($query);

    if($result->num_rows> 0 ){
        while($row= $result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['developer']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['property_name']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['locations']."</a> ";
         
        }
    }
    // else{
    //     echo "<a href='#' class='list-group-item list-group-item-action border-1'>No record</a>";
    // }
}
###############################################################################################################
if(isset($_POST['query'])) {
    // $propertyType = $_POST['propertyType'];
    $inpText = $_POST['query'];
    $query = "SELECT DISTINCT developer,property_name,locations FROM commercials
     WHERE developer LIKE '%$inpText%' OR property_name LIKE '%$inpText%'  OR locations LIKE '%$inpText%'  ";
    $result = $connection->query($query);

    if($result->num_rows> 0 ){
        while($row= $result->fetch_assoc()){
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['developer']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['property_name']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['locations']."</a> ";
         
        }
    }
    // else{
    //     echo "<a href='#' class='list-group-item list-group-item-action border-1'>No record</a>";
    // }
}
##############################################################################################################
if(isset($_POST['query'])) {
    // $propertyType = $_POST['propertyType'];
    $inpText = $_POST['query'];
    $query = "SELECT DISTINCT property_name,locations FROM lots
     WHERE  property_name LIKE '%$inpText%'  OR locations LIKE '%$inpText%'  ";
    $result = $connection->query($query);

    if($result->num_rows> 0 ){
        while($row= $result->fetch_assoc()){
       
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['property_name']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['locations']."</a> ";
         
        }
    }
    // else{
    //     echo "<a href='#' class='list-group-item list-group-item-action border-1'>No record</a>";
    // }
}

#############################################################################################################
if(isset($_POST['query'])) {
    // $propertyType = $_POST['propertyType'];
    $inpText = $_POST['query'];
    $query = "SELECT DISTINCT property_name,locations FROM memorial
     WHERE  property_name LIKE '%$inpText%'  OR locations LIKE '%$inpText%'  ";
    $result = $connection->query($query);

    if($result->num_rows> 0 ){
        while($row= $result->fetch_assoc()){
    
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['property_name']."</a> ";
            echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['locations']."</a> ";
         
        }
    }
    else{
        echo "<a href='#' class='list-group-item list-group-item-action border-1'>No record</a>";
    }
}




?>