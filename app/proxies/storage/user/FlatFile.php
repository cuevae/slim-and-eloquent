<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 25/05/14
 * Time: 11:39
 */

namespace App\Proxies\Storage\User;

use \App\Interfaces\User as IUser;

class FlatFile implements IUser{

    protected $user;

    const USERS_FILE = "app/proxies/storage/user/flatfile/storage.json";

    /**
     * @param $name
     * @param $surname
     */
    public function __construct( $name, $surname )
    {
        $this->user = new \App\Models\User( $name, $surname );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->user->getName();
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->user->getSurname();
    }

    public function save()
    {
        $this->name = $this->getName();
        $this->surname = $this->getSurname();
        $json = json_encode( $this );
        file_put_contents( self::USERS_FILE, $json );
    }
}