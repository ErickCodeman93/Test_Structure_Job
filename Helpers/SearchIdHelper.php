<?php

    function search_Id( $conn, $id ){
        
        $sql = "SELECT UID FROM USERS WHERE UID = ?;";
        $user = $conn -> prepare( $sql );
        $user -> execute( [ $id ] );

        $exist = $user -> fetchObject();
        return $exist;
        
    } // end helper
