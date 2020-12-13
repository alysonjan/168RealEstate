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
            <a class="nav-link active" href="house-rent.php">Rent</a>
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
         
          <div class="col-lg-3">
          <div class="sticky" style="position: sticky; position: -webkit-sticky; top:0; ">
            <h3>Properties for Rent</h3>
            <hr>

            <div class="bg-light border-right" id="sidebar-wrapper">
              <div class="list-group list-group-flush">
                <a href="house-rent.php" class="list-group-item list-group-item-action " id="house">House &amp; Lot</a>
                <a href="condo-rent.php" class="list-group-item list-group-item-action " id="condominiums">Condominiums</a>
                <a href="commercial-rent.php" class="list-group-item list-group-item-action  " id="commercial">Commercial Property</a>
                <a href="lots-rent.php" class="list-group-item list-group-item-action  active " id="lots">Lot Only</a>
    
              </div>
            </div>
           
          </div>
        </div>

    <!-- ======= Property Grid ======= -->
  
      <div class="col-lg-9">
      <h3 class="text-center text-success" id="textChange">Lots Only </h3>
      <hr>  
      <div class="row" id="pagination_data">
       
            </div>   
        </div>
   
    </div>
  </div>   

  <!---############################# FOR PAGINATION #################---->
<script>
$(document).ready(function(){
     load_data();
    function load_data(page){
        $.ajax({
            url:"lots-rent-pagination.php",
            method:"POST",
            data:{page:page},
            success:function(data) {
                $('#pagination_data').html(data);
            }
        });
    }
    $(document).on('click', '.pagination_link', function(){
    var page = $(this).attr("id");
    load_data(page);
    
    });
    
    }); 
</script>
 
<!---############################ END OF PAGINATION #################----> 
    </section><!-- End Property Grid Single-->
  </main><!-- End #main -->


<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?>

 
