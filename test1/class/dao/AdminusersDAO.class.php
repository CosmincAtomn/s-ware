<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2024-01-10 08:01
 */
interface AdminusersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Adminusers 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param adminuser primary key
 	 */
	public function delete($adminId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Adminusers adminuser
 	 */
	public function insert($adminuser);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Adminusers adminuser
 	 */
	public function update($adminuser);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAdminName($value);

	public function queryByFname($value);

	public function queryByLname($value);

	public function queryByPassword($value);

	public function queryByTime($value);

	public function queryByRole($value);

	public function queryByStatus($value);


	public function deleteByAdminName($value);

	public function deleteByFname($value);

	public function deleteByLname($value);

	public function deleteByPassword($value);

	public function deleteByTime($value);

	public function deleteByRole($value);

	public function deleteByStatus($value);


}
?>