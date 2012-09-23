<?php
class RightFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return UserCollection
	 */
	private function doLoad($RecordSet)
	{
		$RightCollection = new RightCollection();
		foreach ($RecordSet as $Row)
		{
			$RightCollection->add(new Right($Row['i_ID'],$Row['i_Usergroup_ID'],$Row['i_Command_ID'],$Row['b_Read'],$Row['b_Write']));
		}
		return $RightCollection;
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
		$Sql="select i_ID, i_Usergroup_ID, i_Command_ID, b_Read, b_Write from tbl_rights";
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
		$Sql="select i_ID, i_Usergroup_ID, i_Command_ID, b_Read, b_Write from tbl_rights
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
	public function findByUserGroupId($UserGroupID)
	{
		$Sql="select i_ID, i_Usergroup_ID, i_Command_ID, b_Read, b_Write from tbl_rights
		where i_Usergroup_ID='".$UserGroupID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}
	
	
}
?>