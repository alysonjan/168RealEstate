<?php
include('./database/security.php');


if (isset($_POST['add_faqs'])) {

    $question = $_POST['question'];
    $answer = $_POST['answer'];
   
    $query = "INSERT INTO faqs (question, answer) VALUES ('$question','$answer')";
    $query_run = (mysqli_query($connection, $query));
 
    if($query_run)
    {
        $_SESSION['success'] = "FAQs successfully Added";
        header('Location: faqs.php');
    }
    else
    {
        $_SESSION['status'] = "FAQs not Added";
        header('Location: faqs.php');
     }
 }
 
################################################# HOUSE UPDATE FUNCTION #################################################################
if(isset($_POST['faqsupdatedata']))
{
    $id = $_POST['faqsupdateid'];

    $editquestion=$_POST['editquestion'];
    $editanswer=$_POST['editanswer'];
   

    $query = " UPDATE faqs SET question='$editquestion',answer='$editanswer' WHERE id='$id' ";
    $query_run = (mysqli_query($connection,$query));
    if($query_run)
    {
     
        $_SESSION['success'] = "Successfully Updated";
        header('Location: faqs.php'); 

    }
    else
    {
        $_SESSION['status'] = "Data was not Updated";
        header('Location: faqs.php');

    }

}
######################################### HOUSE DELETE FUNCTION ############################################################################

if(isset($_POST['faqs_delete_btn']))
{
    $id = $_POST['faqs_delete_id'];

    $query ="DELETE  FROM faqs WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)  
    {
        $_SESSION['success'] = "Data successfully Deleted";
        header("Location: faqs.php");

    }
    else
    {
        $_SESSION['status'] = "Data was not Deleted ";
        header("Location: faqs.php");
    }   
}

######################################################################################################################
