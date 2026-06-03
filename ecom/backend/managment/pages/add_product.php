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

			<div class="col-md-4 right-col">

				<div class="form_cat">

					<h3 class="mb-4">Add Product</h3>
	<form id="categoryForm" method="POST" enctype="multipart/form-data">

	<?php

	require("../php/db.php");

	$sel_cat = $db->query("SELECT * FROM category");

	?>

	<!-- Category -->

	<label class="mb-2 mt-2">
	    Select Category
	</label>

	<select class="form-control mb-3" name="category">

	    <option value="">
	        Select Category
	    </option>

	    <?php

	    while($aa = $sel_cat->fetch_assoc())
	    {

	    ?>

	    <option value="<?php echo $aa['category_name']; ?>">
	        <?php echo $aa['category_name']; ?>
	    </option>

	    <?php

	    }

	    ?>

	</select>

	<!-- Product Name -->


	<!-- Product Image -->

	<label class="mb-2">
	    Product Image
	</label>

	<input 
    type="file"
    class="form-control mb-4"
    name="product_image"
>

	<label class="mb-2">
	    Product Name
	</label>

	<input 
	    type="text"
	    class="form-control mb-3"
	    name="product_name"
	    placeholder="Enter product name"
	>

	<!-- Product Description -->

	<label class="mb-2">
	    Product Description
	</label>

	<textarea 
	    class="form-control mb-3"
	    name="product_description"
	    rows="4"
	    placeholder="Enter product description"
	></textarea>

	<!-- Quantity -->

	<label class="mb-2">
	    Quantity
	</label>

	<input 
	    type="number"
	    class="form-control mb-3"
	    name="quantity"
	    placeholder="Enter quantity"
	>

	<!-- Amount -->

	<label class="mb-2">
	    Amount
	</label>

	<input 
	    type="number"
	    class="form-control mb-3"
	    name="amount"
	    placeholder="Enter amount"
	>



	<!-- Submit Button -->

	<button 
	    type="submit"
	    class="btn btn-primary"
	>
	    Submit
	</button>

	</form>
				</div>

			</div>


			<!-- LEFT SIDE CATEGORY LIST -->

			<div class="col-md-8 left-col">

				<div class="right-div">

					<h3 class="mb-4">Category List</h3>

					<div class="showData">
						
						<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">id</th>
	      <th scope="col">Category Name</th>
	       <th scope="col">Product Name</th>
	       
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


	<script>
		
		$(document).ready(function(){
			$("#categoryForm").submit(function(e){
				e.preventDefault();
				$.ajax({
					type : "POST",
					url :"./managment/php/addproduct.php",
					data : new FormData(this),
					contentType:false,
					processData:false,

					success:function(response)
					{
						if(response.trim() == "success")
						{
							alert(response);
						}
					}
				})
				
			})

			$(".edit-btn").each(function(){
				$(this).click(function(){
				var id = $(this).attr("id");

				$.ajax({

					type : "POST",
					url : "./managment/php/get_product.php",
					data : {id: id},
					success:function(response)
					{
						var json = JSON.parse(response);
						const myModal = new bootstrap.Modal(document.getElementById('editModal'));
						myModal.show();

						$("#edit_id").val(json.id);
						$("#edit_category").val(json.category_name);
						$("#edit_product_name").val(json.product_name);
						$("#edit_description").val(json.product_description);
						$("#edit_quantity").val(json.quantity);
						$("#edit_amount").val(json.amount);




					}
				})
				



			})


		})
		})
	</script>


	<!-- Update Modal -->

<div class="modal fade" id="editModal" tabindex="-1">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title">Update Product</h5>

        <button 
          type="button" 
          class="btn-close" 
          data-bs-dismiss="modal">
        </button>

      </div>

      <form id="updateForm" enctype="multipart/form-data">

        <div class="modal-body">

          <!-- Hidden ID -->

          <input 
            type="hidden" 
            name="edit_id" 
            id="edit_id"
          >

          <!-- Category -->

          <label class="mb-2">
            Category
          </label>

          <input 
            type="text"
            class="form-control mb-3"
            name="edit_category"
            id="edit_category" disabled 
          >

          <!-- Product Name -->

          <label class="mb-2">
            Product Name
          </label>

          <input 
            type="text"
            class="form-control mb-3"
            name="edit_product_name"
            id="edit_product_name"
          >

          <!-- Description -->

          <label class="mb-2">
            Product Description
          </label>

          <textarea 
            class="form-control mb-3"
            name="edit_description"
            id="edit_description"
            rows="4"
          ></textarea>

          <!-- Quantity -->

          <label class="mb-2">
            Quantity
          </label>

          <input 
            type="number"
            class="form-control mb-3"
            name="edit_quantity"
            id="edit_quantity"
          >

          <!-- Amount -->

          <label class="mb-2">
            Amount
          </label>

          <input 
            type="number"
            class="form-control mb-3"
            name="edit_amount"
            id="edit_amount"
          >

          <!-- Image -->

          <label class="mb-2">
            Product Image
          </label>

          <input 
            type="file"
            class="form-control"
            name="edit_image"
            id="edit_image"
          >

        </div>

        <div class="modal-footer">

          <button 
            type="button" 
            class="btn btn-secondary" 
            data-bs-dismiss="modal">
            Close
          </button>

          <button 
            type="submit" 
            class="btn btn-primary">
            Update Product
          </button>

        </div>

      </form>

    </div>

  </div>

</div>


	<script>
			
			$(document).ready(function(){
				$("#updateForm").submit(function(e){
					var editBtnId = $(".edit-btn").attr("id");


					e.preventDefault();
					$.ajax({
						type : "POST",
						url : "./managment/php/update_product.php",
						data : new FormData(this),
						contentType : false,
						processData  : false,

							success:function(response)
							{
								alert(response);
							}

					})

				})

				$(".del-btn").click(function(){
					var delId = $(this).attr("id");

					$.ajax({
						type : "POST",
						url : "./managment/php/delproduct.php",
						data : {delId: delId},
						success:function(response)
						{
							alert(response);
						}
					})
				})
			})

	</script>
	</body>
	</html>