<?php
class USBForAll extends Device
{	
	
	public function __construct($Id=0,$Name="USB4all-SocketServer",$Typ="USB4all-SocketServer",$Version="V 0.0.1",$IP="",$Port=3500,$Status=0,$TX="",$RX="")
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
				//$device = new device();
				/*$this->setID(0);
				$device->setName("USB4all-SocketServer");
				$device->setTyp("USB4all-SocketServer");
				$device->setVersion("V 0.0.1");
				$device->setIP("");
				$device->setPort(3500);
				$device->setStatus("");
				//return $device->getHTML("showAddNewDevice");*/
				
				//$Output=" ";
				
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