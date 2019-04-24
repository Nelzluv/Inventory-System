<?php include('includes/nav.php') ?>
<body>
    <div class="container">
        <div class="jumbotron login_reg">
            <form action="" id="login_reg" method="POST">
                <h3 class="">TOJU'S GLOBAL INVENTORY</h3>
                    <div class="form-group">
                        <label for="username" class="form-group">Username</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                
                    <div class="form-group">
                        <label for="password" class="form-group">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div id="responseText"></div>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
            </form> 
        </div>  
    </div>
</body>
<script type="text/javascript" src ="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/main.js"></script>
</html>