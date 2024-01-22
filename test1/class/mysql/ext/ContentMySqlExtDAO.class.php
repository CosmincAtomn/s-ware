<?php
/**
 * Class that operate on table 'content'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2024-01-10 08:01
 */
class ContentMySqlExtDAO extends ContentMySqlDAO{

	public function queryByCategoryContentName($cat,$value){
        $sql="SELECT * from content WHERE categoryId = $cat AND contentName like '%$value%'";
        $sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
    }

    public function queryByText($value){
		$sql = "SELECT * FROM content WHERE contentName like '%$value%'";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
}
?>