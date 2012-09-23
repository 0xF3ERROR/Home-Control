<?php

class ContentGroupFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return UserCollection
	 */
	private function doLoad($RecordSet)
	{
		$ContentGroupCollection = new ContentGroupCollection();
		foreach ($RecordSet as $Row)
		{
			$ContentGroupCollection->add(new ContentGroup($Row['i_ID'],$Row['s_Name'],$Row['i_Position']));
		}
		return $ContentGroupCollection;
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
		$Sql="select i_ID, s_Name, i_Position from tbl_contentgroups ORDER BY s_Name";
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
		$Sql="select i_ID, s_Name, i_Position from tbl_contentgroups
		where i_ID='".$ID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * findet Gruppen ID mit dem Namen
	 *
	 * @param string $Name der name der Gruppe
	 * @return ID, This is the return value description
	 *
	 */
	public function findByName($Name)
	{
		$Sql="select i_ID, s_Name, i_Position from tbl_contentgroups
		where s_Name='".$Name."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * findet Gruppen ID mit dem Namen
	 *
	 * @param string $Name der name der Gruppe
	 * @return ID, This is the return value description
	 *
	 */
	public function findByPosition($Position)
	{
		$Sql="select i_ID, s_Name, i_Position from tbl_contentgroups
		where i_Position='".$Position."';";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}
	

	/**
	 * findet Gruppen ID mit dem Namen
	 *
	 * @param string $Name der name der Gruppe
	 * @return ID, This is the return value description
	 *
	 */
	public function findByNameAndPosition($ContentGroupName,$Position)
	{
		$Sql="select i_ID, s_Name, i_Position from tbl_contentgroups
		where s_Name='".$ContentGroupName."' AND i_Position='".$MenueID."';";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}
	
	
}


?>