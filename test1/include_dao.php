<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/AdminusersDAO.class.php');
	require_once('class/dto/Adminuser.class.php');
	require_once('class/mysql/AdminusersMySqlDAO.class.php');
	require_once('class/mysql/ext/AdminusersMySqlExtDAO.class.php');
	require_once('class/dao/CategoriesDAO.class.php');
	require_once('class/dto/Categorie.class.php');
	require_once('class/mysql/CategoriesMySqlDAO.class.php');
	require_once('class/mysql/ext/CategoriesMySqlExtDAO.class.php');
	require_once('class/dao/ContentDAO.class.php');
	require_once('class/dto/Content.class.php');
	require_once('class/mysql/ContentMySqlDAO.class.php');
	require_once('class/mysql/ext/ContentMySqlExtDAO.class.php');

?>