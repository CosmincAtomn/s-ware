<?php
/**
 * Object executes sql queries
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class QueryExecutor{

	/**
	 * Wykonaniew zapytania do bazy
	 *
	 * @param sqlQuery obiekt typu SqlQuery
	 * @return wynik zapytania 
	 */
	public static function execute($sqlQuery){
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction)
		{
			$connection = new Connection();
		}
		else
		{
			$connection = $transaction->getConnection();
		}
				
			$query = $sqlQuery->getQuery();
			//print_r($query); exit;
			$result = $connection->executeQuery($query);
			//echo count($result); exit;
		//print_r($result); exit;
		if(count($result)<=0)
		{	
			//throw new Exception($connection->errorInfo);
		}
		$i=0;
		$tab = array();
		for($j=0;$j<count($result);$j++)
		{
			$tab[$j] = $result[$j];
		}
		//print_r($tab); exit;
		//mysqli_free_result($result);
		if(!$transaction)
		{
			$connection->close();
		}
		
		return $tab;
		
	}
	
	
	public static function executeUpdate($sqlQuery){
		//print_r($sqlQuery); exit;
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){

			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}
		$query = $sqlQuery->getQuery();
		$result = $connection->executeQueryCRUD($query);
			
		return $result;
	}

	public static function executeInsert($sqlQuery){
		
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
		$connection = $transaction->getConnection();
		}
		return QueryExecutor::executeUpdate($sqlQuery);
		//return $connection->lastInsertId();
		//print_r($m); exit;
	}
	
	/**
	 * Wykonaniew zapytania do bazy
	 *
	 * @param sqlQuery obiekt typu SqlQuery
	 * @return wynik zapytania 
	 */
	public static function queryForString($sqlQuery){
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}
		$result = $connection->executeQuery($sqlQuery->getQuery());
		if(!$result){
			throw new Exception($connectio->errorInfo);
		}
		//$row = mysqli_fetch_array($result);		
		return $result[0];
	}

}
?>