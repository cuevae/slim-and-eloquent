<?php

namespace App\Proxies\Interfaces;


interface Storage
{

    public static function getDBProxy( $name, $surname );

    public static function getFlatFileProxy( $name, $surname );

}