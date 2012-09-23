<?php

class DeviceCollection extends Collection 
{
	public function add(Device $Element)
	{
		if(isset($Element))
		{
			$this->Elements[]=$Element;
		}
	}
	
	/**
	 * sucht nach der ID
	 *
	 * @param int $Id
	 * @return Devce
	 */
	public function getById($Id)
	{
		foreach ($this->Elements as $Element)
		{
			if($Element->getId()==$Id)
			{
				return $Element;
			}
		}
		return Device::getEmptyInstance();
	}
	
	
	public function getByIndex($Index)
		{
		if (!isset($this->Elements[$Index]) || $this->countElements() <  0)
			{
			return Device::getEmptyInstance();
			}		
		return $this->Elements[$Index];		
		}	
		
	public function getAll()
		{
		if (!isset($this->Elements) || $this->countElements() <  0)
			{
			return Device::getEmptyInstance();
			}		
		return $this->Elements;			
		}
	
}


?>