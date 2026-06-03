<?php
		require("db.php");
		$delid = $_POST['delBtn'];


		$del_query = $db->query("DELETE FROM category WHERE id = '$delid'");
		if($del_query)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}



?>