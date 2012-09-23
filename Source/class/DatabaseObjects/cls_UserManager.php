<?php


class UserManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}


	public function updateUserPass($Pass,$UserID)
	{
		$Sql="UPDATE tbl_users SET `s_Pass` = '".$Pass."' WHERE `i_Id` =".$UserID." LIMIT 1";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}

	
	public function insertUser(User $User)
	{
		$Sql="INSERT INTO `tbl_users` (`s_Name`, `s_Pass`, `s_Userid`, `i_Userlevel`, `s_Email`, `i_Login`,  `i_Refresh`, `b_Looked`, `d_RegisterDate`, `b_Premium`) 
		VALUES 
		(
		'".$User->getName()."',
		 '".$User->getPass()."',
		 '0',
		 '0',
		 '".$User->getMail()."',
		 '0',
		 '0',
		 '0',
		 now(),
		 '0'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	public function insertNewUser($s_Name, $s_Pass, $s_Email)
	{
		$Sql="INSERT INTO `tbl_users` (`s_Name`, `s_Pass`, `s_Userid`, `i_Userlevel`, `s_Email`, `i_Login`,  `i_Refresh`, `b_Looked`, `d_RegisterDate`, `b_Premium`) 
		VALUES 
		(
		 '".$s_Name."',
		 '".$s_Pass."',
		 '0',
		 '0',
		 '".$s_Email."',
		 '0',
		 '0',
		 '0',
		 now(),
		 '0'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	


	
	public function updateLoginTime($UserId)
	{
		$Sql="UPDATE `tbl_users` SET `i_Login` = '".time()."' WHERE `i_Id` =".$UserId." LIMIT 1 ;";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	
	public function updateUserNameByID($UserId, $UserName)
	{
		$Sql="UPDATE `tbl_users` SET `s_Name` = '".$UserName."' WHERE `i_Id` =".$UserId." LIMIT 1 ;";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	
	public function updateUserEmailByID($UserId, $UserEmail)
	{
		$Sql="UPDATE `tbl_users` SET `s_Email` = '".$UserEmail."' WHERE `i_Id` =".$UserId." LIMIT 1 ;";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	

	
	public function settLoginTimeNULL($UserId)
	{
		$Sql="UPDATE `tbl_users` SET `i_Login` = '0'  WHERE `i_Id` =".$UserId." LIMIT 1 ;";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	public function setRefreshTime($UserId)
	{
		$Sql="UPDATE `tbl_users` SET i_Refresh = '".microtime(true)."' WHERE `i_Id` =".$UserId." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}

		
	/**
	 * entfernt den user aus der DB
	 *
	 * @param int $UserId der zu löschende User
	 * @return bool 
	 *
	 */
	public function deleteUserById($UserId)
	{
		$Sql="DELETE FROM `tbl_users` WHERE `tbl_users`.`i_ID` = ".$UserId." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
}


?>