<?php 
    include('includes/nav.php'); 
    require("lib/Config.php");
    require("lib/Database.php");
    require("models/Product.php");
    ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Please type in the sales information</h2>
                <form action="" method="POST" id="sales_reg">
                    <div class="form-group">
                        <label for="customer_name" class="form-group">Customer Name</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control">
                    </div>
                
                    <div class="form-group">
                        <label for="customer_address" class="form-group">Customer Address</label>
                        <textarea class="form-control" name="customer_address" id="customer_address" rows="3"></textarea>
                    </div>   
                    <?php
                        $product = new Product();
                        $stocks = 'stocks';
                        $get_product = $product->getRecords($stocks);
                    ?>
                    <div class="form-group">
                        <label for="product_name" class="form-group">Product Name</label>
                        <select class="custom-select form-control" name="product_name">
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
                        <label for="product_qty" class="form-group">Quantity</label>
                        <input type="text" id="product_qty" name="product_qty" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="cost" class="form-group">Cost</label>
                        <input type="text" id="cost" name="cost" class="form-control">
                    </div>

                    <div id="responseText"></div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form> 
            </div><!--end of col-md-6-->
            <div class="col-md-6">
                <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Address</th>
                    <th scope="col">Prduct Name</th>
                    <th scope="col">Product Qty</th>
                    <th scope="col">Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="info"></td>
                        <td class="info"></td>
                        <td class="info"></td>
                        <td class="info"></td>
                        <td class="info"></td>
                        <td class="info"></td>
                    </tr>  
                </tbody>
                </table>
                <input type="submit" class="btn btn-outline-primary btn-block" value="Submit">
            </div><!-- end of col-md-6-->
        </div> <!--end of row--> 
    </div>
</body>
<?php include('includes/footer.php'); ?>
</html>