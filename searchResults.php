<?php
  include 'inc/connect.php';
  $ids = explode("!",$_GET['search']);
  $id = $ids[1];
//   echo $ids[1];
//   die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("inc/header.php");?>
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <?php include 'inc/searchForm.php';?>
  <!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
    <?php include("inc/nav.php");?>
  <!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
              <h1 class="title-single">Search Result</h1>
              <!-- <span class="color-text-a">Grids</span> -->
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Rent
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select id="changeOrder" class="custom-select">
                  <option value="newToOld">New to Old</option>
                  <option value="Rent">For Rent</option>
                  <option value="Sales">For Sale</option>
                </select>
              </form>
            </div>
          </div>

              <?php
                $page = ((isset($_GET['pageId'])) && is_numeric($_GET['pageId']))? $_GET['pageId'] :1;
                $limits = 15;
                $start = (($page-1)*$limits);
                    $query = mysqli_query($conn,"SELECT *FROM companies,offices WHERE offices.id='$id' AND offices.saleStatus='reserve' AND companies.coStatus='Approved' AND offices.companyId=companies.id ORDER BY offices.id DESC limit $start,$limits") or die(mysqli_error($conn));
                      $size = mysqli_query($conn,"SELECT *FROM companies,offices WHERE offices.id='$id' AND offices.saleStatus='reserve' AND companies.coStatus='Approved' AND offices.companyId=companies.id ORDER BY offices.id DESC") or die(mysqli_error($conn));
                      $size = mysqli_num_rows($size);
                    if (mysqli_num_rows($query)>0) {
                      while ($rows = mysqli_fetch_array($query)) {
                        ?>
                          <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                              <div class="img-box-a">
                                <img src="admin/media/spaceImages/<?= $rows['thumnail']?>" style="height:400px;" alt="" class="img-a img-fluid">
                              </div>
                              <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                  <div class="card-header-a">
                                    <h2 class="card-title-a">
                                      <a href="property-single?identification=<?= rand().uniqid()."!".$rows['id']."!".rand().uniqid().rand();?>"><?= $rows['rooms'];?> <?= $rows['name'];?>
                                        <br /> <small><?= $rows['location'];?></small></a><br>
                                        <a href="customers?ident=<?= rand().uniqid().rand()."!".$rows['id']."!".rand().uniqid().rand();?>" id="customers" class="btn btn-sm btn-outline-warning">Book</a>
                                    </h2>
                                  </div>
                                  <div class="card-body-a">
                                    <div class="price-box d-flex">
                                      <small class="price-a"><?= $rows['status'];?> | Rwf <?= $rows['price'];?></small>
                                    </div>
                                    <a href="property-single?identification=<?= rand().uniqid()."!".$rows['id']."!".rand().uniqid().rand();?>" class="link-a">Click here to view
                                      <span class="ion-ios-arrow-forward"></span>
                                    </a>
                                  </div>
                                  <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                      <li>
                                        <h4 class="card-info-title">Area</h4>
                                        <span><?= $rows['area'];?>m
                                          <sup>2</sup>
                                        </span>
                                      </li>
                                      <li>
                                        <h4 class="card-info-title">Contact</h4>
                                        <span><?= $rows['contact'];?></span>
                                      </li>
                                      <li>
                                        <h4 class="card-info-title">Price</h4>
                                        <span><?= $rows['price'];?></span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    <?php
                  }
                }
              ?>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <?php
                  if ($page > 1) {
                    ?>
                      <li class="page-item">
                        <a class="page-link" href="?pageId=<?= $page-1;?>" tabindex="-1">
                          <span class="ion-ios-arrow-back"></span>
                        </a>
                      </li>
                    <?php
                  }else{
                    ?>
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                          <span class="ion-ios-arrow-back"></span>
                        </a>
                      </li>
                    <?php
                  }
                    for ($i=0; $i < ceil($size/$limits); $i++) { 
                      ?>
                        <li class="page-item">
                          <a class="page-link" href="?pageId=<?= ($i+1);?>"><?= ($i+1)?></a>
                        </li>
                      <?php
                    }
                  if ($page <ceil($size/$limits)) {
                    ?>
                      <li class="page-item next">
                        <a class="page-link" href="?pageId=<?= ($page+1)?>">
                          <span class="ion-ios-arrow-forward"></span>
                        </a>
                      </li>
                    <?php
                  }else{
                    ?>
                      <li class="page-item next disabled">
                        <a class="page-link" href="#">
                          <span class="ion-ios-arrow-forward"></span>
                        </a>
                      </li>
                    <?php
                  }
                ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include("inc/footer.php");?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $("#navRent").addClass('active');
    });
  </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(function(){
      $("#changeOrder").change(function(){
        $("#allSpaces").hide();
        $("#loadSales").hide();
        let values = $("#changeOrder").val();
        //alert("Rwanda is the best " +values);
        $("#loadRent").load("inc/loadSales?values="+values);
      });

      $("#searchInput").keyup(function(){
        var items = $(this).val();
        //alert(items);
        $("#results").html('');
        if(items != ''){

          $.ajax({
            url:"searches.php",
            method:"POST",
            data:{search:items},
            dataType:"text",
            success:function(response){
              $("#results").html(response);
            }
          });

        }else{
          $("#results").html('');
        }
        
      });
    });
  </script>
</body>

</html>