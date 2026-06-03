<?php

	require("db.php");


	$category            = $_POST['category'];
    $product_namee       = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $quantity            = $_POST['quantity'];
    $amount              = $_POST['amount'];

    $product_image = $_FILES['product_image'];
    // print_r($category);

    $product_name = $product_image['name'];
    $product_url =  $product_image['tmp_name'];

    $product_pic = "../product_pic/".$product_name;

    if(file_exists($product_pic))
    {
        echo "image already exists";
    }
    else
    {
        if(move_uploaded_file($product_url,$product_pic))
        {
            // echo "success";
        }
        else
        {
            echo "failed";
        }
    }
    

    $check_table = $db->query("SHOW TABLES LIKE 'product'");
    if($check_table->num_rows == 1)
    {
         $insert = $db->query("INSERT INTO product(category_name, product_image, 
                    product_name, 
                    product_description, 
                    quantity, amount)
                VALUES('$category',
                    '$product_name',
                    '$product_namee',
                    '$product_description',
                    '$quantity', '$amount')");

                if($insert)
                {
                    echo "success";
                }
                else
                {
                    echo "failed";
                }
    }
    else
    {
        $create_table = $db->query("CREATE TABLE product(
            id INT AUTO_INCREMENT PRIMARY KEY, 
            category_name VARCHAR(255), 
            product_image VARCHAR(255), 
            product_name VARCHAR(255), 
            product_description TEXT, 
            quantity INT, amount INT, 
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)"); 

        if($create_table)
        {
                $insert = $db->query("INSERT INTO product(category_name, product_image, 
                    product_name, 
                    product_description, 
                    quantity, amount)
                VALUES('$category',
                    '$product_url',
                    '$product_name',
                    '$product_description',
                    '$quantity', '$amount')");

                if($insert)
                {
                    echo "success";
                }
                else
                {
                    echo "failed";
                }
        }
        else
        {
            echo "failed";
        }
    } 


?>