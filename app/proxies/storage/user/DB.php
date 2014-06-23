<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 25/05/14
 * Time: 11:39
 */

namespace App\Proxies\Storage\User;

use \App\Interfaces\User as IUser;
use \Illuminate\Database\Eloquent\Model as EloquentModel;
use \Illuminate\Database\Capsule\Manager as Capsule;

class DB extends EloquentModel implements IUser
{

    //User
    protected $user;

    //Eloquent
    /** @var Capsule */
    protected $capsule = null;
    protected $table = 'users';
    public $timestamps = true;
    protected $softDelete = true;
    protected $guarded = array( 'id', 'created_at', 'updated_at', 'deleted_at' );

    //Configuration
    const DB_CONFIGURATION_JSON_FILE = "config/database/db_settings.json";

    /**
     * @param array $name
     * @param $surname
     */
    public function __construct( $name, $surname )
    {
        $this->user = new \App\Models\User( $name, $surname );
        $this->name = $this->user->getName();
        $this->surname = $this->user->getSurname();
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

    /**
     * @param array $options
     * @return bool
     */
    public function save( array $options = array() )
    {
        $this->prepareDb();
        $this->preparePersistentAttributes();
        return parent::save( $options );
    }

    /*************
     * PRIVATE
     *************/

    /**
     * Prepares public attributes to be saved by Eloquent ORM
     */
    protected function preparePersistentAttributes()
    {
        $this->name = $this->getName();
        $this->surname = $this->getSurname();
    }

    /**
     *
     */
    protected function prepareDb()
    {
        try {
            $this->dbConnect();
        } catch ( Exception $e ) {
            echo "Connection to db failed: " . $e->getMessage();
        }

        try {
            $this->tableSetUp();
        } catch ( Exception $e ) {
            echo "Db SetUp failed: " . $e->getMessage();
        }
    }

    protected function loadDbConfiguration( $pathToConfigurationFile )
    {
        return json_decode( file_get_contents( $pathToConfigurationFile ), true );
    }

    /**
     * Handles DB connection process
     */
    protected function dbConnect()
    {
        $this->capsule = new Capsule;

        $configuration = $this->loadDbConfiguration( self::DB_CONFIGURATION_JSON_FILE );
        $this->capsule->addConnection( $configuration );
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }

    /**
     * Handles table set up, creating it in case it does not exists
     */
    protected function tableSetUp()
    {
        if ( !Capsule::schema()->hasTable( $this->table ) ) {
            Capsule::schema()->create( $this->table, function ( $table ) {

                $table->engine = 'InnoDB';

                $table->increments( 'id' );
                $table->string( 'name' );
                $table->string( 'surname' );

                $table->softDeletes(); // Never removed, only sets a date of deletion in delete_at column
                $table->timestamps();

            } );
        }
    }
}