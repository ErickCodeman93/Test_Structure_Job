<?php

include_once( "../env.php" );
    
class ConexionDB {
    
    private $config = null;

    function __construct() {

        try {
            $this -> config = new PDO( "sqlsrv:server=".PATH_DB.";database=".NAME_DB, USER_DB, PWD_DB );
            $this -> config -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
        } // end try 
        catch ( Exception $e ) {
            echo "Ocurrió un error con la base de datos: " . $e->getMessage();
        } //end catch

    } //end constructor

    function getConexion(){
        return $this -> config;
    } //end function

} //end class