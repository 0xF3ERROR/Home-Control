<?php

/**
 * class cls_Controler_Account
 *
 * Description for class cls_Controler_Account
 *
 * @author:
*/
class Controler_Account  
{

	/**
	 * cls_Controler_Account constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
	
	
	public function start()	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
			{						
			case "showChangePass":
				{
				$this->showChangePass();
				}break;	
						
			case "ChangePass":
				{
				$this->ChangePass();
				}break;	
						
			case "ShowAccountData":
				{
				$this->ShowAccountData();
				}break;	
			
			default:
				$this->ShowAccountData();
			}
	}
	

	public function ShowAccountData()
	{
		if(!Controler_Main::getInstance()->isUserLoggedIn())
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		$Template=Template::getInstance("tpl_Account.php");  
		$Template->assign("UserId",Controler_Main::getInstance()->getUser()->getId()); 
		// den speicherplatz des Useres auslesen
		$User=Controler_Main::getInstance()->getUser();
		/*
		$DataControler= new Controler_Download();
		$UsedUserSpace=$DataControler->getUsedSpace($User->getFolder());
		if($UsedUserSpace)
		{
			$UsedUserSpacePercent=$User->getSpaceMax()/$UsedUserSpace;
		}else{
			$UsedUserSpacePercent=0;
			$UsedUserSpace=0;
		}
		$Template->assign("UsedUserSpace",$UsedUserSpace);
		$Template->assign("UserSpachePercent",$UsedUserSpacePercent);
		*/
		
		
		
		$Template->render();
	}

	
	public function showChangePass()
	{
		if(!Controler_Main::getInstance()->isUserLoggedIn())
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		$Template=Template::getInstance("tpl_ChangePass.php");  
		$Template->assign("UserId",Controler_Main::getInstance()->getUser()->getId()); 
		$User=Controler_Main::getInstance()->getUser();		
		$Template->render();
	}
	
	public function ChangePass()
	{
		if(!Controler_Main::getInstance()->isUserLoggedIn())
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		$Template=Template::getInstance("tpl_Account.php");  
		$Template->assign("UserId",Controler_Main::getInstance()->getUser()->getId()); 
		$User=Controler_Main::getInstance()->getUser();		
		
		$UserManager= new UserManager();
		
		// Passwortprüfung
	
		if(strlen($Request->getAsString("tb_Pass"))<5){$ErrorString.=":T_REGISTER_ERROR2: <br />";}
		if(strlen($Request->getAsString("tb_Pass"))===$Request->getAsString("tb_PassConfirme")){$ErrorString.=":T_REGISTER_ERROR3:<br />";}
		
		/* TODO: Salt für Passwortänderung !!! */
		$UserManager->updateUserPass(md5($Request->getAsString("tb_Pass")),$User->getId());
		$Template->assign("StatusString","Das Passwort wurde ge&auml;ndert."); 
		
		$Template->render();
	}


	
	
	
}

?>