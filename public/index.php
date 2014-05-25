<?php
require '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$app = new \Slim\Slim();

$capsule = new Capsule;

$capsule->addConnection([
                            'driver'    => 'mysql',
                            'host'      => 'localhost',
                            'database'  => 'test',
                            'username'  => 'root',
                            'password'  => '',
                            'charset'   => 'utf8',
                            'collation' => 'utf8_unicode_ci',
                            'prefix'    => '',
                        ]);

$capsule->setEventDispatcher(new Dispatcher(new Container));
//$capsule->setCacheManager();
$capsule->setAsGlobal();
$capsule->bootEloquent();

Capsule::table('');

$app->get('/hello/:name', function( $name ){
    echo "Hej {$name}!";
});
$app->run();