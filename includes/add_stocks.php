<?php 
    require("../lib/Config.php");
    require("../lib/Database.php");
    require("../functions/functions.php");
    require("../models/Product.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $stock_name = trim($_POST['stock_name']);
        $product_qty = trim($_POST['product_qty']);
        $unit_price = trim($_POST['unit_price']);
        $supplier = trim($_POST['supplier']);

        notEmpty($stock_name, "stock name is compulsory");
        notEmpty($product_qty, "Please type in product_qty");
        notEmpty($unit_price, "Please type in an amount");

        $stock_info = [
            'stock_name' => $stock_name,
            'product_qty' => $product_qty,
            'unit_price' => $unit_price,
            'supplier' => $supplier
        ];

        $stock = new Product();
        $new_stock = $stock->addStock($stock_info);
    }
    
?>