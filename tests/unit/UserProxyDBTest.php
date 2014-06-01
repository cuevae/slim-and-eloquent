<?php

/**
 * Created by PhpStorm.
 * User: manei
 * Date: 01/06/14
 * Time: 12:52
 */
class UserProxyDBTest extends PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $proxy = new App\Proxies\User\DB( "testName", "testSurname" );
        $this->assertInstanceOf( "\\App\\Interfaces\\User", $proxy );
    }

    public function testGetName()
    {
        $proxy = new App\Proxies\User\DB( "testName", "testSurname" );
        $this->assertEquals( "testName", $proxy->getName() );
    }

    public function testGetSurname()
    {
        $proxy = new App\Proxies\User\DB( "testName", "testSurname" );
        $this->assertEquals( "testSurname", $proxy->getSurname() );
    }
} 