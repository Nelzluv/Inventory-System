<?php include('includes/nav.php') ?>
<body>
    <div class="container">
        <h2>Sales Record</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                <th scope="col">S/N</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Customer Address</th>
                <th scope="col">Prduct Name</th>
                <th scope="col">Product Qty</th>
                <th scope="col">Cost</th>
                <th scope="col">Returned</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            include('lib/Config.php');
            include('lib/Database.php');
            include('models/Product.php');
            $sales_table = 'sales';
            $sales_record = new Product();
            $sales = $sales_record->getRecords($sales_table); 
            $count = 1;
            foreach ($sales as $sale) {
                ?>
                    <tr>
                        <td class="info"><?php echo $count++; ?></td>
                        <td class="info"><?php echo $sale->customer_name; ?></td>
                        <td class="info"><?php echo $sale->customer_address; ?></td>
                        <td class="info"><?php echo $sale->product_name; ?></td>
                        <td class="info"><?php echo $sale->product_qty; ?></td>
                        <td class="info"><?php echo $sale->cost; ?></td>
                        <td class="info"> <a class="btn btn-outline-danger" type= "submit" name="returned" href="includes/remove_product.php?returned=1&id=<?php echo $sale->id; ?>&product_name=<?php echo $sale->product_name; ?>&product_qty=<?php echo $sale->product_qty; ?>"> Returned </a> </td>
                    </tr> 
                <?php
            }         
            ?>
                
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript" src ="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</html>