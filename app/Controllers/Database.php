<?php 

namespace App\Controllers;


use Illuminate\Database\Capsule\Manager as Capsule; 


class Database {

    public static function connectDatabase(){
        $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => getenv('DB_DRIVER'),
        'host'      => getenv('DB_HOST'),
        'database'  => getenv('DB_NAME'),
        'username'  => getenv('DB_USER'),
        'password'  => getenv('DB_PASS'),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
        'port'      => getenv('DB_PORT')
    ]);
    
    // Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();
    
    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();
    
    

    }
    
    
    
    
}


?>