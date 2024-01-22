<?php
/**
 * Class that operate on table 'adminusers'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2024-01-10 08:01
 */
class AdminusersMySqlDAO implements AdminusersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AdminusersMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM adminusers WHERE adminId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM adminusers';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM adminusers ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param adminuser primary key
 	 */
	public function delete($adminId){
		$sql = 'DELETE FROM adminusers WHERE adminId = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($adminId);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AdminusersMySql adminuser
 	 */
	public function insert($adminuser){
		$sql = 'INSERT INTO adminusers (adminName, fname, lname, password, time, role, status) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($adminuser->adminName);
		$sqlQuery->set($adminuser->fname);
		$sqlQuery->set($adminuser->lname);
		$sqlQuery->set($adminuser->password);
		$sqlQuery->set($adminuser->time);
		$sqlQuery->set($adminuser->role);
		$sqlQuery->set($adminuser->status);

		$id = $this->executeInsert($sqlQuery);	
		$adminuser->adminId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AdminusersMySql adminuser
 	 */
	public function update($adminuser){
		$sql = 'UPDATE adminusers SET adminName = ?, fname = ?, lname = ?, password = ?, time = ?, role = ?, status = ? WHERE adminId = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($adminuser->adminName);
		$sqlQuery->set($adminuser->fname);
		$sqlQuery->set($adminuser->lname);
		$sqlQuery->set($adminuser->password);
		$sqlQuery->set($adminuser->time);
		$sqlQuery->set($adminuser->role);
		$sqlQuery->set($adminuser->status);

		$sqlQuery->setNumber($adminuser->adminId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM adminusers';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAdminName($value){
		$sql = 'SELECT * FROM adminusers WHERE adminName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFname($value){
		$sql = 'SELECT * FROM adminusers WHERE fname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLname($value){
		$sql = 'SELECT * FROM adminusers WHERE lname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value){
		$sql = 'SELECT * FROM adminusers WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTime($value){
		$sql = 'SELECT * FROM adminusers WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRole($value){
		$sql = 'SELECT * FROM adminusers WHERE role = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM adminusers WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAdminName($value){
		$sql = 'DELETE FROM adminusers WHERE adminName = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFname($value){
		$sql = 'DELETE FROM adminusers WHERE fname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLname($value){
		$sql = 'DELETE FROM adminusers WHERE lname = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM adminusers WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTime($value){
		$sql = 'DELETE FROM adminusers WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRole($value){
		$sql = 'DELETE FROM adminusers WHERE role = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM adminusers WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AdminusersMySql 
	 */
	protected function readRow($row){
		$adminuser = new Adminuser();
		
		$adminuser->adminId = $row['adminId'];
		$adminuser->adminName = $row['adminName'];
		$adminuser->fname = $row['fname'];
		$adminuser->lname = $row['lname'];
		$adminuser->password = $row['password'];
		$adminuser->time = $row['time'];
		$adminuser->role = $row['role'];
		$adminuser->status = $row['status'];

		return $adminuser;
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
	 * @return AdminusersMySql 
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