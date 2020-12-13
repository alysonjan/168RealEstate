<?php
include('./database/security.php');
include('./includes/scripts.php');
include('./includes/header.php');

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

                    <h1 class="Page-header ">FAQs</h1>

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">FAQs</h4>
                                </div>

                                <!-- ##########################INSERT DATA################################### -->
                                <div class="modal-body">
                                    <form action="faqsbackend.php" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <strong>Question :</strong>
                                                <textarea type="text" name="question" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <strong>Answer :</strong>
                                                <textarea type="text" name="answer" rows="7" class="form-control"></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            <button type="submit" class="btn btn-success" name="add_faqs">Post</button>
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
                                        <button class="btn btn-primary btn-lg fa fa-plus " data-toggle="modal" data-target="#myModal"> Add FAQs</button>
                                        <?php

                                        $query = "SELECT * FROM faqs ORDER BY id desc";
                                        $query_run = mysqli_query($connection, $query);
                                        ?>

                                        <table class="table table-striped table-bordered table-hover" id="data-table">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th class="col-md-6">Answer</th>
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
                                                            <td><?php echo $row['question']; ?></td>
                                                            <td><?php echo $row['answer']; ?></td>
                                                     
                                                            <td>
                                                                
                                                                <button class="btn btn-success btn-sm faqs-edit-btn fa fa-edit"></button>
                                                                <button class="btn btn-danger btn-sm  faqs-del-btn fa fa-times"></button>
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


 <!--EDIT Modal -->

 <div class="modal fade" id="editxfaqs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header bg-success text-white">
        <h2 class="modal-title">Edit FAQs</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="faqsbackend.php" method="POST">
        <div class="modal-body">

              <input type="hidden" id="faqsupdateid" name="faqsupdateid">

              <div class="form-group">
                        <strong>Question :</strong>
                        <textarea type="text" name="editquestion" id="editquestion" class="form-control"> </textarea>
                </div>
                <div class="form-group">
                        <strong>Answer :</strong>
                        <textarea type="text" name="editanswer" rows="7" id="editanswer" class="form-control"> </textarea>
                </div>
        </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="faqsupdatedata">Save Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!----------------------------------------delete modal ----------------------------------------------------->
<div class="modal fade" id="faqs_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Delete FAQs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="faqsbackend.php" method="POST">
        <div class="modal-body">

        <input type="hidden" name="faqs_delete_id" id="faqs_delete_id">
        
        <h4>Are you sure you want to delete this data?</h4>
        </div>  

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" name="faqs_delete_btn" class="btn btn-danger">Yes</button>
            </div> 
    </form>

    </div>
  </div>
</div>

    <!--------------------------------------------------------------SCRIPTS FOR MODAL--------------------------------------------->
    <script>
     
    $(document).ready(function () {
        $('.faqs-edit-btn').on('click', function()  {

        $('#editxfaqs').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#faqsupdateid').val(data[0]);
        $('#editquestion').val(data[1]);
        $('#editanswer').val(data[2]);    

        });
    });



     
    $(document).ready(function () {
        $('.faqs-del-btn').on('click', function()  {

        $('#faqs_delete_modal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#faqs_delete_id').val(data[0]);

        });
    });


    </script>
    <!-- ############################################################################################################################### -->



</body>

</html>