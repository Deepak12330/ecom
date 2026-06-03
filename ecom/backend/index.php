

<!DOCTYPE html>
<html>
<head>


	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<link rel="stylesheet" type="text/css" href="managment/css/style.css">
	<script src="managment/js/script.js"></script>
	<title>admin</title>
</head>
<body>


	<div class="container-fluid">


		<div class="row">
			<div class="col-md-2 border category-row">

				<ul class="menu fs-3">
					
					<li class="my_admin" p_link="category">Category</li>
					<li class="my_admin" p_link="add_product">Add Product</li>
					<li class="my_admin" p_link="all_product">All Product</li>

				</ul>
				
			</div>

			<div class="col-md-10 border content">
				
			</div>
		</div>
		

	</div>


	<script>
	
	$(document).ready(function(){

		$(".my_admin").click(function(){

			var page = $(this).attr("p_link");

			$.ajax({
				type:"POST",
				url:"./managment/pages/" + page + ".php",

				success:function(response)
				{
					$(".content").html(response);
				}
			});

		});

	});

</script>

</body>
</html>
</body>
</html>