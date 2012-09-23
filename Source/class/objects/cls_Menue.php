<?php
class Menue	implements i_CollectionElement
{
	
	protected $Id;
	protected $Name;
	protected $Position;
	
	
	public function __construct($Id=1,$Name="None",$Position=0)
	{
		$this->Id=$Id;
		$this->Name=$Name;
		$this->Position=$Position;
	}

	public static function getEmptyInstance()
	{
		return new Menue(0,"",0);
	}
	
	
	public function getId()
	{
		return $this->Id;
	}	
	public function setId($ID)
	{
		$this->Id=$ID;
	}

	
	public function getName()
	{
		return $this->Name;
	}	
	public function setName($Name)
	{
		$this->Name=$Name;
	}

	
	public function getPosition()
	{
		return $this->Position;
	}	
	public function setPosition($Positionl)
	{
		$this->Position=$Position;
	}
}	
?>