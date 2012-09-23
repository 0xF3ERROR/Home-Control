<?php

class UGFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return UserCollection
	 */
	private function doLoad($RecordSet)
	{
		$UGCollection = new UGCollection();
		foreach ($RecordSet as $Row)
		{
			$UGCollection->add(new UG($Row['i_ID'],$Row['i_User_ID'],$Row['i_Group_ID']));
		}
		return $UGCollection;
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
		$Sql="select i_ID, i_User_ID, i_Group_ID from tbl_ug";
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
		$Sql="select i_ID, i_User_ID, i_Group_ID from tbl_ug
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
	public function findByUserId($UserID)
	{
		$Sql="select  i_ID, i_User_ID, i_Group_ID from tbl_ug
		where i_User_ID='".$UserID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * findet Gruppen ID mit dem Namen
	 *
	 * @param string $Name der name der Gruppe
	 * @return ID, This is the return value description
	 *
	 */
	public function findByGroupId($GroupID)
	{
		$Sql="select  i_ID, i_User_ID, i_Group_ID from tbl_ug
		where i_Group_ID='".$GroupID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * findet Gruppen ID mit dem Namen
	 *
	 * @param string $Name der name der Gruppe
	 * @return ID, This is the return value description
	 *
	 */
	public function findByUserIdAndGroupId($UserID, $GroupID)
	{
		$Sql="select  i_ID, i_User_ID, i_Group_ID from tbl_ug
		where i_User_ID ='".$UserID."' AND  i_Group_ID='".$GroupID."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	
	
}


?>