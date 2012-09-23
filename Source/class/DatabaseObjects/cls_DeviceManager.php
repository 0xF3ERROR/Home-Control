<?php


class DeviceManager extends SystemManager 
{	
	public function __construct()
	{
		parent::__construct();
		//$this->MySql =  MySqldb::getInstance();
	}
	
	public function insert( $s_Name, $s_Typ, $s_Version, $s_IP, $i_Port, $b_Status )
	{
		$Sql="INSERT INTO `tbl_devices` (`s_Name`, `s_Typ`, `s_Version`, `s_IP`,  `i_Port`, `b_Status`) 
		VALUES 
		(
		'".$s_Name."',
		'".$s_Typ."',
		'".$s_Version."',
		'".$s_IP."',
		'".$i_Port."',
		'".$b_Status."'
		)";
		//var_dump($Sql);
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * Update des Gerätes
	 *
	 * @param int $DeviceId des zu updatenden Gerätes
	 * @return bool 
	 *	 
	 */
	public function updateById($i_ID, $s_Name, $s_Typ, $s_Version, $s_IP, $i_Port, $b_Status )
	{
		$Sql="UPDATE tbl_devices SET `s_Name` = '".$s_Name."', 
			`s_Typ` = '".$s_Typ."', 
			`s_Version` = '".$s_Version."', 
			`s_IP` = '".$s_IP."', 
			`i_Port` = '".$i_Port."', 
			`b_Status` = '".$b_Status."' 
			WHERE `i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
		
	/**
	 * entfernt das Gerätes aus der Datenbank
	 *
	 * @param int $i_Id der zu löschende Gerätes
	 * @return bool 
	 *
	 */
	public function deleteById($i_ID)
	{
		$Sql="DELETE FROM `tbl_devices` WHERE `tbl_devices`.`i_ID` = ".$i_ID." LIMIT 1 ;";
		return $this->MySql->executeNoneQuery($Sql);
	}
	
	/**
	 * Änedert den Status des Gerätes
	 *
	 * @param Update int $b_Status int $ID
	 * @return bool 
	 *
	 */
	public function updateStatusById($i_ID,$b_Status)
	{
	   	$Sql="update tbl_devices set b_Status='".$b_Status."'
		where i_ID='".$i_ID."'";
		return  $this->MySql->executeNoneQuery($Sql);
	}
}


?>