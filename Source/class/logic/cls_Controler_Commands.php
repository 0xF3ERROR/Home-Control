<?php

/**
 * class cls_Controler_Commands
 *
 * Description for class cls_Controler_Commands
 *
 * @author:
*/
class Controler_Commands  
{

	/**
	 * cls_Controler_Contents constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
	
	
	public function start()	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
			{					
			case "CommandManagement":
				{
				$this->showCommandManagement();
				}break;
				
				
			
			default:
				$this->showCommandManagement();
			}
	}
	
	public function showCommandManagement($ErrorString="",$StatusString="")
		{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}
		$Request= new Request();
		
		
		$CommandFinder= new CommandFinder();
		$CommandCollection = $CommandFinder->findAll();
		
		$DeviceFinder= new DeviceFinder();
		$DeviceCollection = $DeviceFinder->findAll();
		
		$Template=Template::getInstance("tpl_BE_CommandManager.php");  
		$Template->assign("CommandCollection",$CommandCollection);
		$Template->assign("DeviceCollection",$DeviceCollection);
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
		}
		
		
		
}

?>