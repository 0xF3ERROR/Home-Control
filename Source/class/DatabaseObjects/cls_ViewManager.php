<?php


class ViewManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
	
	public function insert( $s_Name, $s_Script )
	{
		$Sql="INSERT INTO `tbl_view` (`s_Name`, `s_Script`) 
		VALUES 
		(
		'".$s_Name."',
		'".$s_Script."'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update des Gerätes
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateById($i_ID, $s_Name )
	{
		$Sql="UPDATE tbl_view SET `s_Name` = '".$s_Name."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * entfernt das Gerätes aus der Datenbank
	 *
	 * @param int $i_Id der zu löschende Gerätes
	 * @return bool 
	 *
	 */
	public function deleteById($i_ID)
	{
		$Sql="DELETE FROM `tbl_view` WHERE `tbl_groups`.`i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

}


?>