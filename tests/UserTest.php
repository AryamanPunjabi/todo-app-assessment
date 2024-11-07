<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testValidateUsername() {
        // Test valid username
        $user = new User('validUser1', 'Password123');
        $this->assertTrue($user->validateUsername());

        // Test invalid username
        $user = new User('invalid@user!', 'Password123');
        $this->assertFalse($user->validateUsername());
    }

    public function testValidatePassword() {
        // Test valid password
        $user = new User('validUser1', 'Password123');
        $this->assertTrue($user->validatePassword());

        // Test invalid password (too short)
        $user = new User('validUser1', 'Pass');
        $this->assertFalse($user->validatePassword());
    }
}
?>