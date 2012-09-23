<?php
class MenueManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
	
	
	public function insert(Menue $Menue)
	{
		$Sql="INSERT INTO `tbl_menues` (`s_Name`, `i_Position`) 
		VALUES 
		(
		'".$Menue->getName()."',
		 '0'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);		
	}
	
	
	/**
	 * Update des Menünamen
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateNameById($i_ID, $s_Name )
	{
		$Sql="UPDATE tbl_menues SET `s_Name` = '".$s_Name."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

	
	/**
	 * Update des Menünamen
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updatePositionById($i_ID, $Position )
	{
		$Sql="UPDATE tbl_menues SET `i_Position` = '".$Position."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

		
	/**
	 * entfernt den user aus der DB
	 *
	 * @param int $UserId der zu löschende User
	 * @return bool 
	 *
	 */
	public function deleteById($MenueId)
	{
		$Sql="DELETE FROM `tbl_menues` WHERE `tbl_menues`.`i_ID` = ".$MenueId." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
}
?>