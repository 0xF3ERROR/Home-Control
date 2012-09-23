<?php
class View	implements i_CollectionElement
{
	protected $Id;
	protected $Name;
	protected $Script;
	
	public function __construct($Id=0,$Name="None",$Script="None")
	{
		$this->Id=$Id;
		$this->Name=$Name;
		$this->Script=$Script;
	}

	public static function getEmptyInstance()
	{
		return new View(0,"","");
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
	
	public function getScript()
	{
		return $this->Script;
	}
	public function setScript($Script)
	{
		$this->Script=$Script;
	}
	
	

}?>