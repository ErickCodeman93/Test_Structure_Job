<?php
	header( 'Content-Type: application/json' );

    include "../DataBase/Connection_DB.php";
    
    try {
	   
	   //Connection DB
	   $conexion_db = connection_DB();

	   $sql = "SELECT * FROM USERS ORDER BY UID DESC";
	   $users = $conexion_db -> query( $sql );
	   $data = $users -> fetchAll( PDO::FETCH_OBJ );
	   
	   $conexion_db = null;
	   
	   $response = [
		  "code" => 200,
		  "msg" => "success",
		  "data" => $data,
	   ];
	   
    } //end try 
    catch ( Exception $e ) {
	   
	   $response = [
		  "code" => 500,
		  "msg" => $e -> getMessage(),
		  "line" => $e -> getLine(),
	   ];

    } //end catch


    echo json_encode( $response );

