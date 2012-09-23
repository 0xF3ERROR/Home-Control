<?php

class ContentFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return UserCollection
	 */
	private function doLoad($RecordSet)
	{
		$ContentCollection = new ContentCollection();
		foreach ($RecordSet as $Row)
		{										// i_ID, i_Menue_ID, i_Command_ID, s_Name, i_Option_ID, i_Group_ID
			$ContentCollection->add(new Content($Row['i_ID'],$Row['s_Name'],$Row['i_Position'],$Row['i_Menue_ID'],$Row['i_ContentGroup_ID'],$Row['i_View_ID'],$Row['i_Command_ID']));
		}
		return $ContentCollection;
	}
	
	/**
	 * findet alle gruppen
	 *
	 * @param 
	 * @return gruppen This is the return value description
	 *
	 */
	public function findAll()
	{
		$Sql="select i_ID, s_Name, i_Position, i_Menue_ID, i_ContentGroup_ID, i_View_ID, i_Command_ID from tbl_content ORDER BY i_ContentGroup_ID, i_Position ASC";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}
	
	/**
	 * findet die angegebene Inhalt per ID
	 *
	 * @param int $Id die id der zu suchenden gruppe
	 * @return gruppe This is the return value description
	 *
	 */
	public function findAllByMenueId($ID)
	{
		$Sql="select i_ID, s_Name, i_Position, i_Menue_ID, i_ContentGroup_ID, i_View_ID, i_Command_ID from tbl_content
		where i_Menue_ID='".$ID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}	
	
	/**
	 * findet die andren Inhalt ausser mit dieser ID
	 *
	 * @param int $Id die id der zu suchenden gruppe
	 * @return gruppe This is the return value description
	 *
	 */
	public function findAllWithoutMenueId($ID)
	{
		$Sql="select i_ID, s_Name, i_Position, i_Menue_ID, i_ContentGroup_ID, i_View_ID, i_Command_ID from tbl_content
		where i_Menue_ID != '".$ID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}
	
	/**
	 * findet die andren Inhalt ausser mit dieser ID
	 *
	 * @param int $Id die id der zu suchenden gruppe
	 * @return gruppe This is the return value description
	 *
	 */
	public function findByMenueIdAndCommandId($MenueId, $CommandId, $DisplayID)
	{
		$Sql="select i_ID, s_Name, i_Position, i_Menue_ID, i_ContentGroup_ID, i_View_ID, i_Command_ID from tbl_content
		where i_Menue_ID = '".$MenueId."' AND i_Command_ID = '".$CommandId."'AND i_View_ID = '".$DisplayID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}
	
	/**
	 * findet die angegebene gruppe per ID
	 *
	 * @param int $Id die id der zu suchenden gruppe
	 * @return gruppe This is the return value description
	 *
	 */
	public function findById($ID)
	{
		$Sql="select i_ID, s_Name, i_Position, i_Menue_ID, i_ContentGroup_ID, i_View_ID, i_Command_ID from tbl_content
		where i_ID='".$ID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * findet Inhalt ID mit dem Namen
	 *
	 * @param string $Name der name der Gruppe
	 * @return ID, This is the return value description
	 *
	 */
	public function findByName($Name)
	{
		$Sql="select i_ID, s_Name, i_Position, i_Menue_ID, i_ContentGroup_ID, i_View_ID, i_Command_ID from tbl_content
		where s_Name='".$Name."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * findet Inhalt ID mit dem Namen
	 *
	 * @param string $Name der name der Gruppe
	 * @return ID, This is the return value description
	 *
	 */
	public function findByNameAndMenueID($Name, $MenueID)
	{
		$Sql="select i_ID, s_Name, i_Position, i_Menue_ID, i_ContentGroup_ID, i_View_ID, i_Command_ID from tbl_content
		where s_Name='".$Name."' AND i_Menue_ID='".$MenueID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	
	
}


?>