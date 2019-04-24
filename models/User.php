<?php
session_start();
    Class Users{
        private $db;
        public $is_Logged_In;

        public function __construct(){
            $this->db = new Database();
        }

        public function chkUsername($user){   
            $this->db->query('select username from users where username = :username');
            $this->db->bind(':username', $user);
            if ($this->db->single()) {
                return false;
            } else {
                return true;
            }
        }

        public function login($user_info){
            $this->db->query('select * from users where username = :username and password = :password');
            $this->db->bind(':username', $user_info['userName']);
            $this->db->bind(':password', $user_info['password']);
            $row = $this->db->single();

            if ($row) {
                $_SESSION['user_data'] = array(
                    'username' => $row->username,
                    'password' => $row->password,
                    'is_logged_in' => true
                );
                echo "<script>location.href='dashboard.php';</script>";
            } else {
                echo "Incorrect Login details";
            }

        }

        public function logout() {
            unset($_SESSION['is_logged_in']);
            unset($_SESSION['user_data']);
            session_destroy();
            //Redirect
            echo "<script>location.href='index.php';</script>";
        }

        public function update(){
            
        }

    }
?>