<?php
include('./includes/header.php');

if(isset($_POST['seller_send'])){

$emailTo = "almi.urriza@swu.edu.ph"; //admin email

$mailFrom = '168LandRealty Website Email Notification From: '.$_POST['email'];  //email from sender

$body = "FULLNAME: ".$_POST['fullname']."   ".
        "PREFERTIME: ".$_POST['prefertime']. "   " .
        "LOCATION: ".$_POST['location']. "   " .
        "PROPERTY_TYPE: ".$_POST['property_type']. "   " .
        "PROPERTY_STATUS: ".$_POST['property_status']. "   " .
        "MOBILENUMBER: ".$_POST['mobilenumber']. "   ".
        "OTHER_DETAILS: ".$_POST['message'];


   if(mail($emailTo,$mailFrom,$body)){
     echo '<div class="container alert alert-success text-center">
            Your message has been sent. Thank you!</div>';
    }else{
      echo '<div class="container alert alert-danger text-center">
            Your message couldn\'t be sent, please try again later</div>';
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
                                    <h4 class="icon-title">Reach Us</h4>
                                </div>
                                <div class="icon-box-content">
                                <p class="mb-1">Email.
                                    <span class="color-a">ajax@gmail.com</span>
                                </p>
                                <p class="mb-1">Phone.
                                    <span class="color-a">0927234567654</span>
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
                                    Villa Aznar Urgello St. Cebu City,
                                    <br> Philippines
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