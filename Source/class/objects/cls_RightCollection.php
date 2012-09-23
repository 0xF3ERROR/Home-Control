<?php

class RightCollection extends Collection 
{
	public function add(Right $Element)
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
		return Right::getEmptyInstance();
	}
	
	
	
	/**
	 * sucht nach der ID
	 *
	 * @param int $Id
	 * @return Devce
	 */
	public function getByUserGroupId($UserGroupID)
	{
		foreach ($this->Elements as $Element)
		{
			if($Element->getUserGroupID()==$UserGroupID)
			{
				return $Element;
			}
		}
		return Right::getEmptyInstance();
	}
	
	
	/**
	 * sucht nach der ID
	 *
	 * @param int $Id
	 * @return Devce
	 */
	public function getByIdAndUserGroupId($ID,$UserGroupID)
	{
		foreach ($this->Elements as $Element)
		{
			if( ($Element->getId()==$Id) && ($Element->getUserGroupID()==$UserGroupID) )
			{
				return $Element;
			}
		}
		return Right::getEmptyInstance();
	}
	
	
	
	/**
	 * sucht nach der ID
	 *
	 * @param int $Id
	 * @return Devce
	 */
	public function getByUserGroupIdAndCommandId($UserGroupID,$CommandId)
	{
		foreach ($this->Elements as $Element)
		{
			if( ($Element->getUserGroupID()==$UserGroupID) && ($Element->getCommandId()==$CommandId) )
			{
				return $Element;
			}
		}
		return Right::getEmptyInstance();
	}
	
	
	
	
	public function getByIndex($Index)
		{
		if (!isset($this->Elements[$Index]) || $this->countElements() <  0)
			{
			return Right::getEmptyInstance();
			}		
		return $this->Elements[$Index];		
		}	
		
		
		
	public function getAll()
		{
		if (!isset($this->Elements) || $this->countElements() <  0)
			{
			return Right::getEmptyInstance();
			}		
		return $this->Elements;			
		}
	
}


?>