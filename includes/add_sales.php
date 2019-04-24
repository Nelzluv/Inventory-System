<?php 
    require("../lib/Config.php");
    require("../lib/Database.php");
    require("../functions/functions.php");
    require("../models/Product.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $customer_name = trim($_POST['customer_name']);
        $customer_address = trim($_POST['customer_address']);
        $product_name = trim($_POST['product_name']);
        $product_qty = trim($_POST['product_qty']);
        $cost = trim($_POST['cost']);

        notEmpty($customer_name, "Please type in the customer name");
        notEmpty($customer_address, "Please type in the customer address");
        notEmpty($product_name, "Product name is compulsory");
        notEmpty($product_qty, "Please type in product_qty");
        notEmpty($cost, "Please type in an amount");

        $sales_info = [
            'customer_name' => $customer_name,
            'customer_address' => $customer_address,
            'product_name' => $product_name,
            'product_qty' => $product_qty,
            'cost' => $cost
        ];

        $sales = new Product();
        $new_sales = $sales->addSales($sales_info);
    }
    
?>