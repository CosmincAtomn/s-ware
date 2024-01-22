<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AdminusersDAO
	 */
	public static function getAdminusersDAO(){
		return new AdminusersMySqlExtDAO();
	}

	/**
	 * @return CategoriesDAO
	 */
	public static function getCategoriesDAO(){
		return new CategoriesMySqlExtDAO();
	}

	/**
	 * @return ContentDAO
	 */
	public static function getContentDAO(){
		return new ContentMySqlExtDAO();
	}


}
?>