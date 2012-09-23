<?php

class ContentCollection extends Collection 
{
	public function add(Content $Element)
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
	 * @return Content
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
		return Content::getEmptyInstance();
	}
	
	/**
	 * sucht nach der $Position
	 *
	 * @param int $Position
	 * @return Content
	 */
	public function getByPosition($Position)
	{
		foreach ($this->Elements as $Element)
		{
			if($Element->getPosition()==$Position)
			{
				return $Element;
			}
		}
		return Content::getEmptyInstance();
	}
	

	/**
	 * sucht nach der $Position
	 *
	 * @param int $Position
	 * @return Content
	 */
	public function getByCommandIdAndMenueId($MenueId,$CommandId)
	{
		foreach ($this->Elements as $Element)
		{
			if(($Element->getMenue_ID()==$MenueId)&&($Element->getCommand_ID()==$CommandId))
			{
				return $Element;
			}
		}
		return Content::getEmptyInstance();
	}
	
	
	
	public function getByIndex($Index)
		{
		if (!isset($this->Elements[$Index]) || $this->countElements() <  0)
			{
			return Content::getEmptyInstance();
			}		
		return $this->Elements[$Index];		
		}	
		
		
		
	public function getAll()
		{
		if (!isset($this->Elements) || $this->countElements() <  0)
			{
			return Content::getEmptyInstance();
			}		
		return $this->Elements;			
		}
	
}


?>