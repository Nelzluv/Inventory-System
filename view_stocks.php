<?php include('includes/nav.php') ?>
<body>
    <div class="container">
        <h2>Stocks Record</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                <th scope="col">S/N</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Supplier</th>
                <th scope="col">Unit Price</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            include('lib/Config.php');
            include('lib/Database.php');
            include('models/Product.php');
            $stocks_table = 'stocks';
            $stocks_record = new Product();
            $stocks = $stocks_record->getRecords($stocks_table); 
            $count = 1;
            foreach ($stocks as $stock) {
                ?>
                    <tr>
                        <td class="info"><?php echo $count++; ?></td>
                        <td class="info"><?php echo $stock->product_name; ?></td>
                        <td class="info"><?php echo $stock->product_qty; ?></td>
                        <td class="info"><?php echo $stock->supplier; ?></td>
                        <td class="info"><?php echo $stock->unit_price; ?></td>
                    </tr> 
                <?php
            }         
            ?>
                
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript" src ="Script/jquery-3.1.1.js"></script>
<script type="text/javascript" src="Script/main.js"></script>
</html>