<?php


class UGManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
	
	public function insertUserIdAndGroupId(  $i_UserID, $i_GroupID )
	{
		$Sql="INSERT INTO `tbl_ug` (`i_User_ID`,`i_Group_ID`) 
		VALUES 
		(
		'".$i_UserID."',
		'".$i_GroupID."'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	public function insertUserId(  $i_UserID )
	{
		$Sql="INSERT INTO `tbl_ug` (`i_User_ID`,`i_Group_ID`) 
		VALUES 
		(
		'".$i_UserID."',
		'0'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	public function insertGroupId( $i_GroupID )
	{
		$Sql="INSERT INTO `tbl_ug` (`i_User_ID`,`i_Group_ID`) 
		VALUES 
		(
		'".$i_UserID."',
		'0'
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
	public function updateById($i_ID, $i_UserID, $i_GroupID  )
	{
		$Sql="UPDATE tbl_ug SET `i_User_ID` = '".$i_UserID."', `i_Group_ID` = '".$i_GroupID."'
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
		$Sql="DELETE FROM `tbl_ug` WHERE `tbl_ug`.`i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * entfernt das Gerätes aus der Datenbank
	 *
	 * @param int $i_Id der zu löschende Gerätes
	 * @return bool 
	 *
	 */
	public function deleteAllByUserId($i_User_ID)
	{
		$Sql="DELETE FROM `tbl_ug` WHERE `tbl_ug`.`i_User_ID` = ".$i_User_ID." ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

}


?>