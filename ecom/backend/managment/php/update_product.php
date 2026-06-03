<?php
	
	require("db.php");

		$edit_id           = $_POST['edit_id'];
		
		$edit_product_name = $_POST['edit_product_name'];
		$edit_description  = $_POST['edit_description'];
		$edit_quantity     = $_POST['edit_quantity'];
		$edit_amount       = $_POST['edit_amount'];


		$update_table = $db->query("UPDATE product SET product_name = '$edit_product_name',product_description = '$edit_description',quantity = '$edit_quantity',amount = '$edit_amount' WHERE id = '$edit_id'");

		if($update_table)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}

		
		

?>