<?php

/**
 * class cls_Controler_Devices
 *
 * Description for class cls_Controler_Devices
 *
 * @author:
*/
class Controler_Devices  
{

	/**
	 * cls_Controler_Devices constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
	
	
	public function start()	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
			{	
			case "DeviceManagement":
				{
				$this->showDeviceManagement();
				}break;
				
			case "showAddNewDevice":
				{
				$this->showAddNewDevice();
				}break;
				
			case "addNewDevice":
				{
				$this->addNewDevice();
				$this->showDeviceManagement();
				}break;	
								
			case "showEditDevice":
				{
				$this->showEditDevice();
				}break;
								
			case "updateDevice":
				{
				$this->updateDevice();
				$this->showDeviceManagement();
				}break;	
								
			case "updateDeviceStatus":
				{
				$this->updateDeviceStatus();
				$this->showDeviceManagement();
				}break;	
				
			case "deleteDevice":
				{
				$this->deleteDevice();
				$this->showDeviceManagement();
				}break;
			
			default:
			}
	}
			
	/**
	 * Zeigt die Geräteübersicht
	 * @param none
	 * @return Geräteübersicht
	 *
	 */
	public function showDeviceManagement($ErrorString="",$StatusString="")
		{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}			
		$Request= new Request();
		
		
		$DeviceFinder= new DeviceFinder();
		$DeviceTemplates = $DeviceFinder->getAllDevices();
		
		$this->Device= Device::getEmptyInstance();
		// var_dump($_COOKIE);
		$DeviceCollection = $DeviceFinder->findAll();		
		$Request= new Request();
		$Template=Template::getInstance("tpl_BE_DeviceManager.php");
		$Template->assign("DeviceTemplates", $DeviceTemplates);		
		$Template->assign("DeviceCollection", $DeviceCollection);			
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
		}
		
	/**
	 * Aktualisiert das Gerät
	 * @param from Request all
	 * @return true/false
	 *
	 */
	public function showAddNewDevice($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}				
		$Request= new Request();		
		
		/* TODO: Hier die Liste der Devices verarbeiten*/		
		
		$DeviceTyp=$Request->getAsString("DeviceTyp");		
		// device finder 
		$DeviceFinder = new DeviceFinder();
		$DeviceFinder->getAllDevices();
		//$this->Device= $DeviceFinder->getHTML();
		//$Device= $DeviceFinder->
		
		
		//$Device->getHTML("showAddNewDevice");
		
		
		$this->Device = $DeviceFinder->getDeviceByTyp($DeviceTyp);
		
		$Template=Template::getInstance("tpl_BE_DeviceManager.php");
		$Template->assign("Device", $this->Device);	
		$HtmlSelector=$Request->getAsString("Action");
		$Template->assign("HtmlSelector","showAddNewDevice");
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
	}	
		
	/**
	 * Aktualisiert das Gerät
	 * @param from Request all
	 * @return true/false
	 *
	 */
	public function showEditDevice($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}				
		$Request= new Request();
		$this->Device= Device::getEmptyInstance();
		$DeviceFinder= new DeviceFinder();
		$ID=$Request->getAsInt("DeviceID");
		$DeviceCollection = $DeviceFinder->findByID($ID);	
		$Template=Template::getInstance("tpl_BE_DeviceManager.php");
		$Template->assign("Device", $DeviceCollection);	
		$Template->assign("HtmlSelector","showEditDevice");
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
	}		
	
	/**
	 * Fügt ein neues Gerät hinzu
	 * @param from Request all Device Vars
	 * @return true/false
	 *
	 */
	public function addNewDevice($ErrorString="",$StatusString="")
	{
		$Request= new Request();
		$Name=$Request->getAsString("tb_DeviceName");
		$Typ=$Request->getAsString("tb_DeviceTyp");
		$Version=$Request->getAsString("tb_DeviceVersion");
		$IP=$Request->getAsString("tb_DeviceIP");
		$Port=$Request->getAsInt("tb_DevicePort");
		$Status=$Request->getAsInt("tb_DeviceStatus");		
		
		/* TODO++-: Device hinzufügen */
		
		$DeviceManager = new DeviceManager();
		$DeviceManager->insert($Name,$Typ,$Version,$IP,$Port,$Status);
		
		/* TODO: Rückgabe prüfen!!! */	
		return true;
	}	
	
	/**
	 * Fügt ein neues Gerät hinzu
	 * @param from Request all Device Vars
	 * @return true/false
	 *
	 */
	public function updateDevice($ErrorString="",$StatusString="")
	{
		$Request= new Request();
		$ID=$Request->getAsInt("tb_DeviceID");
		$Name=$Request->getAsString("tb_DeviceName");
		$Typ=$Request->getAsString("tb_DeviceTyp");
		$Version=$Request->getAsString("tb_DeviceVersion");
		$IP=$Request->getAsString("tb_DeviceIP");
		$Port=$Request->getAsInt("tb_DevicePort");
		$Status=$Request->getAsInt("tb_DeviceStatus");	
		/* TODO++-: Device updaten */		
		
		$DeviceManager = new DeviceManager();		
		$DeviceManager->updateById($ID,$Name,$Typ,$Version,$IP,$Port,$Status);
		/* TODO: Rückgabe prüfen!!! */	
		return true;
	}
		
	/**
	 * Aktualisiert den Gerätestatus
	 * @param from Request DeviceID DeviceID
	 * @return true/false
	 *
	 */
	public function updateDeviceStatus($ErrorString="",$StatusString="")
	{
		$Request = new Request();
		$ID=$Request->getAsInt("DeviceID");
		$Status=$Request->getAsInt("DeviceStatus");
		$DeviceManager = new DeviceManager();
		$Status=ABS($Status-1);
		$DeviceManager->updateStatusById($ID,$Status);	
		/* TODO: Rückgabe prüfen!!! */	
		return true;
	}	
		
	/**
	 * Löscht das Gerät
	 * @param from Request DeviceID 
	 * @return true/false
	 *
	 */
	public function deleteDevice($ErrorString="",$StatusString="")
	{
		$Request = new Request();
		$ID=$Request->getAsInt("DeviceID");
		$DeviceManager = new DeviceManager();
		$DeviceManager->deleteById($ID);	
		/* TODO: Rückgabe prüfen!!! */	
		return true;
	}		
}
?>