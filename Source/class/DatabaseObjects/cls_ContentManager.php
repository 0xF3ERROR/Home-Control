<?php


class ContentManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
		// i_ID, i_Menue_ID, i_Command_ID, s_Name, i_Option_ID, i_Group_ID
	public function insert( $s_Name )
	{
		$Sql="INSERT INTO `tbl_content` (`s_Name`) 
		VALUES 
		(
		'".$s_Name."'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	
	public function insertMenueLinkByMenueIdAndLinkedMenueIdInName($MenueID, $LinkedMenueID )
	{//SELECT i_ID, i_Menue_ID, i_Command_ID, s_Name, i_Option_ID, i_Group_ID FROM tbl_contents WHERE i_Menue_ID = 0 AND i_Option_ID = 0
		$Sql="INSERT INTO `tbl_content` ( `s_Name`, `i_Position`, `i_Menue_ID`, `i_ContentGroup_ID`, `i_View_ID`, `i_Command_ID` ) 
		VALUES 
		(
		'".$LinkedMenueID."',
		 '0',		
		'".$MenueID."',
		 '0',
		 '0',
		 '0'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);		
	}
	
	public function insertMenueLinkByMenueIdAndNameAsMenueID($MenueID, $NameAsMenueID )
	{//SELECT i_ID, i_Menue_ID, i_Command_ID, s_Name, i_Option_ID, i_Group_ID FROM tbl_contents WHERE i_Menue_ID = 0 AND i_Option_ID = 0
		$Sql="INSERT INTO `tbl_content` ( `s_Name`, `i_Position`, `i_Menue_ID`, `i_ContentGroup_ID`, `i_View_ID`, `i_Command_ID` ) 
		VALUES 
		(
		'".$MenueID."',
		 '0',
		 '".$NameAsMenueID."',
		 '0',
		 '0',
		 '0'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);		
	}
	
	
	public function insertMenueCommandByMenueIdAndCommandId($MenueID, $CommandID, $Name, $ViewID, $ContentGroupID, $Position=0)
	{//SELECT i_ID, i_Menue_ID, i_Command_ID, s_Name, i_Option_ID, i_Group_ID FROM tbl_contents WHERE i_Menue_ID = 0 AND i_Option_ID = 0
		$Sql="INSERT INTO `tbl_content` ( `s_Name`, `i_Position`, `i_Menue_ID`, `i_ContentGroup_ID`, `i_View_ID`, `i_Command_ID` ) 
		VALUES 
		(
		 '".$Name."',
		 '".$Position."',
		 '".$MenueID."',
		 '".$ContentGroupID."',
		 '".$ViewID."',
		 '".$CommandID."'
		);";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
		
	}
	
	/**
	 * Update Content
	 *
	 * @param int $s_Name des zu updatenden Content
	 * @return bool 
	 *	 
	 */
	public function updateById($i_ID, $s_Name )
	{
		$Sql="UPDATE tbl_content SET `s_Name` = '".$s_Name."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	/**
	 * Update Content Position
	 *
	 * @param int $s_Name des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updatePositionById($i_ID, $i_Position )
	{
		$Sql="UPDATE tbl_content SET `i_Position` = '".$i_Position."'
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * entfernt den Inhalt aus der Datenbank
	 *
	 * @param int $i_Id der zu 
	 * @return bool 
	 *
	 */
	public function deleteById($i_ID)
	{
		$Sql="DELETE FROM `tbl_content` WHERE `tbl_content`.`i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * entfernt den Inhalt aus der Datenbank
	 *
	 * @param int $i_Id der zu 
	 * @return bool 
	 *
	 */
	public function deleteByIdAndMenueID($i_ID,$i_Menue_ID)
	{
		$Sql="DELETE FROM `tbl_content` WHERE `tbl_content`.`i_ID` = ".$i_ID." AND `tbl_content`.`i_Menue_ID` = ".$i_Menue_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * deleteByMenueId
	 *
	 * @param int $i_Id der zu löschende Gerätes
	 * @return bool 
	 *
	 */
	public function deleteByMenueId($i_ID)
	{// DELETE FROM `tbl_contents` WHERE  `i_ID`=99 LIMIT 1;
		$Sql="DELETE FROM `tbl_content` WHERE `tbl_content`.`i_Menue_ID` = ".$i_ID." ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

}


?>