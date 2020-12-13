<?php
include('./database/security.php');


if (isset($_POST['memorial-save-btn'])) {

    $propertyid = $_POST['propertyid'];
    $main_imageid = $_POST['main_imageid'];

    $property = $_POST['property'];
    $location = $_POST['location'];
    $squarefoot = $_POST['squarefoot'];
    $pricepersqft = $_POST['pricepersqft'];
    $price = $_POST['price'];
    $reservationfee = $_POST['reservationfee'];
    $estimatedmonthly = $_POST['estimatedmonthly'];
    $status = $_POST['status'];
    $description = $_POST['description'];
 
    if ($_POST["edit_property_id"] != '') {
       $query = "UPDATE memorial SET property_name='$property',
                locations='$location',squarefoot='$squarefoot',price_per_sqft='$pricepersqft',
                price='$price',reservationfee='$reservationfee',
                monthlyprice='$estimatedmonthly',status='$status',description='$description' WHERE id =' " . $_POST["edit_property_id"] . " ' ";
       $_SESSION['success'] = "Data successfully Updated";
       header('Location: memorial.php');
    } else {
       $query = "INSERT INTO memorial (ImageId,main_image_id, property_name, locations, 
        squarefoot, price_per_sqft, price, reservationfee,
        monthlyprice, status, description) 
       VALUES ('$propertyid','$main_imageid', '$property', '$location',
       '$squarefoot','$pricepersqft','$price','$reservationfee','$estimatedmonthly','$status','$description')";
    }
 
    $query_run = (mysqli_query($connection, $query));
 
    if ($query_run) {
 
       $total = count($_FILES['image']['name']);
 
       // Loop through each file
       for ($i = 0; $i < $total; $i++) {
 
          //Get the temp file path 
          $tmpFilePath = $_FILES['image']['tmp_name'][$i];
 
          //Make sure we have a filepath
          if ($tmpFilePath != "") {
 
             $picture = $_FILES['image']['name'][$i];
 
             //Setup our new file path
             $newFilePath = 'memorial/' . $_FILES['image']['name'][$i];
 
             //Upload the file into the temp dir
             if (move_uploaded_file($tmpFilePath, $newFilePath)) {
 
                //Handle other code here
                $query2 = "INSERT INTO memorial_images (ImageId,images,filepath) VALUES ( '$propertyid','$picture','$newFilePath')";
                $query_run2 = (mysqli_query($connection, $query2));
 
                $_SESSION['success'] = "Data successfully Added";
                header('Location: memorial.php');
             } else {
                $_SESSION['status'] = "Uploading Image Failed ";
                header('Location: memorial.php');
             }
          }
       }
    } else {
       $_SESSION['status'] = "Listing Failed ";
       header('Location: memorial.php');
    }
    if($query_run2) {

      $main_total = count($_FILES['main_image']['name']);

      // Loop through each file
      for ($i = 0; $i < $main_total; $i++) {

         //Get the temp file path 
         $main_tmpFilePath = $_FILES['main_image']['tmp_name'][$i];

         //Make sure we have a filepath
         if ($main_tmpFilePath != "") {

            $main_picture = $_FILES['main_image']['name'][$i];
            //Setup our new file path
            $main_newFilePath = 'memorialmain/'. $_FILES['main_image']['name'][$i];
           
            //Upload the file into the temp dir
            if (move_uploaded_file($main_tmpFilePath, $main_newFilePath)) {

               //Handle other code here
               $query3 = "INSERT INTO memorial_main_image (main_image,filepath,image_id) 
               VALUES ('$main_picture','$main_newFilePath', '$main_imageid')";
               $query_run3 = (mysqli_query($connection, $query3));
              

               $_SESSION['success'] = "Data successfully Added";
               header('Location: memorial.php');
            } else {
               $_SESSION['status'] = " Uploading  Main Image Failed ";
               header('Location: memorial.php');
            }
         }
      }

   }

 }
 ########################## HOUSE AND LOT VIEW BUTTON ###########################
if (isset($_POST['property_id'])) {

   $output = '';
   $query = "SELECT * FROM memorial WHERE id = '" . $_POST["property_id"] . " ' ";
   $query_run = mysqli_query($connection, $query);
   $output .= '
   <div class="table-responsive">
      <table class=table table-bordered">';
   while ($row = mysqli_fetch_array($query_run)) {

      $output .= '

      
      <tr>
         <td width="30%"><label>Property Name :</label></td>
         <td width="70%">' . $row["property_name"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Locations :</label></td>
         <td width="70%">' . $row["locations"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Squarefoot :</label></td>
         <td width="70%">' . $row["squarefoot"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Price per Sqft :</label></td>
         <td width="70%">' . $row["price_per_sqft"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Price :</label></td>
         <td width="70%">' . $row["price"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Reservation Fee :</label></td>
         <td width="70%">' . $row["reservationfee"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Estimated Monthly :</label></td>
         <td width="70%">' . $row["monthlyprice"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Property Status :</label></td>
         <td width="70%">' . $row["status"] . '</td>
      </tr>
      <tr>
         <td width="30%"><label>Description :</label></td>
         <td width="70%">' . $row["description"] . '</td>
      </tr>

';
   }
   $output .= "</table></div>";
   echo $output;
}

################################################# HOUSE UPDATE FUNCTION #################################################################
if (isset($_POST['edit_property_id'])) {
   $query = "SELECT * FROM memorial WHERE id = '" . $_POST["edit_property_id"] . " ' ";
   $query_run = mysqli_query($connection, $query);
   $row = mysqli_fetch_array($query_run);
   echo json_encode($row);
}
######################################### HOUSE DELETE FUNCTION ############################################################################

if (isset($_POST['memorial_delete_property_id'])) {
   $id = $_POST['memorial_delete_property_id'];
   $query = "SELECT * FROM memorial WHERE id = '$id' ";
   $query_run = mysqli_query($connection, $query);
   while ($row = mysqli_fetch_array($query_run)) {
      $id = $row['id'];

      echo '<input type="hidden" name="memorial_delete_property_id" id="memorial_delete_property_id" class="form-control" value=" ' . $row['id'] . ' ">
  <p>Do you really want to delete this data?</p>';
   }
}
######################################################################################################################
