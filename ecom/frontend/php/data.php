<?php

		$db = new Mysqli("localhost","root","","ecom");
		if($db->connect_error)
		{
			echo "not conntec";
		}

?>