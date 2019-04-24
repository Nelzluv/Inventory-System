<?php 
    require("../lib/Config.php");
    require("../lib/Database.php");
    require("../functions/functions.php");
    require("../models/Product.php");
    if (isset($_GET['returned'])) {
        $product_id = $_GET['id'];
        $product_name = $_GET['product_name'];
        $product_qty = $_GET['product_qty'];
        $product_info = [
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_qty' => $product_qty
        ];
     
        $product = new Product();
        $remove_product = $product->removeQty($product_info);
    }

    
?>