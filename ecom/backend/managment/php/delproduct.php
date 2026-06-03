<?php
		require("db.php");
		$delid = $_POST['delId'];


		$del_query = $db->query("DELETE FROM product WHERE id = '$delid'");
		if($del_query)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}



?>