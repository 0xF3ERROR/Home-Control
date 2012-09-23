<?php

class UserGroupFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return UserCollection
	 */
	private function doLoad($RecordSet)
	{
		$UserGroupCollection = new UserGroupCollection();
		foreach ($RecordSet as $Row)
		{
			$UserGroupCollection->add(new UserGroup($Row['i_ID'],$Row['s_Name']));
		}
		return $UserGroupCollection;
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
		$Sql="select i_ID, s_Name from tbl_usergroups";
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
		$Sql="select i_ID, s_Name from tbl_usergroups
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
		$Sql="select i_ID, s_Name from tbl_usergroups
		where s_Name='".$Name."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	
	
}


?>