<?php
/**
 * Object represents connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class Connection{
	private $connection;

	public function Connection(){
		$this->connection = ConnectionFactory::getConnection();
	}

	public function close(){
		ConnectionFactory::close($this->connection);
	}

	/**
	 * Wykonanie zapytania sql na biezacym polaczeniu
	 *
	 * @param sql zapytanie sql
	 * @return wynik zapytania
	 */
	public function executeQuery($sql){
		$stmt=$this->connection->prepare($sql);
		$stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
		return $stmt->fetchAll();
	}
	public function executeQueryCRUD($sql)
	{
		$stmt=$this->connection->prepare($sql);
		//print_r($stmt); exit;
		$stmt->execute();
       return  $this->connection->lastInsertId();
		
	}
}
?>