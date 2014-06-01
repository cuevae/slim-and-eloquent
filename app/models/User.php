<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 25/05/14
 * Time: 11:40
 */

namespace App\Models;

use App\Interfaces\User as IUser;

class User implements IUser
{

    protected $_name;
    protected $_surname;

    public function __construct( $name, $surname )
    {
        $this->_name = $name;
        $this->_surname = $surname;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getSurname()
    {
        return $this->_surname;
    }



}