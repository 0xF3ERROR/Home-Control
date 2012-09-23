<?php

class MenueCollection extends Collection 
{
	public function add(Menue $Element)
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
	 * @return Menu
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
		return Menue::getEmptyInstance();
	}
	
	
	public function getByIndex($Index)
	{
		if (!isset($this->Elements[$Index]) || $this->countElements() <  0)
		{
			return Menue::getEmptyInstance();
		}
		
		return $this->Elements[$Index];
		
		
	}
		
	public function getAll()
		{
		if (!isset($this->Elements) || $this->countElements() <  0)
			{
			return Menue::getEmptyInstance();
			}		
		return $this->Elements;			
		}
	
}


?>