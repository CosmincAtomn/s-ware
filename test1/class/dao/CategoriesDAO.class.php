<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2024-01-10 08:01
 */
interface CategoriesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Categories 
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
 	 * @param categorie primary key
 	 */
	public function delete($categoryId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Categories categorie
 	 */
	public function insert($categorie);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Categories categorie
 	 */
	public function update($categorie);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCategoryName($value);

	public function queryByStatus($value);


	public function deleteByCategoryName($value);

	public function deleteByStatus($value);


}
?>