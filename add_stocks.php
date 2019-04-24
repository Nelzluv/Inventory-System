<?php 
    include('includes/nav.php'); 
    require("lib/Config.php");
    require("lib/Database.php");
    require("models/Product.php");
    ?>
<body>
    <div class="container">
            <?php
                $product = new Product();
                $stocks = 'stocks';
                $get_product = $product->getRecords($stocks);
            ?>
        <h2>Please type in product information</h2>
            <form action="" method="POST" id="stock_reg">
                <div class="form-group">
                    <label for="product_name" class="form-group">Product Name</label>
                    <select class="custom-select form-control" name="stock_name">
                        <?php
                            foreach($get_product as $record) { 
                        ?>
                            <option value="<?= $record->product_name ?>"><?= $record->product_name ?></option>
                        <?php
                            } 
                        ?>
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="unit_price" class="form-group">Unit price</label>
                    <input type="text" id="unit_price" name="unit_price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="unit_price" class="form-group">Quantity</label>
                    <input type="text" id="product_qty" name="product_qty" class="form-control">
                </div>

                <div class="form-group">
                    <label for="text" class="form-group">Supplier</label>
                    <select class="custom-select form-control" name="supplier">
                        <option value="coke">Coke</option>
                    </select>
                </div>

                <div id="responseText"></div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>   
    </div>
</body>
<?php include('includes/footer.php'); ?>

</html>