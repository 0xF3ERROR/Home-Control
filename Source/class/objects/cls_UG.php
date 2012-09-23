<?php
class UG	implements i_CollectionElement
{
	protected $Id;
	protected $UserID;
	protected $GroupID;
	
	public function __construct($Id=0,$UserID=0,$GroupID=0)
	{
		$this->Id=$Id;
		$this->UserID=$UserID;
		$this->GroupID=$GroupID;
	}

	public static function getEmptyInstance()
	{
		return new UG(0,0,0);
	}


	public function getId()
	{
		return $this->Id;
	}
	public function setId($Id)
	{
		$this->Id=$Id;
	}
	
	public function getUserID()
	{
		return $this->UserID;
	}
	public function setUserID($UserID)
	{
		$this->UserID=$UserID;
	}
	
	public function getGroupID()
	{
		return $this->GroupID;
	}
	public function setGroupID($GroupID)
	{
		$this->GroupID=$GroupID;
	}
	
	

}?>