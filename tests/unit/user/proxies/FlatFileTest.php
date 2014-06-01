<?php

class FlatFileTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $proxy = new \App\Proxies\User\FlatFile( "testName", "testSurname" );
        $this->assertInstanceOf( "\\App\\Interfaces\\User", $proxy );
    }

    public function testName()
    {
        $proxy = new \App\Proxies\User\FlatFile( "testName", "testSurname" );
        $this->assertEquals( "testName", $proxy->getName() );
    }

    public function testSurname()
    {
        $proxy = new \App\Proxies\User\FlatFile( "testName", "testSurname" );
        $this->assertEquals( "testSurname", $proxy->getSurname() );
    }

    public function testSave()
    {
        $proxy = new \App\Proxies\User\FlatFile( "testName", "testSurname" );
        $this->assertEquals( "testSurname", $proxy->getSurname() );
        $proxy->save();
    }

    public function testSaveUser()
    {
        $mock = $this->getMockBuilder( "\\App\\Proxies\\User\\FlatFile" )
                     ->setConstructorArgs( array( "testName", "testSurname" ) )
                     ->getMock();

        $mock->expects( $this->once() )->method( "save" )->will( $this->returnValue( true ) );

        $mock->save();
    }
}