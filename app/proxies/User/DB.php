<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 25/05/14
 * Time: 11:39
 */

namespace App\Proxies\User;

use \Illuminate\Database\Eloquent\Model as EloquentModel;
use \Illuminate\Database\Capsule\Manager as Capsule;

class DB extends EloquentModel implements \App\Interfaces\User
{

    //User
    protected $_user;

    //Eloquent
    protected $_table = 'users';

    public function __construct( $name, $surname )
    {
        $this->_user = new \App\Models\User( $name, $surname );
    }

    public function getName()
    {
        return $this->_user->getName();
    }

    public function getSurname()
    {
        return $this->_user->getSurname();
    }

    public function save()
    {

    }

    public function listUsers()
    {
        $users = Capsule::table( 'users' )->where( 'votes', '>', 100 )->get();
    }
}