<?php

if( !empty( $GLOBALS['url_loc'][1] ) )
{
    switch ( $GLOBALS['url_loc'][1] )
    {
        case "about":
            include ( $GLOBALS['config']['private_folder']."/backend/about.php" );
        break;
        case "": //Index
            include ( $GLOBALS['config']['private_folder']."/backend/index.php" );
        break;    
        default:
            include( $GLOBALS['config']['private_folder']."/backend/404.php" );
        break;
    }
}
else
{
    include ( $GLOBALS['config']['private_folder']."/backend/index.php" );
}