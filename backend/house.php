<?php
include('./database/security.php');
include('./includes/scripts.php');
include('./includes/header.php');
?>

<?php

$query = "SELECT * FROM houseandlot ORDER BY id desc limit 1 ";
$result = mysqli_query($connection, $query);

$row = mysqli_fetch_array($result);
$last_id = $row['ImageId'];
if ($last_id == " ") {
    $img_id = "IMG1";
} else {
    $img_id = substr($last_id, 3);
    $img_id = intval($img_id);
    $img_id = "IMG" . ($img_id + 1);
}


$query = "SELECT * FROM houseandlot ORDER BY id desc limit 1 ";
$result = mysqli_query($connection, $query);

$row = mysqli_fetch_array($result);
$main_last_id = $row['main_image_id'];
if ($main_last_id == " ") {
    $main_img_id = "FRT1";
} else {
    $main_img_id = substr($main_last_id, 3);
    $main_img_id = intval($main_img_id);
    $main_img_id = "FRT" . ($main_img_id + 1);
}

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

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <!--  Modals-->

                    <h1 class="Page-header ">House &amp; Lot</h1>

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">New Listing for House &amp; Lot</h4>
                                </div>

                                <!-- ##########################INSERT DATA################################### -->
                                <div class="modal-body">
                                    <form action="process.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <!-- <div class="form-group col-md-2"> -->
                                                <!-- <label class="font-weight-bolder">[PropertyId] : </label> -->
                                                <input type="hidden" class="form-control" style="color:crimson" id="propertyid" name="propertyid" value="<?php echo $img_id; ?>" readonly>
                                            <!-- </div> -->
                                            <!-- <div class="form-group col-md-2"> -->
                                                <!-- <label class="font-weight-bolder">[MainImgId] : </label> -->
                                                <input type="hidden" class="form-control" style="color:crimson" id="main_imageid" name="main_imageid" value="<?php echo $main_img_id; ?>" readonly>
                                            <!-- </div> -->
                                            <div class="form-group col-md-6">
                                                <label>Featured Photo ***(Only One Photo is Allowed)</label>
                                                <input class="form-control" name="main_image[]" id='main_image' type="file"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Details Photos</label>
                                                <input class="form-control" name="image[]" id='image' type="file" multiple="multiple" />
                                            </div>
                                    
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Developer</label>
                                                <input class="form-control" name="developer" id="developer" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Property Name</label>
                                                <input class="form-control" name="property" id="property" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Location</label>
                                                <input class="form-control" name="location" id="location" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Units</label>
                                                <input class="form-control" name="units" id="units" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Squarefoot</label>
                                                <input class="form-control" name="squarefoot" id="squarefoot">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Price per Sqft.</label>
                                                <input class="form-control" name="pricepersqft" id="pricepersqft">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Price</label>
                                                <input class="form-control" name="price" id="price" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Completion Date</label>
                                                <input type="date" class="form-control" name="completiondate" id="completiondate">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Reservation Fee</label>
                                                <input class="form-control" name="reservationfee" id="reservationfee">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Year Built</label>
                                                <input class="form-control" name="yearbuilt" id="yearbuilt">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Estimated Monthly Price</label>
                                                <input class="form-control" name="estimatedmonthly" placeholder="(Optional)" id="estimatedmonthly">
                                            </div>
                                            <div class="selectpicker form-group col-md-6">
                                                <label>Property Status</label>
                                                
                                                <select class="form-control" name="status" id="status" required>

                                                    <option selected disabled>Choose Property Status</option>
                                                    <option>Sale</option>
                                                    <option>Rent</option>
                                                    <option>Pre-Selling</option>
                                                    <option>Rfo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group">
                                                
                                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Description here..." required></textarea>
                                            </div>
                                        </div>

                                        <div class="col text-center">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="hidden" name="edit_property_id" id="edit_property_id" />
                                            <button type="submit" class="btn btn-success" id="house-save-btn" name="house-save-btn">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- /. ROW  -->
                   

                    <div class="row">
                        <div class="col-md-12">

                        <?php
                    if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                        echo '<h2 class="bg-success text-white"> ' . $_SESSION['success'] . ' </h2>';
                        unset($_SESSION['success']);
                    }

                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                        echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                        unset($_SESSION['status']);
                    }

                    ?>

                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Advanced Tables
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <button class="btn btn-primary btn-lg fa fa-plus " data-toggle="modal" data-target="#myModal"> Add Property</button>

                                        
                                        <?php

                                        $query = "SELECT id,developer,property_name,locations,status FROM houseandlot ORDER BY id desc";
                                        $query_run = mysqli_query($connection, $query);
                                        ?>

                                        <table class="table table-striped table-bordered table-hover" id="data-table">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>Developer</th>
                                                    <th>Property</th>
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($row = mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {

                                                ?>
                                                        <tr class="odd gradeX">
                                                            <td><?php echo $row['developer']; ?></td>
                                                            <td><?php echo $row['property_name']; ?></td>
                                                            <td><?php echo $row['locations']; ?></td>
                                                            <td><?php echo $row['status']; ?></td>
                                                            <td>
                                                                <button class="btn btn-warning btn-sm viewbutton fa fa-eye" id="<?php echo $row['id']; ?>"> View</button>
                                                                <button class="btn btn-success btn-sm editbutton fa fa-edit" id="<?php echo $row['id']; ?>"> Edit</button>
                                                                <button class="btn btn-danger btn-sm  deletebutton fa fa-times" id="<?php echo $row['id']; ?>"> Delete</button>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                    echo "No record Found";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                    <!-- /. ROW  -->
                </div>

                <!--  end  Context Classes  -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!---------------------------------------------VIEW MODAL-------------------------------------------------->

    <!--------------------------------------------------------------------VIEW MODAL---------------------------------------------------------------->
    <!-- VIEW MODAL -->
    <div class="modal fade" id="viewModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h3 class="modal-title">Property Details</h3>
                    <button class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="property_detail">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------delete modal----------------------------------->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="delete_form">
                    <div class="modal-header bg-danger text-danger">
                        <h3 class="modal-title">Delete Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="delete_detail">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="del">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------------SCRIPTS FOR MODAL--------------------------------------------->
    <script>
        $(document).ready(function() {

            $('.viewbutton').on('click', function() {

                var property_id = $(this).attr("id");
                $.ajax({
                    url: "process.php",
                    method: "post",
                    data: {
                        property_id: property_id
                    },
                    success: function(data) {
                        $('#property_detail').html(data);
                        $('#viewModal').modal("show");
                    }
                });
            });

            $(document).on('click', '.editbutton', function() {
                var edit_property_id = $(this).attr("id");
                $.ajax({
                    url: "process.php",
                    method: "POST",
                    data: {
                        edit_property_id: edit_property_id
                    },
                    dataType: "json",
                    success: function(data) {

                        $('#developer').val(data.developer);
                        $('#property').val(data.property_name);
                        $('#location').val(data.locations);
                        $('#units').val(data.units);
                        $('#squarefoot').val(data.squarefoot);
                        $('#pricepersqft').val(data.price_per_sqft);
                        $('#price').val(data.price);
                        $('#completiondate').val(data.completiondate);
                        $('#reservationfee').val(data.reservationfee);
                        $('#yearbuilt').val(data.yearbuilt);
                        $('#estimatedmonthly').val(data.monthlyprice);
                        $('#status').val(data.status);
                        $('#description').val(data.description);
                        $('#edit_property_id').val(data.id);
                        $('#house-save-btn').val("Update");
                        $('#myModal').modal('show');
                    }
                });
            });


            $(document).on('click', '.deletebutton', function() {
                var delete_property_id = $(this).attr("id");
                $.ajax({
                    url: "process.php",
                    method: "POST",
                    data: {
                        delete_property_id: delete_property_id
                    },
                    success: function(data) {
                        $("#delete_detail").html(data);
                        $("#deleteModal").modal('show');
                    }
                });
            });

            $(document).on('click', '#del', function() {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: $("#delete_form").serialize(),
                    success: function(data) {
                        $("#deleteModal").modal('hide');
                        location.reload();
                    }
                });
            });

        });
    </script>
    <!-- ############################################################################################################################### -->



</body>

</html>