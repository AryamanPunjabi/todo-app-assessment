<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testValidateUsername() {
        $user = new User('validUser1', 'Password123');
        $this->assertTrue($user->validateUsername());

        $user = new User('invalid@user!', 'Password123');
        $this->assertFalse($user->validateUsername());
    }

    public function testValidatePassword() {
        $user = new User('validUser1', 'Password123');
        $this->assertTrue($user->validatePassword());

        $user = new User('validUser1', 'Pass');
        $this->assertFalse($user->validatePassword());
    }
}
?>