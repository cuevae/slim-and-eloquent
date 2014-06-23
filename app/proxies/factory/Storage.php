<?php

namespace App\Proxies\Implementation;

use App\Proxies\Interfaces\Storage as IStorage;
use App\Proxies\Storage\User\DB;
use App\Proxies\Storage\User\FlatFile;

class Storage implements IStorage
{

    public static function getDBProxy( $name, $surname )
    {
        return new DB( $name, $surname );
    }

    public static function getFlatFileProxy( $name, $surname )
    {
        return new FlatFile( $name, $surname );
    }
}