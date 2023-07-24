<?php
require_once 'C:\xampp\htdocs\furn-master\admin\config\db.php';

class login extends db {
    Protected $username;
    Protected $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

  
}
