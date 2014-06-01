<?php

spl_autoload_register( function ( $class ) {

    //Namespaces autoload
    if ( strpos( $class, "\\" ) !== false ) {
        $class = str_replace("\\", "/", $class);
    }

    $pathToFile = $class . ".php";
    if( file_exists( $pathToFile ) ){
        require_once( $pathToFile );
    }
    //Fallback check in vendor folder
    else{
        require_once( "vendor/autoload.php" );
    }



} );

