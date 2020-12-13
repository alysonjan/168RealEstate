<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cebu 168 Realty Brokerage</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logofav.png" rel="icon">
  <link href="assets/img/logo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- FAQs CSS File -->
  <link rel="stylesheet" href="assets/css/faqs.css">


  
    
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  
</head>
<body>

   <!-- ======= Property Search Section ======= -->
   <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" action="/RealEstate/RealEstate/searchresults.php" method="POST">
        <div class="row">

        <!-- <div class="selectpicker form-group col-md-4">
                  <strong>Property Type</strong>
             <select class="form-control" name="propertyType" id="propertyType" required>

               <option selected disabled>Choose Property Type</option>
               <option>House and Lot</option>
               <option>Condominiums</option>
               <option>Commercials</option>
               <option>Lots</option>
               <option>Memorials</option>
            </select>
           </div> -->
          <div class="col-md-12 mb-2">
            <div class="form-group">
            <div class="input-group mt-3">
            <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info"
                    placeholder="Location,Developer,Property name" autocomplete="off">
                <div class="input-group-append">
                    <button type="submit" name="search_submit" class="btn btn-success">
                     search <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            

          </div>
          </div>
           <div class="col-md-6 mb-2">
            <div class="form-group" style="position: relative; margin-top:-22px; margin-left:2px; width:250px;">
              <div class="list-group" id="show-list">
                <!-- <a href='#' class='list-group-item list-group-item-action border-1'>No record</a> -->
              </div>
              
            </div>
          </div> 

        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->

  <!--#############################################################--->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>


<!--########## SEARCH BAR JAVASCRIPT ######################------>

<script>
  $(document).ready(function(){
  $("#search").keyup(function(){
      var searchText = $(this).val();
      if(searchText!=''){
          $.ajax({
              url:'includes/search.php',
              method:'post',
              data:{query:searchText},
              success:function(response){
                  $("#show-list").html(response);
              }
          });
      }
      else{
          $("#show-list").html('');
      }
  });
  $(document).on('click','a',function(){
      $("#search").val($(this).text());
      $("#show-list").html('');
  });
});


</script>
<!--########## END OF SEARCH BAR JAVASCRIPT ######################------>

</body>

</html>