<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--<link rel="stylesheet" type="text/css" href="assets/css /bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>INVENTORY | View Sales</title>
</head>
<?php
if(isset($_SESSION['user_data'])){
?>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Toju Global Resource</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="dashboard.php">Dashboard</a>
        <a class="p-2 text-dark" href="add_product.php">Product</a>
        <a class="p-2 text-dark" href="add_stocks.php">Add Stock</a>
        <a class="p-2 text-dark" href="sales.php">Add Sales</a>
        <a class="p-2 text-dark" href="view_sales.php">View Sales</a>
        <a class="p-2 text-dark" href="view_stocks.php">View Stocks</a>
    </nav>
    <a class="btn btn-outline-warning" href="logout.php">Log out</a>
    </div>  
<?php
} else{
    ?>
    
    <?php
}
?>

