<?php
/**
 * Class that operate on table 'content'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2024-01-10 08:01
 */
class ContentMySqlDAO implements ContentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM content WHERE contentId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM content';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM content ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($contentId){
		$sql = 'DELETE FROM content WHERE contentId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($contentId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert($content){
		$sql = 'INSERT INTO content (categoryId, contentName, filePath, imagePath, uploadTime, description, remarks, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($content->categoryId);
		$sqlQuery->set($content->contentName);
		$sqlQuery->set($content->filePath);
		$sqlQuery->set($content->imagePath);
		$sqlQuery->set($content->uploadTime);
		$sqlQuery->set($content->description);
		$sqlQuery->set($content->remarks);
		$sqlQuery->set($content->status);

		$id = $this->executeInsert($sqlQuery);	
		$content->contentId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update($content){
		$sql = 'UPDATE content SET categoryId = ?, contentName = ?, filePath = ?, imagePath = ?, uploadTime = ?, description = ?, remarks = ?, status = ? WHERE contentId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($content->categoryId);
		$sqlQuery->set($content->contentName);
		$sqlQuery->set($content->filePath);
		$sqlQuery->set($content->imagePath);
		$sqlQuery->set($content->uploadTime);
		$sqlQuery->set($content->description);
		$sqlQuery->set($content->remarks);
		$sqlQuery->set($content->status);

		$sqlQuery->setNumber($content->contentId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM content';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoryId($value){
		$sql = 'SELECT * FROM content WHERE categoryId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByContentName($value){
		$sql = 'SELECT * FROM content WHERE contentName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFilePath($value){
		$sql = 'SELECT * FROM content WHERE filePath = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImagePath($value){
		$sql = 'SELECT * FROM content WHERE imagePath = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUploadTime($value){
		$sql = 'SELECT * FROM content WHERE uploadTime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescription($value){
		$sql = 'SELECT * FROM content WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRemarks($value){
		$sql = 'SELECT * FROM content WHERE remarks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM content WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoryId($value){
		$sql = 'DELETE FROM content WHERE categoryId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByContentName($value){
		$sql = 'DELETE FROM content WHERE contentName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFilePath($value){
		$sql = 'DELETE FROM content WHERE filePath = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImagePath($value){
		$sql = 'DELETE FROM content WHERE imagePath = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUploadTime($value){
		$sql = 'DELETE FROM content WHERE uploadTime = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescription($value){
		$sql = 'DELETE FROM content WHERE description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRemarks($value){
		$sql = 'DELETE FROM content WHERE remarks = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM content WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ContentMySql 
	 */
	protected function readRow($row){
		$content = new Content();
		
		$content->contentId = $row['contentId'];
		$content->categoryId = $row['categoryId'];
		$content->contentName = $row['contentName'];
		$content->filePath = $row['filePath'];
		$content->imagePath = $row['imagePath'];
		$content->uploadTime = $row['uploadTime'];
		$content->description = $row['description'];
		$content->remarks = $row['remarks'];
		$content->status = $row['status'];

		return $content;
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
	 * @return ContentMySql 
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