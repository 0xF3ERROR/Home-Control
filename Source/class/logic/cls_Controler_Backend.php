<?php

/**
 * class cls_Controler_Backend
 *
 * Description for class cls_Controler_Backend
 *
 * @author:
*/
class Controler_Backend  
{

	/**
	 * cls_Controler_Backend constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
	
	
	public function start()	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
			{						
			case "SystemStatus":
				{
				$this->showSystemStatus();
				}break;				
					
				
			
			default:
				$this->showSystemStatus();
			}
	}
	
	
	/**
	 * 
	 * 	Systemstatus anzeigen
	 * 
	 */	
	public function showSystemStatus($ErrorString="",$StatusString="")
		{
		//if(!Controler_Main::getInstance()->isUserLoggedIn())//if( $this->User->getUserLevel() < BACKEND_USERLEVEL ) 
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}
		$Request= new Request();
		/*
		$SystemInformationFinder= new SystemInformationFinder();
		$MySql = $SystemInformationFinder->mysqlVersion();
		$MySqlVersion = $MySql[0]['s_MySqlVersion'];
		*/
		
		
		$PHPVersion = phpversion();
		
		$WebserverVersion = $_SERVER['SERVER_SOFTWARE'];
		$WebserverVersion = "<div class='befehlskontainer' >".str_replace(" ","</div><div class='befehlskontainer' >",$WebserverVersion)."</div>";
		
		$WebserverConfig = "<div class='befehlskontainer' >:T_SERVER_NAME:: ".$_SERVER['SERVER_NAME']."</div><div class='befehlskontainer' >";
		$WebserverConfig .= ":T_SERVER_ADDR:: ".$_SERVER['SERVER_ADDR']."</div><div class='befehlskontainer' >";
		$WebserverConfig .= ":T_SERVER_PORT:: ".$_SERVER['SERVER_PORT']."</div><div class='befehlskontainer' >";
		$WebserverConfig .= ":T_REMOTE_ADDR:: ".$_SERVER['REMOTE_ADDR']."</div><div class='befehlskontainer' >";
		$WebserverConfig .= ":T_DOCUMENT_ROOT:: ".$_SERVER['DOCUMENT_ROOT']."</div><div class='befehlskontainer' >";
		$WebserverConfig .= ":T_SERVER_ADMIN:: ".$_SERVER['SERVER_ADMIN']."</div>";
		
		$Template=Template::getInstance("tpl_BE_SystemStatus.php");  
		$Template->assign("UserId",Controler_Main::getInstance()->getUser()->getId()); 
		$Template->assign("WebserverConfig",$WebserverConfig); 
		$Template->assign("WebserverVersion",$WebserverVersion); 
		$Template->assign("PHPVersion",$PHPVersion); 
		$Template->assign("MySqlVersion",mysql_get_server_info()); 
		$Template->assign("MySqlClientInfo",mysql_get_client_info()); 
		$Template->assign("MySqlProtInfo",mysql_get_proto_info());
		$Template->assign("MySqlHostInfo",mysql_get_host_info());
		$Template->render();
	}
	
		
}

?>