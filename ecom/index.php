<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>coach 4 u shop</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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




<script>
  $(document).ready(function(){
    $("#signup_btn").click(function(e){
      e.preventDefault();

      const myModal = new bootstrap.Modal(document.getElementById('signup_modal'));
      myModal.show();
      
    })



    $("#signup").submit(function(e){
        e.preventDefault();

        $.ajax({
            type : "POST",
            url : "./frontend/php/signup.php",
            data : new FormData(this),
            contentType : false,
            processData : false,
            beforeSend:function(response)
            {
                $("#signup_btn").addClass("disabled");
            }

            success:function(response)
            {
                alert(response);
            }

        })
    })


    $("#r_email").on('change',function()
    {
        var email = $("#r_email").val();

        $.ajax({
            type : "POST",
            url : "./frontend/php/email_auth.php",
            data : {email: email},
            success:function(response)
            {
                alert(response);
            }
        })
    })


  })


</script>

<div class="modal fade" id="signup_modal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">User Signup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

                <form action="" method="post" id="signup">
                    <div class="modal-body">

                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name" required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required id="r_email">
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" placeholder="Enter Mobile Number" required>
                            </div>

                            <!-- OTP -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">OTP</label>
                                <div class="input-group">
                                    <input type="text" name="otp" class="form-control" placeholder="Enter OTP">
                                    <button type="button" class="btn btn-primary disabled">
                                        Send OTP
                                    </button>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Complete Address</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter Complete Address" required></textarea>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Create Password" required>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success" id="signup_btn">
                            Signup
                        </button>
                    </div>
                </form>

        </div>
    </div>
</div>



</body>
</html>
