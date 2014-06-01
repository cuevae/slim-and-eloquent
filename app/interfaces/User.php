<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 25/05/14
 * Time: 11:14
 */

namespace App\Interfaces;

interface User {

    /**
     * @param $name
     * @param $surname
     */
    public function __construct( $name, $surname );

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getSurname();

} 