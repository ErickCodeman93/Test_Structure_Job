<?php

include "../DataBase/Config_DB.php";

function connection_DB(){
    
    $config_db = new ConexionDB();
    return $config_db -> getConexion();
} //end function
