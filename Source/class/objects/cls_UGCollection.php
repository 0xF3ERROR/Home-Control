<?php

class UGCollection extends Collection 
{
	public function add(UG $Element)
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
		return UG::getEmptyInstance();
	}
	
	
	
	/**
	 * sucht nach der ID
	 *
	 * @param int $Id
	 * @return Devce
	 */
	public function getByUserIdAndGroupId($UserID, $GroupID)
	{
		foreach ($this->Elements as $Element)
		{
			if( ($Element->getUserId()==$UserID) && ($Element->getGroupId()==$GroupID) )
			{
				return $Element;
			}
		}
		return UG::getEmptyInstance();
	}
	
	
	
	
	public function getByIndex($Index)
		{
		if (!isset($this->Elements[$Index]) || $this->countElements() <  0)
			{
			return UG::getEmptyInstance();
			}		
		return $this->Elements[$Index];		
		}	
		
		
		
	public function getAll()
		{
		if (!isset($this->Elements) || $this->countElements() <  0)
			{
			return UG::getEmptyInstance();
			}		
		return $this->Elements;			
		}
	
}


?>