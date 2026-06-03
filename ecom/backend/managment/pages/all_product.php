	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>

		<title>Category Management</title>

		<style>

			*
			{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body
			{
				background: #f5f5f5;
			}

			.right-col,
			.left-col
			{
				height: 100vh;
				padding: 20px;
			}

			.form_cat
			{
				background: white;
				padding: 20px;
				border-radius: 10px;
				box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
			}

			.right-div
			{
				background: white;
				padding: 20px;
				border-radius: 10px;
				box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
				height: 100%;
				overflow-y: auto;
			}

			.category-box
			{
				background: #0d6efd;
				color: white;
				padding: 10px;
				border-radius: 5px;
				margin-bottom: 10px;
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.category-box i
			{
				cursor: pointer;
			}


			.msg 
			{
				width:100%;
				height: 100vh;
				background-color: black;
				top:0;
				position: absolute;
				opacity: 0.4;
				display: flex;
				align-items: center;
				justify-content: center;
			}

			.loading_box
			{
				width:150px;
				height: 100px;
				background-color: white;
				display: flex;
				align-items: center;
				color: black;
			}

		</style>

	</head>

	<body>

	<div class="container-fluid">
		<div class="row">

			<!-- RIGHT SIDE FORM -->



			<!-- LEFT SIDE CATEGORY LIST -->

			<div class="col-md-12 left-col">

				<div class="right-div">

					<h3 class="mb-4">Category List</h3>

					<div class="showData">
						
						<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">id</th>
	      <th scope="col">Category Name</th>
	       <th scope="col">Product Name</th>
	       <th scope="col">Product Image</th>
	       <th scope="col">Prodct Amount</th>
	       <th scope="col">Product Quantity</th>

	      <th scope="col">Edit</th>
	       <th scope="col">Delete</th>
	    </tr>
	  </thead>
	  <tbody>

	  	<?php

  		require("../php/db.php");

  		$get_cat = $db->query("SELECT * FROM product");

  		while($aa = $get_cat->fetch_assoc())
  		{
  			echo "

  				<tr>
  					<td>".$aa['id']."</td>
  					<td>".$aa['category_name']."</td>
  					<td>".$aa['product_name']."</td>
  					<td>
						<img 
							src='./managment/product_pic/".$aa['product_name']."'
							width='80'
							height='80'
							style='object-fit:cover; border-radius:5px;'
						>
					</td>
  					<td>".$aa['quantity']."</td>
  					<td>".$aa['amount']."</td>
  					<td><i class='fa fa-edit edit-btn' id='".$aa['id']."'></i></td>
  					<td><i class='fa fa-trash del-btn' id='".$aa['id']."'></i></td>

  				</tr>
  			";
  		}

  	?>
	  	
	    
	  </tbody>
	</table>
					</div>

				</div>

			</div>

		</div>
	</div>




	</body>
	</html>