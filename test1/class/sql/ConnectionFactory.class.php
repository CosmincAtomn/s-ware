<?php
/*
 * Class return connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class ConnectionFactory{
	
	/**
	 * Zwrocenie polaczenia
	 *
	 * @return polaczenie
	 */
	static public function getConnection(){
		$host='localhost'; 
   		$dbname='project_s';
    	$user='root';
    	$pass='';
		$conn=new PDO("mysql:host=$host;dbname=$dbname", $user, $pass); 
		
		if(!$conn){
			throw new Exception('could not connect to database');
		}
		return $conn;
	}

	/**
	 * Zamkniecie polaczenia
	 *
	 * @param connection polaczenie do bazy
	 */
	static public function close($connection){
		$connection=null;
		//mysqli_close($connection);
	}
}
?>