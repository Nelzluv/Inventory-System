<?php
    session_start();
    require("../lib/Config.php");
    require("../lib/Database.php");
    require("../functions/functions.php");
    require("../models/User.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $userName = trim($_POST['username']);
        $password = trim($_POST['password']);

        //validate input if it's empty
        notEmpty($userName, "Username is compulsory");
        notEmpty($password, "Password is compulsory");

        $user_info = [
            'userName' => $userName,
            'password' => $password
        ];

        $loginUser = new Users();
        $loginUser->login($user_info);
        
}