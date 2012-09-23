<?php

class UserFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return UserCollection
	 */
	private function doLoad($RecordSet)
	{
		$UserCollection = new UserCollection();
		foreach ($RecordSet as $Row)
		{
			$UserCollection->add(new User($Row['i_Id'],$Row['s_Name'],$Row['s_Pass'],$Row['s_Email'],$Row['i_Login'],$Row['i_Refresh'],$Row['b_Looked'],$Row['d_RegisterDate'],$Row['b_Premium'],$Row['i_SpaceMax'],$Row['s_Folder']));
		}
		return $UserCollection;
	}
	
	/**
	 * findet den angegebene user
	 *
	 * @param int $Id die id des zu suchenden users
	 * @return User This is the return value description
	 *
	 */
	public function findById($Id)
	{
		$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id  ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder
		 from tbl_user
		where i_Id='".$Id."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * findet den angegeben user anhand seines namen
	 *
	 * @param string $Name der name des users
	 * @return User This is the return value description
	 *
	 */
	public function findByName($Name)
	{
		$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id  ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder from tbl_user
		where s_Name='".$Name."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	
	public function findByMail($Mail)
	{
		$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id  ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder from tbl_user
		where s_Email='".$Mail."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	

	
	/**
	 * sucht in der user tabelle nach dem angegeben user
	 *
	 * @param string $Name der name des Users
	 * @param string $Pass das md5 gehashte passwort des benutzers
	 * @return User kann ein null user sein
	 *
	 */
	public function findByNameAndPass($Name, $Pass)
	{
		$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder from tbl_user
		where s_Name='".$Name."'
		and s_Pass='".$Pass."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
		
	}
	
}


?>