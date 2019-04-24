<?php include('includes/nav.php') ?>
<body>
    <div class="container">
        <h2>Please type in product information</h2>
            <form action="" method="POST" id="product_reg">
                <div class="form-group">
                    <label for="product_name" class="form-group">Product Name</label>
                    <input type="text" id="product_name" name="product_name" class="form-control">
                </div>
               
                <div class="form-group">
                    <label for="unit_price" class="form-group">Unit price</label>
                    <input type="text" id="unit_price" name="unit_price" class="form-control">
                </div>   

                <div class="form-group">
                    <label for="text" class="form-group">Supplier</label>
                    <select class="custom-select form-control" name="supplier">
                        <option value="coke">Coke</option>
                        <option value="pepsi">Pepsi</option>
                    </select>
                </div>

                <div id="responseText"></div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>   
    </div>
</body>
<script type="text/javascript" src ="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</html>