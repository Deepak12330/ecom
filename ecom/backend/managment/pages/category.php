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

		<div class="col-md-6 right-col">

			<div class="form_cat">

				<h3 class="mb-4">Add Category</h3>

				<form id="categoryForm">

					<label for="add_category" class="mb-2">
						Category Name
					</label>

					<input 
						type="text" 
						class="form-control" 
						id="add_category"
						placeholder="Enter category name"
					>

					<button 
						type="button"
						class="btn btn-primary mt-4 addBtn"
					>
						Add Category
					</button>

				</form>

			</div>

		</div>


		<!-- LEFT SIDE CATEGORY LIST -->

		<div class="col-md-6 left-col">

			<div class="right-div">

				<h3 class="mb-4">Category List</h3>

				<div class="showData">
					
					<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Edit</th>
       <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  	<?php

  		require("../php/db.php");

  		$get_cat = $db->query("SELECT * FROM category");

  		while($aa = $get_cat->fetch_assoc())
  		{
  			echo "

  				<tr>
  					<td>".$aa['id']."</td>
  					<td>".$aa['category_name']."</td>
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
				$(".addBtn").click(function(e){
					e.preventDefault();
					var add_category = $("#add_category").val();
					$.ajax({

						type : "POST",
						url : "./managment/php/category_php.php",
						data : {
								add_category: add_category
						},


						beforeSend:function()
						{
							$(".msg").removeClass("d-none");
						},

						success:function(response)
						{
							if(response.trim() == "success")
							{
								$(".msg").addClass("d-none");
								location.reload();

							}

							
						}
					})
				})


				$(".edit-btn").click(function(){
						var edit_cat = $(this).attr("id");

						$.ajax({
							type : "POST",
							url : "./managment/php/edit_cat.php",
							data : {edit_cat: edit_cat},

							success:function(response)
							{
								var edit_data = JSON.parse(response);
								const myModal = new bootstrap.Modal(document.getElementById('edit_cat_modal'));
								myModal.show();

								$("#edit_input").val(edit_data['category_name']);
								$("#cat_id").val(edit_data['id']);

								// console.log(response);
							}
						})	

				})


				$(".edit_btn").click(function(){
						var edit_update =  $("#edit_input").val();
						var cat_id = $("#cat_id").val();
						$.ajax({
							type : "POST",
							url : "./managment/php/update_cat.php",
							data : {edit_update: edit_update, cat_id: cat_id},

							success:function(response)
							{
								alert(response);
							}
						})
				})



				$(".del-btn").click(function(){
					var delBtn = $(this).attr("id");
					$.ajax({
						type : "POST",
						url : "./managment/php/del.php",
						data : {delBtn: delBtn},
						success:function(response)
						{
							alert(response);
						}
					})
				})


			})	

</script>



<div class="msg d-none">
	
	<div class="loading_box">
		<i class="fa fa-spinner fa-spin fs-1"></i>
	</div>
</div>


<div class="modal" tabindex="-1" id="edit_cat_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
        			<input type="text" id="edit_input" class="form-control">
        			<input type="hidden" id="cat_id">

        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit_btn">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>