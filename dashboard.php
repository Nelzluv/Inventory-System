<?php include('includes/nav.php') ?>
<body>
    <div class="container">
        <h1 class="text-center display-6">Dashboard</h1>
            <div class="row dashboard_reg">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body btn btn-outline-primary">
                            <a href="add_stocks.php" class="btn"><h1 class="card-title"><i class="fas fa-book fa-3x"></i></h1></a>
                            <p class="card-text lead">Add Stock</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body btn btn-outline-primary">
                            <a href="sales.php" class="btn"><h1 class="card-title"><i class="fas fa-wine-bottle fa-3x"></i></h1></a>
                            <p class="card-text lead">Add Sales</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body btn btn-outline-primary">
                            <a href="add_suppliers.php" class="btn"><h1 class="card-title"><i class="fas fa-users fa-3x"></i></h1></a>
                            <p class="card-text lead">Add Suppliers</p>  
                        </div>
                    </div>
                </div>
               <!--Begining of another row-->
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body btn btn-outline-primary">
                            <a href="view_stocks.php" class=""><h1 class="card-title"><i class="fas fa-layer-group fa-3x"></i></h1></a>
                            <p class="card-text lead">View Stock</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body btn btn-outline-primary"> 
                            <a href="view_sales.php"><h1 class="card-title"><i class="fas fa-chart-bar fa-3x"></i></h1></a>
                            <p class="card-text lead">View Report</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body btn btn-outline-danger ">
                            <a href="logout.php"><h1 class="card-title"><i class="fas fa-power-off fa-3x warning"></i></h1></a>
                            <p class="card-text lead">Logout</p>  
                        </div>
                    </div>
                </div>
               
            </div><!--end of row-->
    </div>
</body>
<script type="text/javascript" src ="Script/jquery-3.1.1.js"></script>
<script type="text/javascript" src="Script/main.js"></script>
</html>