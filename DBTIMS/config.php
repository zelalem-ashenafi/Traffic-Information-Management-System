<?php

// Database Details



$connection = mysqli_connect( "localhost", "root", "", "dbtims_db" );
if ( !$connection ) {
    echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
}
