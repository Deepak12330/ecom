<?php

	require("data.php");
		$full_name = $_POST['full_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$otp = $_POST['otp'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];


		if($password == $confirm_password)
		{
			// echo "success";

			$check_table = $db->query("SHOW TABLES LIKE 'users'");

				if($check_table->num_rows > 0)
				{
				     $pattern = "1234567890";
					        $length = strlen($pattern);
					        $otp = [];


					        for($i=0;$i<6;$i++)
					        {
					            $otp_index = rand(0,$length-1);
					            $otp[] = $pattern[$otp_index];
					        }

					        $otp_f = implode($otp);


					         $sent_otp = mail($email,"OTP VERIFICATION",$otp_f,"FROM: deepakharisharma0000@gmail.com");
						        if($sent_otp)
						        {
						            
						        	 $sql = "INSERT INTO users
            (full_name, email, phone, otp, address, password,confirm_password)
            VALUES
            ('$full_name', '$email', '$phone', '$otp_f', '$address', '$password', '$confirm_password')";

				    if($db->query($sql))
				    {
				        echo "success";
				    }
				    else
				    {
				        echo "Error : " . $db->error;
				    }
																           
						        }
						        else
						        {
						        	echo "mail not sent";
						        }
				}
				else
				{



				    $create_table = "
					CREATE TABLE IF NOT EXISTS users (
					    id INT AUTO_INCREMENT PRIMARY KEY,
					    full_name VARCHAR(100) NOT NULL,
					    email VARCHAR(100) NOT NULL UNIQUE,
					    phone VARCHAR(15) NOT NULL,
					    otp VARCHAR(10) DEFAULT NULL,
					    address TEXT NOT NULL,
					    password VARCHAR(255) NOT NULL,
					    confirm_password VARCHAR(255) NOT NULL,
					    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
					)";

					if($db->query($create_table))
					{
					    // echo "Table created successfully";
					      $pattern = "1234567890";
					        $length = strlen($pattern);
					        $otp = [];


					        for($i=0;$i<6;$i++)
					        {
					            $otp_index = rand(0,$length-1);
					            $otp[] = $pattern[$otp_index];
					        }

					        $otp_f = implode($otp);


					         $sent_otp = mail($email,"OTP VERIFICATION",$otp_f,"FROM: deepakharisharma0000@gmail.com");
						        if($sent_otp)
						        {
						             $sql = "INSERT INTO users
            (full_name, email, phone, otp, address, password,confirm_password)
            VALUES
            ('$full_name', '$email', '$phone', '$otp_f', '$address', '$password', '$confirm_password')";

				    if($db->query($sql))
				    {
				        echo "success";
				    }
				    else
				    {
				        echo "Error : " . $db->error;
				    }

						           
						        }
						        else
						        {
						        	echo "mail not sent";
						        }
					}
					else
					{
					    echo "Error: " . $db->error;
					}
				}
		}
		else
		{
			echo "password not match";
		}

?>