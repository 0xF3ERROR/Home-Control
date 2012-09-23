<?php
class AvrNetIO extends Device
{	
	
	public function __construct($Id=0,$Name="AVR-Net-IO",$Typ="AvrNetIO",$Version="V 0.0.3",$IP="",$Port=0,$Status=0,$TX="",$RX="")
	{
		$this->Id=$Id;
		$this->Name=$Name;
		$this->Typ=$Typ;
		$this->Version=$Version;
		$this->IP=$IP;
		$this->Port=$Port;
		$this->Status=$Status;
		$this->TX=$TX;
		$this->RX=$RX;
	}
	
	public function getHTML($Action="")
	{
		switch($Action)
		{
			case "showAddNewDevice":
				/*
				$device = new device();
				$device->setID(0);
				$device->setName("AVR-Net-IO");
				$device->setTyp("AvrNetIO");
				$device->setVersion("V 0.0.1");
				$device->setIP("");
				$device->setPort("");
				$device->setStatus("");
				return $device->getHTML("showAddNewDevice");
				*/
				return parent::getHTML("showAddNewDevice");		
				
			case "showEditDevice":
				$device = new device();
				$device->setID($this->getID());
				$device->setName($this->getName());;
				$device->setTyp($this->getTyp());
				$device->setVersion($this->getVersion());
				$device->setIP($this->getIP());
				$device->setPort($this->getPort());
				$device->setStatus($this->getStatus());				
				return $device->getHTML("showEditDevice");	
					
			default:
				$device = new device();
				$device->setID($this->getID());
				$device->setName($this->getName());;
				$device->setTyp($this->getTyp());
				$device->setVersion($this->getVersion());
				$device->setIP($this->getIP());
				$device->setPort($this->getPort());
				$device->setStatus($this->getStatus());				
				return $device->getHTML();			
		}
	}	
	
	
	public static function getEmptyInstance()
	{
		return new Device(0,"","","","",0,0,"TX","RX");
	}	
	
	public function execute($CommandString)
	{
		return $CommandString;	
	}

}








?>