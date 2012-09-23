<?php
class CommandManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
		// i_ID, s_Name, s_Data, s_Execute, i_Device_ID, i_Right_ID
	
	public function insertMenueLinkByMenueIdAndLinkId($s_Name, $s_Data, $s_Execute, $i_Device_ID )
	{
		$Sql="INSERT INTO `tbl_commands` (`s_Name`, `s_Data`, `s_Execute`, `i_Device_ID`) 
		VALUES 
		(
		'".$s_Name."',
		'".$s_Data."',
		'".$s_Execute."',
		'".$i_Device_ID."'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);		
	}
	
	
	
	
	
	/**
	 * Update 
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	
	public function updateById($i_ID, $s_Name )
	{
		$Sql="UPDATE tbl_contents SET `s_Name` = '".$s_Name."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		 
	 */
	
	
	
	
	/**
	 * entfernt den Inhalt aus der Datenbank
	 *
	 * @param int $i_Id der zu 
	 * @return bool 
	 *
	 */
	public function deleteById($i_ID)
	{
		$Sql="DELETE FROM `tbl_commands` WHERE `tbl_commands`.`i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		

}
?>