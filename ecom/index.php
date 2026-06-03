<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>coach 4 u shop</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


</head>
<body>


	<div class="container-fluid">
		<div class="row">
			<?php  require("./frontend/php/nav.php");?>
		</div>
		<div class="row mt-2">
			<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images-eu.ssl-images-amazon.com/images/G/31/INSLGW/pc_unrec_may25_refresh_1x._CB761742379_.jpg" class="d-block w-100" alt="..." height="350px">
    </div>
    <div class="carousel-item">
      <img src="https://images-eu.ssl-images-amazon.com/images/G/31/2025/GW/UNREC/PC/78269._CB785061629_.jpg" class="d-block w-100" alt="..." height="350px">
    </div>
    <div class="carousel-item">
      <img src="https://images-eu.ssl-images-amazon.com/images/G/31/Img26/Sports/February/GW/BAU/Legacy/Unrec/5298_Sports_-_BAU_PC_creatives_3000X1200_02._CB787728092_.jpg" class="d-block w-100" alt="..." height="350px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
		</div>



	</div>


    <div class="row mt-3">

             <?php

          require("./frontend/php/data.php");


          $get_cat = $db->query("SELECT * FROM product");

          while($aa = $get_cat->fetch_assoc()){


            echo '
<div class="col-md-3 mb-3">
    <div class="card h-80">
        <img src="./backend/managment/product_pic/'.$aa['product_name'].'" class="card-img-top img-fluid">
        <div class="card-body"> 
            <h5>'.$aa['product_name'].'</h5>
            <p>₹'.$aa['amount'].'</p>
            <a href="./frontend/buy.php?id='.$aa['id'].'"><button class="btn btn-primary" id="">buy now</button></a>
        </div>

    </div>
</div>';

           
            
          }

          ?>

     </div>



</body>
</html>