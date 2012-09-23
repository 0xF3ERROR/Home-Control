<?php

class MenueFinder extends SystemFinder 
{
	
	/**
	 * Enter description here...
	 *
	 * @param array $RecordSet
	 * @return MenueCollection
	 */
	private function doLoad($RecordSet)
	{
		$MenueCollection = new MenueCollection();
		foreach ($RecordSet as $Row)
		{
			$MenueCollection->add(new Menue($Row['i_ID'],$Row['s_Name'],$Row['i_Position']));
		}
		return $MenueCollection;
	}
	
	/**
	 * findet alle Menue
	 *
	 * @param 
	 * @return Menue This is the return value description
	 *
	 */
	public function findAll()
	{
		$Sql="select i_ID, s_Name, i_Position from tbl_menues";
		return $this->doLoad($this->MySql->executeQuery($Sql));
	}

	/**
	 * findet das Menü
	 *
	 * @param int $Id die id des zu suchenden Men�s
	 * @return Home This is the return value description
	 *
	 */
	public function findById($Id=1)
	{	
		$Sql="select i_ID,s_Name,i_Position
		 from tbl_menues
		where i_ID='".$Id."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}

	/**
	 * findet das Menü
	 *
	 * @param int $Id die id des zu suchenden Men�s
	 * @return Home This is the return value description
	 *
	 */
	public function findByName($Name="")
	{	
		$Sql="select i_ID,s_Name,i_Position
		 from tbl_menues
		where s_Name='".$Name."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}

	/**
	 * findet das Menü
	 *
	 * @param int $Id die id des zu suchenden Men�s
	 * @return Home This is the return value description
	 *
	 */
	public function findByPosition($Position=0)
	{	
		$Sql="select i_ID,s_Name,i_Position
		 from tbl_menues
		where i_Position='".$Position."'";
		return $this->doLoad($this->MySql->executeQuery($Sql))->getByIndex(0);
	}
		
}


?>