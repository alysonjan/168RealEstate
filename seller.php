<?php
include('./includes/header.php');

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

 if(isset($_POST['seller_send'])){

$mailTo = "almi.urriza@swu.edu.ph"; //admin email

$body = "<strong>Mobile Number: </strong> ".$_POST['mobilenumber'].'<br>'.
        "<strong>Prefer time: </strong>".$_POST['prefertime'].'<br>'.
        "<strong>Property Type: </strong>".$_POST['property_type'].'<br>'.
        "<strong>Property Status: </strong>".$_POST['property_status'].'<br>'.
        "<strong>Location: </strong>".$_POST['location'].'<br>'.
        "<strong>Message: </strong>".$_POST['message'];

$msg = "Your message has been sent. Thank you!";

$mail  = new PHPMailer\PHPMailer\PHPMailer();
// $mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host= "mail.smtp2go.com";
$mail->SMTPAuth = true;
$mail->Username = "cite_admin";
$mail->Password = "adm1npass";
$mail->SMTPSecure = "tls";
$mail->Port = "2525";

$mail->From = $_POST['email'];  //email from sender
$mail->FromName = $_POST['fullname']; //sender name

$mail->addAddress($mailTo, "168LandRealityBrokerage");

$mail->isHTML(true);
$mail->Subject = "From 168LandRealty Website Email Notification";
$mail->Body =$body;

$mail->AltBody = "This is the plain text version of the email content";
  
if(!$mail->send()){
  echo "Mailer Error: ".$mail->ErrorInfo;
}else{
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
  
}

 }
?>
<!---------NAVBAR----------------------->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php" style="font-size:21px;"><img src="assets/img/logofav.png">Cebu<span class="color-b" style="font-size:21px;"> 168 Realty Brokerage</span></a>
      <button type="button" class="btn btn-sm btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
      <span class="fa fa-search" aria-hidden="true"></span> Search</button>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="house-sale.php">Sale</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="house-rent.php">Rent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="house-preselling.php">Pre-selling</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="house-rfo.php">RFO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="seller.php">Seller</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faqs.php">FAQs</a>
          </li>
        </ul>
        <button type="button" class="navbar-toggler collapsed font-weight-bold text-danger"
        data-toggle="collapse" data-target=".navbar-collapse.show" aria-expanded="false">Close</button>
      
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
   
    </div>

  </nav>
<!------------------END OF NAVBAR----------------------->
<main id="main">
    <section class="contact">
        <div class="container">
            <div class="col-sm-12 section-t8">
                <div class="title-box mb-5" style="margin-top: 5%;">
                    <h2 class="title-a text-center text-info">List your Property</h2>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fullname" class="form-control" placeholder="Full name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control " placeholder="Email Address" data-rule="email" data-msg="Please enter a valid email">
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <!---------->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="mobilenumber" class="form-control" placeholder="Mobile Number" data-msg="Please enter at least 11 numbers">
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="prefertime" class="form-control " placeholder="Preferred time to call" data-rule="email" data-msg="Please enter a time">
                                        <div class="validate"></div>
                                    </div>
                                </div>

                                <!---------->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="property_type" class="form-control" placeholder="Property Type" data-msg="Please enter property type">
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="property_status" class="form-control " placeholder="Property Status" data-msg="Please enter a property status">
                                        <div class="validate"></div>
                                    </div>
                                </div>

                                <!---------->
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <input name="location" class="form-control " placeholder="Location/Address" data-rule="minlen:4" data-msg="Please enter Complete Address">
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" name="message" cols="45" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Other Details"></textarea>
                                        <div class="validate"></div>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center mb-5">
                                    <button type="submit" name="seller_send" class="btn btn-a" style="border-radius: 30px;">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 section-md-t3">
                        <div class="icon-box section-b2">
                            <div class="icon-box-icon">
                                <span class="ion-ios-paper-plane"></span>
                            </div>
                            <div class="icon-box-content table-cell">
                                <div class="icon-box-title">
                                    <h4 class="icon-title">Say Hello</h4>
                                </div>
                                <div class="icon-box-content">
                                    <p class="mb-1">Email.
                                        <span class="color-a">contact@example.com</span>
                                    </p>
                                    <p class="mb-1">Phone.
                                        <span class="color-a">+54 356 945234</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box section-b2">
                            <div class="icon-box-icon">
                                <span class="ion-ios-pin"></span>
                            </div>
                            <div class="icon-box-content table-cell">
                                <div class="icon-box-title">
                                    <h4 class="icon-title">Find us in</h4>
                                </div>
                                <div class="icon-box-content">
                                    <p class="mb-1">
                                        Manhattan, Nueva York 10036,
                                        <br> EE. UU.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <span class="ion-ios-redo"></span>
                            </div>
                            <div class="icon-box-content table-cell">
                                <div class="icon-box-title">
                                    <h4 class="icon-title">Social networks</h4>
                                </div>
                                <div class="icon-box-content">
                                    <div class="socials-footer">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="link-one">
                                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section><!-- End Contact Single-->

</main><!-- End #main -->

<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?>