<?php

class ContentGroupCollection extends Collection 
{
	public function add(ContentGroup $Element)
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
		return ContentGroup::getEmptyInstance();
	}
		
	/**
	 * sucht nach der ID
	 *
	 * @param int $Id
	 * @return Devce
	 */
	public function getByPosition($ID)
	{
		foreach ($this->Elements as $Element)
		{
			if($Element->getPosition()==$ID)
			{
				return $Element;
			}
		}
		return ContentGroup::getEmptyInstance();
	}
	
	
	public function getByIndex($Index)
		{
		if (!isset($this->Elements[$Index]) || $this->countElements() <  0)
			{
			return ContentGroup::getEmptyInstance();
			}		
		return $this->Elements[$Index];		
		}	
		
		
	public function getAll()
		{
		if (!isset($this->Elements) || $this->countElements() <  0)
			{
			return ContentGroup::getEmptyInstance();
			}		
		return $this->Elements;			
		}
	
}


?>