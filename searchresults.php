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
            <a class="nav-link active" href="house-sale.php">Sale</a>
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
<section class="intro-single">
<div class="container">
  <div class="row">
   
    <div class="col-lg-3">
    <div class="sticky" style="position: sticky; position: -webkit-sticky; top:0; ">
      <h3>Properties for Sale</h3>
      <hr>
    
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
          <a href="house-sale.php" class="list-group-item list-group-item-action bg-primary active" id="house">House &amp; Lot</a>
          <a href="condo-sale.php" class="list-group-item list-group-item-action bg-light " id="condominiums">Condominiums</a>
          <a href="commercial-sale.php" class="list-group-item list-group-item-action bg-light " id="commercial">Commercial Property</a>
          <a href="lots-sale.php" class="list-group-item list-group-item-action bg-light " id="lots">Lot Only</a>
          <a href="memorial-sale.php" class="list-group-item list-group-item-action bg-light " id="memorial">Memorial Park</a>

        </div>
      </div>
     
    </div>
  </div>


    <div class="col-lg-9">
    <h3 class="text-center text-success" id="textChange">Search Results </h3>
    <hr>  
    <div class="row" id="result">
    <?php
     require 'backend/database/dbconfig.php';

      if(isset($_POST['search_submit'])) {

       $data = $_POST['search'];       
  
        $sql = "SELECT h.id, hmi.main_image, h.developer, h.property_name, h.locations, h.units,
        h.price, h.reservationfee,h.monthlyprice,h.status FROM houseandlot as h, houseandlot_main_image as hmi
        WHERE h.main_image_id = hmi.image_id  AND (h.locations LIKE '%$data%' OR h.developer LIKE '%$data%' 
        OR h.property_name LIKE '%$data%')";


          $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
          ?>
          <div class="col-md-6 mb-2">
            <div class="card-deck">
              <div class="card shadow border-secondary">
              <img src="/RealEstate/RealEstate/backend/housemain/<?=$row['main_image'];?>" style="width: 100%; height:300px;" class="card-img-top">
              <div class="card-body">
              <h6 class="card-title text-info">Developer : <?=$row['developer']; ?></h6>
              <p>
                Property name : <?=$row['property_name']; ?><br>
                Address/Location : <?=$row['locations']; ?><br> 
                Units : <?=$row['units']; ?><br> 
                Price Range : <?=$row['price']; ?><br>
                Reservation Fee : <?=$row['reservationfee']; ?><br>
                Property Status : <?=$row['status']; ?><br>
              </p>
              <form action="house-property-single.php" method="POST">
              <input type="hidden" name="id_viewmore" value="<?=$row['id'];?>"> 
                <button class="btn btn-success btn-block" name="link_viewmore">View More Details</button>
                </form>

              </div>
            </div>
              </div>
            </div>
            <?php
             }
            }
            ?>
            
<!---####################################################################################################-->
<?php
     require 'backend/database/dbconfig.php';

      if(isset($_POST['search_submit'])) {

       $data = $_POST['search'];       
  
        $sql = "SELECT c.id, cmi.main_image, c.developer, c.property_name, c.locations, c.units,
        c.price, c.reservationfee,c.monthlyprice,c.status FROM condominiums as c, condominiums_main_image as cmi
        WHERE c.main_image_id = cmi.image_id  AND (c.locations LIKE '%$data%' OR c.developer LIKE '%$data%' 
        OR c.property_name LIKE '%$data%')";


          $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
          ?>
          <div class="col-md-6 mb-2">
            <div class="card-deck">
              <div class="card shadow border-secondary">
              <img src="/RealEstate/RealEstate/backend/condomain/<?=$row['main_image'];?>" style="width: 100%; height:300px;" class="card-img-top">
              <div class="card-body">
              <h6 class="card-title text-info">Developer : <?=$row['developer']; ?></h6>
              <p>
                Property name : <?=$row['property_name']; ?><br>
                Address/Location : <?=$row['locations']; ?><br> 
                Units : <?=$row['units']; ?><br> 
                Price Range : <?=$row['price']; ?><br>
                Reservation Fee : <?=$row['reservationfee']; ?><br>
                Property Status : <?=$row['status']; ?><br>
              </p>
              <form action="condo-property-single.php" method="POST">
              <input type="hidden" name="id_viewmore" value="<?=$row['id'];?>"> 
                <button class="btn btn-success btn-block" name="link_viewmore">View More Details</button>
                </form>

              </div>
            </div>
              </div>
            </div>
            <?php
             }
            }
            ?>

<!---#####################################################################################################-->
<?php
     require 'backend/database/dbconfig.php';

      if(isset($_POST['search_submit'])) {

       $data = $_POST['search'];       
  
        $sql = "SELECT cl.id, clmi.main_image, cl.developer, cl.property_name, cl.locations, cl.units,
        cl.price, cl.reservationfee,cl.monthlyprice,cl.status FROM commercials as cl, commercials_main_image as clmi
        WHERE cl.main_image_id = clmi.image_id  AND (cl.locations LIKE '%$data%' OR cl.developer LIKE '%$data%' 
        OR cl.property_name LIKE '%$data%')";


          $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
          ?>
          <div class="col-md-6 mb-2">
            <div class="card-deck">
              <div class="card shadow border-secondary">
              <img src="/RealEstate/RealEstate/backend/commercialmain/<?=$row['main_image'];?>" style="width: 100%; height:300px;" class="card-img-top">
              <div class="card-body">
              <h6 class="card-title text-info">Developer : <?=$row['developer']; ?></h6>
              <p>
                Property name : <?=$row['property_name']; ?><br>
                Address/Location : <?=$row['locations']; ?><br> 
                Units : <?=$row['units']; ?><br> 
                Price Range : <?=$row['price']; ?><br>
                Reservation Fee : <?=$row['reservationfee']; ?><br>
                Property Status : <?=$row['status']; ?><br>
              </p>
              <form action="commercial-property-single.php" method="POST">
              <input type="hidden" name="id_viewmore" value="<?=$row['id'];?>"> 
                <button class="btn btn-success btn-block" name="link_viewmore">View More Details</button>
                </form>

              </div>
            </div>
              </div>
            </div>
            <?php
             }
            }
            ?>
            
<!--#####################################################################################################--->
<?php
     require 'backend/database/dbconfig.php';

      if(isset($_POST['search_submit'])) {

       $data = $_POST['search'];       
  
        $sql = "SELECT l.id, lmi.main_image, l.property_name, l.locations, 
        l.price, l.reservationfee,l.monthlyprice,l.status FROM lots as l, lots_main_image as lmi
        WHERE l.main_image_id = lmi.image_id  AND (l.locations LIKE '%$data%' OR l.property_name LIKE '%$data%')";


          $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
          ?>
          <div class="col-md-6 mb-2">
            <div class="card-deck">
              <div class="card shadow border-secondary">
              <img src="/RealEstate/RealEstate/backend/lotmain/<?=$row['main_image'];?>" style="width: 100%; height:300px;" class="card-img-top">
              <div class="card-body">
              <h6 class="card-title text-info">Property name : <?=$row['property_name']; ?></h6>
              <p>
                Address/Location : <?=$row['locations']; ?><br> 
                Price Range : <?=$row['price']; ?><br>
                Reservation Fee : <?=$row['reservationfee']; ?><br>
                Property Status : <?=$row['status']; ?><br>
              </p>
              <form action="lots-property-single.php" method="POST">
              <input type="hidden" name="id_viewmore" value="<?=$row['id'];?>"> 
                <button class="btn btn-success btn-block" name="link_viewmore">View More Details</button>
                </form>

              </div>
            </div>
              </div>
            </div>
            <?php
             }
            }
            ?>
            
<!--#####################################################################################################--->
<?php
     require 'backend/database/dbconfig.php';

      if(isset($_POST['search_submit'])) {

       $data = $_POST['search'];       
  
        $sql = "SELECT ml.id, mlmi.main_image, ml.property_name, ml.locations, 
        ml.price, ml.reservationfee,ml.monthlyprice,ml.status FROM memorial as ml, memorial_main_image as mlmi
        WHERE ml.main_image_id = mlmi.image_id  AND (ml.locations LIKE '%$data%' OR ml.property_name LIKE '%$data%')";


          $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
          ?>
          <div class="col-md-6 mb-2">
            <div class="card-deck">
              <div class="card shadow border-secondary">
              <img src="/RealEstate/RealEstate/backend/memorialmain/<?=$row['main_image'];?>" style="width: 100%; height:300px;" class="card-img-top">
              <div class="card-body">
              <h6 class="card-title text-info">Property name : <?=$row['property_name']; ?></h6>
              <p>
                Address/Location : <?=$row['locations']; ?><br> 
                Price Range : <?=$row['price']; ?><br>
                Reservation Fee : <?=$row['reservationfee']; ?><br>
                Property Status : <?=$row['status']; ?><br>
              </p>
              <form action="memorial-property-single.php" method="POST">
              <input type="hidden" name="id_viewmore" value="<?=$row['id'];?>"> 
                <button class="btn btn-success btn-block" name="link_viewmore">View More Details</button>
                </form>

              </div>
            </div>
              </div>
            </div>
            <?php
             }
            }
            else{
              echo '<h6 class="text-danger">Nothing Found :( </h6>';
            }
            ?>
            
<!--#####################################################################################################--->
          </div>   
      </div>

    </div>
  </div>   
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->
 



<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?>

 

 