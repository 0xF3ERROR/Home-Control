<?php
class CommandFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return UserCollection
	 */
	private function doLoad($RecordSet)
	{
		$CommandCollection = new CommandCollection();
		foreach ($RecordSet as $Row)
		{										// i_ID, s_Name, s_Data, s_Execute, i_Device_ID, i_Right_ID
			$CommandCollection->add(new Command($Row['i_ID'],$Row['s_Name'],$Row['s_Data'],$Row['s_Execute'],$Row['i_Device_ID']));
		}
		return $CommandCollection;
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
		$Sql="select i_ID, s_Name, s_Data, s_Execute, i_Device_ID from tbl_commands ORDER BY s_Name";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}
	
	/**
	 * findet die angegebene Inhalt per ID
	 *
	 * @param int $Id die id der zu suchenden gruppe
	 * @return gruppe This is the return value description
	 *
	 */
	public function findAllByDeviceId($ID)
	{
		$Sql="select i_ID, s_Name, s_Data, s_Execute, i_Device_ID from tbl_commands
		where s_Device_ID='".$ID."'";
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
		$Sql="select i_ID, s_Name, s_Data, s_Execute, i_Device_ID from tbl_commands
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
		$Sql="select i_ID, s_Name, s_Data, s_Execute, i_Device_ID from tbl_commands
		where s_Name='".$Name."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
	
	
}
?>