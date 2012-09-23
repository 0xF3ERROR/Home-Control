<?php
class Command	implements i_CollectionElement
{
	protected $Id;
	protected $Name;
	protected $Data;
	protected $Execute;
	protected $Device_ID;
	
	
	public function __construct($Id=0,$Name="",$Data="",$Execute="",$Device_ID=0)
	{
		$this->Id=$Id;
		$this->Name=$Name;
		$this->Data=$Data;
		$this->Execute=$Execute;
		$this->Device_ID=$Device_ID;
	}
	
	
	public static function getEmptyInstance()
	{
		return new Command(0,"","","",0);
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
	
	
	public function getData()
	{
		return $this->Data;
	}
	public function setData($Data)
	{
		$this->Data=$Data;
	}
	
		
	public function getExecute()
	{
		return $this->Execute;
	}
	public function setExecute($Execute)
	{
		$this->Execute=$Execute;
	}
	

	public function getDevice_ID()
	{
		return $this->Device_ID;
	}
	public function setDevice_ID($Device_ID)
	{
		$this->Device_ID=$Device_ID;
	}

	
}
?>