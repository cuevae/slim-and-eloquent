<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 25/05/14
 * Time: 11:14
 */

namespace App\Interfaces;

interface User {

    public function __construct( $name, $surname );
    public function getName();
    public function getSurname();

} 