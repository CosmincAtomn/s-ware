<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2024-01-10 08:01
 */
interface ContentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Content 
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
 	 * @param content primary key
 	 */
	public function delete($contentId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Content content
 	 */
	public function insert($content);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Content content
 	 */
	public function update($content);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCategoryId($value);

	public function queryByContentName($value);

	public function queryByFilePath($value);

	public function queryByImagePath($value);

	public function queryByUploadTime($value);

	public function queryByDescription($value);

	public function queryByRemarks($value);

	public function queryByStatus($value);


	public function deleteByCategoryId($value);

	public function deleteByContentName($value);

	public function deleteByFilePath($value);

	public function deleteByImagePath($value);

	public function deleteByUploadTime($value);

	public function deleteByDescription($value);

	public function deleteByRemarks($value);

	public function deleteByStatus($value);


}
?>