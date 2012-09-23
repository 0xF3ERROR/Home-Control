<?php
class UserGroup	implements i_CollectionElement
{
	protected $Id;
	protected $Name;
	
	public function __construct($Id=0,$Name="None")
	{
		$this->Id=$Id;
		$this->Name=$Name;
	}

	public static function getEmptyInstance()
	{
		return new UserGroup(0,"");
	}


	public function getId()
	{
		return $this->Id;
	}
	public function setId($Id)
	{
		$this->Id=$Id;
	}
	
	public function getName()
	{
		return $this->Name;
	}
	public function setName($Name)
	{
		$this->Name=$Name;
	}
	
	

}?>