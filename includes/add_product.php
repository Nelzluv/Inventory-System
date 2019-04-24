<?php 
    require("../lib/Config.php");
    require("../lib/Database.php");
    require("../functions/functions.php");
    require("../models/Product.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $product_name = trim($_POST['product_name']);
        $supplier = trim($_POST['supplier']);
        $unit_price = trim($_POST['unit_price']);
      

       notEmpty($product_name, "Product name is compulsory");
        notEmpty($unit_price, "Please type in an amount");

        $product_info = [
            'product_name' => $product_name,
            'unit_price' => $unit_price,
            'supplier' => $supplier
        ];
       

        $product = new Product();
        $new_product = $product->addProduct($product_info);
    }
    
?>