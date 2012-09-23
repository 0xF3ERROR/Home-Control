<?php


class HomeManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}



	
	
	
	public function insertSoundFile($Path,User $User)
	{
		//$Temp=explode("/",$Path);

		$Sql="INSERT INTO `tbl_music` (
		`i_Id` ,
		`i_UserId` ,
		`s_Path` ,
		`s_Name` 
		)
		VALUES (
		NULL , '".$User->getId()."', '".$Path."', '".$Temp[count($Temp)-1]."'
		);";
		return $this->MySql->executeNoneQuery($Sql);

	}
	
	
	public function deleteSoundFile($Path,User $User)
	{
		//$Temp=explode("/",$Path);

		$Sql="DELETE FROM `tbl_music` WHERE  i_UserId=".$User->getId()." and`s_Path` ='".$Path."'";
		return $this->MySql->executeNoneQuery($Sql);

	}

}


?>