<?php
class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function validateUsername() {
        return preg_match('/^[a-zA-Z0-9_]+$/', $this->username);
    }

    public function validatePassword() {
        return strlen($this->password) >= 8;
    }
}
?>