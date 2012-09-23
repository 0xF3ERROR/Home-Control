<?php


class RightManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
	
	public function insertUserGroupId( $i_Usergroup_ID )
	{
		$Sql="INSERT INTO `tbl_rights` (`i_Usergroup_ID`,`b_Read`,`b_Write`) 
		VALUES 
		(
		'".$i_Usergroup_ID."',
		'0',
		'0'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	public function insertAll( $i_Usergroup_ID, $i_Command_ID, $b_Read, $b_Write )
	{
		$Sql="INSERT INTO `tbl_rights` (`i_Usergroup_ID`,`i_Command_ID`,`b_Read`,`b_Write`) 
		VALUES 
		(
		'".$i_Usergroup_ID."',
		'".$i_Command_ID."',
		'".$b_Read."',
		'".$b_Write."'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update des 
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateUserGroupById($i_ID, $i_Usergroup_ID  )
	{
		$Sql="UPDATE tbl_rights SET `i_Usergroup_ID` = '".$i_Usergroup_ID."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update des 
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateReadById($i_ID, $b_Read  )
	{
		$Sql="UPDATE tbl_rights SET `b_Read` = '".$b_Read."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update des 
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateWriteById($i_ID, $b_Write  )
	{
		$Sql="UPDATE tbl_rights SET `b_Write` = '".$b_Write."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update des Gerätes
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateById($i_ID, $i_Usergroup_ID, $i_Command_ID, $b_Read, $b_Write  )
	{
		$Sql="UPDATE tbl_rights SET `i_Usergroup_ID` = '".$i_Usergroup_ID."',`i_Command_ID` = '".$i_Command_ID."', `b_Read` = '".$b_Read."', `b_Write` = '".$b_Write."'
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
		$Sql="DELETE FROM `tbl_rights` WHERE `tbl_rights`.`i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * entfernt das Gerätes aus der Datenbank
	 *
	 * @param int $i_Id der zu löschende Gerätes
	 * @return bool 
	 *
	 */
	public function deleteAllByUserGroupIdAndCommandId($i_Usergroup_ID, $i_Command_ID)
	{
		$Sql="DELETE FROM `tbl_rights` WHERE `tbl_rights`.`i_Usergroup_ID` = ".$i_Usergroup_ID." AND `tbl_rights`.`i_Command_ID` = ".$i_Command_ID."  ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * entfernt das Gerätes aus der Datenbank
	 *
	 * @param int $i_Id der zu löschende Gerätes
	 * @return bool 
	 *
	 */
	public function deleteAllByUserGroupId($i_Usergroup_ID)
	{
		$Sql="DELETE FROM `tbl_rights` WHERE `tbl_rights`.`i_Usergroup_ID` = ".$i_Usergroup_ID."  ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

}


?>