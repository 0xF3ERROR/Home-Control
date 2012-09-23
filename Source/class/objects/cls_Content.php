<?php
class Content	implements i_CollectionElement
{
	protected $Id;
	protected $Name;
	protected $Position;
	protected $Menue_ID;
	protected $ContentGroup_ID;
	protected $View_ID;
	protected $Command_ID;
	
	
	public function __construct($Id=0,$Name="None",$Position=0,$Menue_ID=0,$ContentGroup_ID=0,$View_ID=0,$Command_ID=0)
	{
		$this->Id=$Id;
		$this->Name=$Name;
		$this->Position=$Position;
		$this->Menue_ID=$Menue_ID;
		$this->ContentGroup_ID=$ContentGroup_ID;
		$this->View_ID=$View_ID;
		$this->Command_ID=$Command_ID;
	}
	
	
	public static function getEmptyInstance()
	{
		return new Content(0,"",0,0,0,0,0);
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
	
	
	public function getPosition()
	{
		return $this->Position;
	}
	public function setPosition($Position=0)
	{
		$this->Position=$Position;
	}
	
	
	public function getMenue_ID()
	{
		return $this->Menue_ID;
	}
	public function setMenue_ID($Menue_ID)
	{
		$this->Menue_ID=$Menue_ID;
	}
	
	
	public function getContentGroup_ID()
	{
		return $this->ContentGroup_ID;
	}
	public function setContentGroup_ID($ContentGroup_ID)
	{
		$this->ContentGroup_ID=$ContentGroup_ID;
	}

	
	public function getView_ID()
	{
		return $this->View_ID;
	}
	public function setView_ID($View_ID)
	{
		$this->View_ID=$View_ID;
	}
	
	
	public function getCommand_ID()
	{
		return $this->Command_ID;
	}
	public function setCommand_ID($Command_ID)
	{
		$this->Command_ID=$Command_ID;
	}	
}
?>