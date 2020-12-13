<?php
include('./includes/header.php');
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
            <a class="nav-link" href="seller.php">Seller</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="faqs.php">FAQs</a>
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
    <div class="container">
        <div class="col-sm-12 section-t8">
            <div class="title-box mb-5" style="margin-top: 8%;">
                <h2 class="title-a text-center text-info">Frequently Asked Questions</h2>
            </div>
            <div class="accordion">
                <?php
                    require 'backend/database/dbconfig.php';

                    $query = "SELECT * FROM faqs order by id desc";
                    $query_run = mysqli_query($connection, $query);

                    if (mysqli_fetch_array($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                    <div class="accordion-item">
                        <div class="accordion-item-header"><?=$row['question'];?></div>
                        <div class="accordion-item-body">
                        <div class="accordion-item-body-content">
                            <?=$row['answer'];?>
                        </div>
                        </div>
                    </div>

                <?php
                    }
                } else {
                    echo '<h1 class="text-danger text-center"> "No FAQs Found"</h1>';
                }
                ?>
            </div>
        </div>
    </div>
</main><!-- End #main -->


<?php
include('./includes/scripts.php');
include('./includes/footer.php');
?>