<?php
include('./includes/header.php');

require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

 if(isset($_POST['send'])){

$mailTo = "almi.urriza@swu.edu.ph"; //admin email

$body = "<strong>Mobile Number :</strong> ".$_POST['mobilenumber'].'<br>'.
        "<strong>Message:</strong>".$_POST['message'];

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
            <a class="nav-link " href="house-preselling.php">Pre-selling</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="house-rfo.php">RFO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="seller.php">Seller</a>
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

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">

          <?php
          require 'backend/database/dbconfig.php';

          if (isset($_POST['link_viewmore'])) {

            $id_viewmore = $_POST['id_viewmore'];

            $query = "SELECT hi.images,h.developer,h.property_name,h.locations,h.units,h.squarefoot,
                      h.price_per_sqft,h.price,h.completiondate,h.reservationfee,h.yearbuilt,
                      h.monthlyprice,h.status,h.description FROM houseandlot as h,houseandlot_images as hi
                      WHERE h.ImageId=hi.ImageId AND h.id='$id_viewmore'";

            $query_run = mysqli_query($connection, $query);

            if (mysqli_fetch_array($query_run) > 0) {
              foreach ($query_run as $row) {

          ?>

                <div class="col-md-12 col-lg-8">
                  <div class="title-single-box">
                    <h1 class="title-single"><?php echo $row['locations']; ?></h1>
                    <span class="color-text-a"><?php echo $row['status']; ?></span>
                  </div>
                </div>
                <div class="col-md-12 col-lg-4">
                  <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="house-property-single.php">Properties</a>
                      </li>
                    </ol>
                  </nav>
                </div>

                <div class="col-md-10 offset-md-1">
                  <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">

                    <li class="nav-item">
                      <a class="nav-link active" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="true">Images</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Location Map</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                      <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">

                          <?php
                          $i = 0;
                          foreach ($query_run as $row) {
                            $actives = '';
                            if ($i == 0) {
                              $actives = 'active';
                            }

                          ?>
                            <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

                          <?php $i++;
                          } ?>

                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">

                          <?php
                          $i = 0;
                          foreach ($query_run  as $row) {
                            $actives = '';
                            if ($i == 0) {
                              $actives = 'active';
                            }

                          ?>
                            <div class="carousel-item <?= $actives; ?>">
                              <img src="/RealEstate/RealEstate/backend/houseandlot/<?= $row['images']; ?>" width="100%" height="550" style="object-fit:cover";>
                            </div>

                          <?php $i++;
                          } ?>

                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>

                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                      <iframe src="https://maps.google.com/maps?q=<?php echo $row['locations']; ?>&output=embed" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>


        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">




            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">Php</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $row['price']; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                  <ul class="list">
                      <li class="d-flex">
                        <strong class="mr-2">Developer:</strong>
                        <span><?php echo $row['developer']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Property:</strong>
                        <span><?php echo $row['property_name']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Location:</strong>
                        <span><?php echo $row['locations']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Property Type:</strong>
                        <span><?php echo $row['status']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Units:</strong>
                        <span><?php echo $row['units']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Area:</strong>
                        <span><?php echo $row['squarefoot']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Price per Sqft:</strong>
                        <span><?php echo $row['price_per_sqft']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Completion Date:</strong>
                        <span><?php echo $row['completiondate']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Reservation Fee:</strong>
                        <span><?php echo $row['reservationfee']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Estimated Monthly Price:</strong>
                        <span><?php echo $row['monthlyprice']; ?></span>
                      </li>
                      <li class="d-flex">
                        <strong class="mr-2">Build (Year) :</strong>
                        <span><?php echo $row['yearbuilt']; ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Property Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a"><?=$row['description']; ?></p>
                
                </div>
                <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Ask about the Property</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                <form method="post">
                <div class="form-group">
                        <input type="text" name="fullname" class="form-control  form-control-sm" placeholder="Full name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                      </div>
                      <div class="form-group">
                        <input name="email" type="email" class="form-control  form-control-sm " placeholder="Email Address" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>   
                    </div>
                    <div class="form-group">
                        <input name="mobilenumber" class="form-control  form-control-sm" placeholder="Mobile Number" data-msg="Please enter at least 11 numbers">
                        <div class="validate"></div>
                      </div>
                      <div class="form-group">
                        <textarea name="message" class="form-control form-control-sm" cols="45" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Message / Inquiries"></textarea>
                        <div class="validate"></div>
                      </div>
                      <div class="col-md-12 text-center mb-5">
                      <button type="submit" name="send" class="btn btn-a btn-sm" style="border-radius: 30px;">Send Message</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

    <?php
              }
            } else {
              echo "No Data Found";
            }
          }
    ?>


    


        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

 
<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?>

 
