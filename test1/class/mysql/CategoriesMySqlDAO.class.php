<?php
/**
 * Class that operate on table 'categories'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2024-01-10 08:01
 */
class CategoriesMySqlDAO implements CategoriesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategoriesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM categories WHERE categoryId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM categories';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM categories ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param categorie primary key
 	 */
	public function delete($categoryId){
		$sql = 'DELETE FROM categories WHERE categoryId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($categoryId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategoriesMySql categorie
 	 */
	public function insert($categorie){
		$sql = 'INSERT INTO categories (categoryName, status) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorie->categoryName);
		$sqlQuery->set($categorie->status);

		$id = $this->executeInsert($sqlQuery);	
		$categorie->categoryId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategoriesMySql categorie
 	 */
	public function update($categorie){
		$sql = 'UPDATE categories SET categoryName = ?, status = ? WHERE categoryId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorie->categoryName);
		$sqlQuery->set($categorie->status);

		$sqlQuery->setNumber($categorie->categoryId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM categories';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoryName($value){
		$sql = 'SELECT * FROM categories WHERE categoryName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM categories WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoryName($value){
		$sql = 'DELETE FROM categories WHERE categoryName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM categories WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CategoriesMySql 
	 */
	protected function readRow($row){
		$categorie = new Categorie();
		
		$categorie->categoryId = $row['categoryId'];
		$categorie->categoryName = $row['categoryName'];
		$categorie->status = $row['status'];

		return $categorie;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return CategoriesMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>