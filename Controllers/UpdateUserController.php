<?php    
    header( 'Content-Type: application/json' );

    include "../DataBase/Connection_DB.php";
	include "../Helpers/SearchIdHelper.php";

    try {
	   
		if( isset( $_POST[ 'id' ] ) && !empty( $_POST[ 'id' ] ) && !is_null( $_POST[ 'id' ] ) ){

			// Connection DB
			$conexion_db = connection_DB();
			$exist = search_Id( $conexion_db, $_POST[ "id" ] );

			if( $exist ){

				// Insert
				$sql_insert = "UPDATE USERS SET NAME = ?, LAST_NAME = ?, MAIL = ?, PHONE = ?, GENDER = ? WHERE UID = ?;";
				$update = $conexion_db -> prepare( $sql_insert );
				$update -> execute( [ 
													trim( $_POST[ 'name' ] ), 
													trim( $_POST[ 'last_name' ] ), 
													trim( $_POST[ 'mail' ] ), 
													trim( $_POST[ 'phone' ]  ), 
													trim( $_POST[ 'gender' ] ),
													trim( $_POST[ "id" ] ) 
													] );

				$response = [
					"code" => 200,
					"msg" => "success",
				];

			} //end if
			else
				$response = [
					"code" => 400,
					"msg" => "Usuario no existe",
				];

		} // end if
		else
			$response = [
				"code" => 400,
				"msg" => "Falta ID",
			];
		
    } //end try 
    catch ( Exception $e ) {
	   
	   $response = [
		  "code" => 500,
		  "msg" => $e -> getMessage(),
		  "line" => $e -> getLine(),
	   ];

    } //end catch

	$conexion_db = null;

    echo json_encode( $response );