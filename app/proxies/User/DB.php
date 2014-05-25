<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 25/05/14
 * Time: 11:39
 */

namespace Proxies\User;
use \Illuminate\Database\Eloquent\Model as EloquentModel;
use \Illuminate\Database\Capsule\Manager as Capsule;

class DB extends EloquentModel  {

    protected $_table = 'users';

    public function listUsers()
    {
        $users = Capsule::table('users')->where('votes', '>', 100)->get();
    }

} 