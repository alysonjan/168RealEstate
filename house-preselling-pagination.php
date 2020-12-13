<?php
require 'backend/database/dbconfig.php';
$record_per_page = 10;
$page = '';
$output = '';

if (isset($_POST["page"])) {
  $page = $_POST["page"];
} else {
  $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

$sql = "SELECT h.id,hmi.main_image, h.developer, h.property_name, h.locations, h.units, h.price, h.reservationfee,
               h.status FROM houseandlot as h, houseandlot_main_image as hmi
               WHERE h.main_image_id = hmi.image_id AND h.status ='pre-selling' ORDER BY h.id desc LIMIT $start_from, $record_per_page ";

$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
?>
  <div class="col-md-6 mb-2">
    <div class="card-deck">
      <div class="card shadow border-secondary">
        <img src="/RealEstate/RealEstate/backend/housemain/<?= $row['main_image']; ?>" style="width: 100%; height:300px;" class="card-img-top">
        <div class="card-body">
          <h6 class="card-title text-info">Developer : <?= $row['developer']; ?></h6>
          <p>
            Property name : <?= $row['property_name']; ?><br>
            Address/Location : <?= $row['locations']; ?><br>
            Units : <?= $row['units']; ?><br>
            Price Range : <?= $row['price']; ?><br>
            Reservation Fee : <?= $row['reservationfee']; ?><br>
           
          </p>
          <form action="house-property-single.php" method="POST">
            <input type="hidden" name="id_viewmore" value="<?= $row['id']; ?>">
            <button class="btn btn-success btn-block" name="link_viewmore">View More Details</button>
          </form>

        </div>
      </div>
    </div>
  </div>
<?php }

$page_query =
  "SELECT h.id,hmi.main_image, h.developer, h.property_name, h.locations, h.units, h.price, h.reservationfee,
              h.status FROM houseandlot as h, houseandlot_main_image as hmi
              WHERE h.main_image_id = hmi.image_id AND h.status ='pre-selling' ORDER BY h.id desc ";

$page_result = mysqli_query($connection, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);
for ($i = 1; $i <= $total_pages; $i++) {
  $output .= '<div class="row">
                  <div class="col-sm-12">
                    <nav class="pagination-a">
                      <ul class="pagination justify-content-end">
              
                        <li class="page-item ">
                          <a class="page-link pagination_link" id="' . $i . '">' . $i . '</a>
                        </li>
     
                      </ul>
                    </nav>
                  </div>
                </div>';
}
echo $output;

?>