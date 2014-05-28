<?php

require '../../app/models/User.php';

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testUserGetsCreated()
    {
        $user = new \Models\User("test");
    }
}