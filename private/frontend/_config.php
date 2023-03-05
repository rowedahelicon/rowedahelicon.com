<?php 

if( empty( $GLOBALS['url_loc'][1] ) )
{
    include ( $GLOBALS['config']['private_folder']."/frontend/index.php" );
}
else
{
    switch ( $GLOBALS['url_loc'][1] )
    {
        case "about":
            include ( $GLOBALS['config']['private_folder']."/frontend/about.php" );
        break;
        case "": //Index
            include ( $GLOBALS['config']['private_folder']."/frontend/index.php" );
        break;    
        default:
            include( $GLOBALS['config']['private_folder']."/frontend/404.php" );
        break;
    }
}