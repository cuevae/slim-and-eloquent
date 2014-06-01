<?php

class UserTest extends PHPUnit_Framework_TestCase
{

    public function testUserGetsCreated()
    {
        $user = new App\Models\User( "testName", "testSurname" );
        $this->assertInstanceOf( "\\App\\Models\\User", $user );
    }

    public function testGetName()
    {
        $user = new App\Models\User( "testName", "testSurname" );
        $this->assertEquals( "testName", $user->getName() );
    }

    public function testGetSurname()
    {
        $user = new App\Models\User( "testName", "testSurname" );
        $this->assertEquals( "testSurname", $user->getSurname() );
    }


}