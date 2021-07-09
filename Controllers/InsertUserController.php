<?php    
    header( 'Content-Type: application/json' );

    include "../DataBase/Connection_DB.php";
     
	if( 
		isset( $_POST[ 'name' ] ) && !empty( $_POST[ 'name' ] ) && !is_null( $_POST[ 'name' ] ) &&
		isset( $_POST[ 'last_name' ] ) && !empty( $_POST[ 'last_name' ] ) && !is_null( $_POST[ 'last_name' ] ) &&
		isset( $_POST[ 'mail' ] ) && !empty( $_POST[ 'mail' ] ) && !is_null( $_POST[ 'mail' ] ) &&
		isset( $_POST[ 'phone' ] ) && !empty( $_POST[ 'phone' ] ) && !is_null( $_POST[ 'phone' ] ) && 
		isset( $_POST[ 'gender' ] ) && !empty( $_POST[ 'gender' ] ) && !is_null( $_POST[ 'gender' ] )
	 ){

		try {
			
			//Connection DB
			$conexion_db = connection_DB();

			$sql = "INSERT INTO USERS ( NAME, LAST_NAME, MAIL, PHONE, GENDER ) VALUES ( ?, ?, ?, ?, ? );";
			$insert = $conexion_db -> prepare( $sql );
			$insert -> execute( [ 
												trim( $_POST[ 'name' ] ), 
												trim( $_POST[ 'last_name' ] ), 
												trim( $_POST[ 'mail' ] ),
												 trim( $_POST[ 'phone' ]  ),
												  trim( $_POST[ 'gender' ] ) 
											] );

			// Close connection
			$conexion_db = null;

			$response = [
			   "code" => 200,
			   "msg"  => "success",
			];
			
		 } //end try 
		 catch ( Exception $e ) {
			
			$response = [
			   "code" => 500,
			   "msg"  => $e -> getMessage(),
			   "line" => $e -> getLine(),
			];
	 
		 } //end catch
		 
	} //end if
	else {

		$response = [
			"code" => 404,
			"msg" => "Faltan campos",
		 ];

	} //end else
	

	echo json_encode( $response );