<?php


class ContentGroupManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
	
	
	/**
	 * insertMenueGroupAndMeneuId Position = 0
	 *
	 * @param string $s_Name, int $Menue_ID
	 * @return bool 
	 *	 
	 */
	public function insertContentGroup( $s_Name, $Position=0 ) // select i_ID, s_Name, i_Menue_ID, i_Position from tbl_menuegroups
	{
		$Sql="INSERT INTO `tbl_contentgroups` (`s_Name`, `i_Position`) 
		VALUES 
		(
		'".$s_Name."',
		'".$Position."'
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
	 */
	public function updateById($i_ID, $s_Name, $Position )
	{
		$Sql="UPDATE tbl_contentgroups SET `s_Name` = '".$s_Name."', `i_Position` = '".$Position."'
			WHERE `tbl_contentgroups.i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update  
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateNameById($i_ID, $s_Name )
	{
		$Sql="UPDATE tbl_contentgroups SET `s_Name` = '".$s_Name."'
			WHERE `tbl_contentgroups.i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update  
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updatePositionById($i_ID, $Position )
	{
		$Sql="UPDATE tbl_contentgroups SET `i_Position` = '".$Position."'
			WHERE `tbl_contentgroups.i_ID` = ".$i_ID." LIMIT 1 ;";
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
		$Sql="DELETE FROM `tbl_contentgroups` WHERE `tbl_contentgroups`.`i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

}


?>