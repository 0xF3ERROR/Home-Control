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
			$UserCollection->add(new User($Row['i_ID'],$Row['s_Name'],$Row['s_Pass'],$Row['s_Userid'],$Row['i_Userlevel'],$Row['s_Email'],$Row['i_Login'],$Row['i_Refresh'],$Row['b_Looked'],$Row['d_RegisterDate'],$Row['b_Premium']));
		}
		return $UserCollection;
	}
	
	
/*
	private function doLoad($RecordSet)
	{
		$UserCollection = new UserCollection();
		foreach ($RecordSet as $Row)
		{
			$UserCollection->add($this->load($Row));
		}
		return $UserCollection;
	}
	
	protected  function load($Row)
	{
		return new User(new User($Row['i_Id'],$Row['s_Name'],$Row['s_Pass'],$Row['s_Userid'],$Row['i_Userlevel'],$Row['s_Email'],$Row['i_Login'],$Row['i_Refresh'],$Row['b_Looked'],$Row['d_RegisterDate'],$Row['b_Premium']));
		
	}
*/	
	
	
	
	
	
	
	
	
	
	/**
	 * findet den angegebene user
	 *
	 * @param int $Id die id des zu suchenden users
	 * @return User This is the return value description
	 *
	 */
	public function findById($Id)
	{
		//$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id  ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder
		$Sql="select i_ID, s_Name, s_Pass, s_Userid, i_Userlevel, s_Email, i_Login, i_Refresh, b_Looked, d_RegisterDate, b_Premium from tbl_users
		where i_ID='".$Id."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}	
	
	
	/**
	 * findAll
	 *
	 * @param int $Id die id des zu suchenden users
	 * @return User This is the return value description
	 *
	 */
	public function findAll()
	{
		//$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id  ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder
		$Sql="select i_ID, s_Name, s_Pass, s_Userid, i_Userlevel, s_Email, i_Login, i_Refresh, b_Looked, d_RegisterDate, b_Premium from tbl_users order by i_ID";
		return $this->doLoad($this->MySql->executeQuery($Sql));
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
		//$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id  ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder from tbl_user
		$Sql="select i_ID, s_Name, s_Pass, s_Userid, i_Userlevel, s_Email, i_Login, i_Refresh, b_Looked, d_RegisterDate, b_Premium  from tbl_users
		where s_Name='".$Name."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	
	public function findByMail($Mail)
	{
		//$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id  ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder from tbl_user
		$Sql="select i_ID, s_Name, s_Pass, s_Userid, i_Userlevel, s_Email, i_Login, i_Refresh, b_Looked, d_RegisterDate, b_Premium  from tbl_users
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
		/* TODO: Salt für Login !!! */
		//$Sql="select s_Name,s_Email,s_Pass,i_Login,i_Id ,i_Refresh ,b_Looked,d_RegisterDate ,b_Premium,i_SpaceMax,s_Folder from tbl_user	
		$Sql="select i_ID, s_Name, s_Pass, s_Userid, i_Userlevel, s_Email, i_Login, i_Refresh, b_Looked, d_RegisterDate, b_Premium  from tbl_users
		where s_Name='".$Name."'
		and s_Pass='".$Pass."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
		
	}
	
}


?>