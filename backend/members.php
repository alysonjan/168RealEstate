<?php
include('./database/security.php');
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

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Admin Profile
                        </h1>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">User Account</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="process.php" method="POST">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" name="add_user" class="btn btn-primary">Add</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <!-- End Modals-->
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
                                    <button class="btn btn-primary btn-lg fa fa-plus " data-toggle="modal" data-target="#myModal"> Add User</button>
                                    <?php

                                    $query = "SELECT id,first_name,last_name,email FROM users ORDER BY id desc";
                                    $query_run = mysqli_query($connection, $query);
                                    ?>

                                    <table class="table table-striped table-bordered table-hover" id="data-table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th>id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row = mysqli_num_rows($query_run) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {

                                            ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['first_name']; ?></td>
                                                        <td><?php echo $row['last_name']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td>
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
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

<!---################################## DELETE MODAL ##################################################--->
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

<!--####################################################################################################-->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deletebutton', function() {
                var user_delete_property_id = $(this).attr("id");
                $.ajax({
                    url: "process.php",
                    method: "POST",
                    data: {
                        user_delete_property_id: user_delete_property_id
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

</body>

</html>