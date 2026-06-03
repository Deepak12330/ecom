<?php
	
	require("./php/data.php");
	$product_id = $_GET['id'];

	$get_pro = $db->query("SELECT * FROM product WHERE id = '$product_id'");

	$aa = $get_pro->fetch_assoc();
	




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
	<title><?php  echo $aa['product_name']?></title>
</head>
<body>




	<div class="container-fluid">
		<div class="row">

		<?php

		require("php/nav.php");

		?>

		</div>

		<div class="container mt-5">
    <?php
    $get_pro = $db->query("SELECT * FROM product WHERE id='$product_id'");
    $aaa = $get_pro->fetch_assoc();
    ?>

    <div class="row">

        <!-- Product Image -->
        <div class="col-md-5">
            <div class="card border-0">
                <img src="../backend/managment/product_pic/<?php echo $aaa['product_name']; ?>"
                     class="img-fluid border rounded"
                     alt="">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-4 border shadow">
            <h2><?php echo $aaa['product_name']; ?></h2>

            <hr>

            <h3 class="text-success">
                ₹<?php echo number_format($aaa['amount']); ?>
            </h3>

            <p class="text-muted">
                Inclusive of all taxes
            </p>

            <hr>

            <h5>Description</h5>

            <p>
                <?php echo $aaa['product_description']; ?>
            </p>

            <div class="mt-4">
                <?php 

                if($aaa['quantity'] == 0)
                {
                		echo '<span class="btn btn-danger w-100 mt-3">Out Of Stock</span>';
                }
                else

                {
                	echo '<span class="btn btn-primary w-100 mt-3">Buy Now</span>';
                }


                ?>
                <!-- <span class="btn btn-primary w-100 mt-3">Buy Now</span> -->
            </div>
        </div>

        <!-- Buy Box -->
        
        </div>

    </div>
</div>
		
	</div>





</body>
</html>