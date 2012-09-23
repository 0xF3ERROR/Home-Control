<?php
class Right	implements i_CollectionElement
{
	protected $Id;
	protected $UserGroupID;
	protected $CommandID;
	protected $Read;
	protected $Write;
	
	public function __construct($Id=0,$UserGroupID=0,$CommandID=0,$Read=0,$Write=0)
	{
		$this->Id=$Id;
		$this->UserGroupID=$UserGroupID;
		$this->CommandID=$CommandID;
		$this->Read=$Read;
		$this->Write=$Write;
	}

	public static function getEmptyInstance()
	{
		return new Right(0,0,0,0,0);
	}


	public function getId()
	{
		return $this->Id;
	}
	public function setId($Id)
	{
		$this->Id=$Id;
	}
	
	public function getUserGroupID()
	{
		return $this->UserGroupID;
	}
	public function setUserGroupID($UserGroupID)
	{
		$this->UserGroupID=$UserGroupID;
	}
	
	public function getCommandID()
	{
		return $this->CommandID;
	}
	public function setCommandID($CommandID)
	{
		$this->CommandID=$CommandID;
	}
	
	public function getRead()
	{
		return $this->Read;
	}
	public function setRead($Read)
	{
		$this->Read=$Read;
	}
	
	public function getWrite()
	{
		return $this->Write;
	}
	public function setWrite($Write)
	{
		$this->Write=$Write;
	}
	
	

}?>