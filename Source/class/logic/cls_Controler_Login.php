<?php
/**
 * class cls_Controler_Login
 *
 * Description for class cls_Controler_Login
 *
 * @author:
*/
class Controler_Login  
{
	/**
	 * cls_Controler_Login constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
	
	
	public function start()
	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
			{
				case "UserLogin":
				{
					$this->userLogin();
				}break;
				
				case "Logout":
				{
					$this->userLogout();
				}break;
		
				default:
					$this->showLogin();
			}
	}
	
	
	public function userLogin()
	{
		$Request= new Request();
		if($_SESSION['BadLogin']>=5 && BADLOGIN_ACTIVATED)
		{
			$this->showLogin("Maximale Logins verbraucht bitte Probieren Sie es In einer stunde wieder");
			return false;
		}
		
		$UserFinder= new UserFinder();
		/* TODO: Salt für neuen Benutzeranmeldung !!! */
		$User=$UserFinder->findByNameAndPass($Request->getAsString("tb_Name"),md5($Request->getAsString("tb_Pass")));
		if ($User->getId()==0)
		{
			$this->showLogin();
			if(!$_SESSION['BadLogin'])
			{
				$_SESSION['BadLogin']=1;
			}else
			{
				$_SESSION['BadLogin']++;
			}
			return false;	
		}
		$_SESSION['UserId']=$User->getId();
		$_SESSION['UserName']=$Request->getAsString("tb_Name");
		$_SESSION['UserPass']=md5($Request->getAsString("tb_Pass"));
		if($User->getLooked())
		{	  // der User ist gesperrt und darf sich nicht einloggen
			$TempLate=Template::getInstance("tpl_Login.php"); 
			$TempLate->renderError("Fehler",":T_LOGIN_ERROR1:","index.php");
			return false;
		}
		Controler_Main::getInstance()->setUser($User);
		Controler_Main::getInstance()->addPermanentOutPut();
		$UserManager= new UserManager();
		$UserManager->updateLoginTime($User->getId());
		$HomeControler= new Controler_Home();
		$HomeControler->showHomescreen();		
	}
	
	
	public function showLogin($ErrorString= "")
	{
		$Template=Template::getInstance("tpl_Login.php"); 
		$Template->render();
	}
	
	public function userLogout()
	{
		$UserManager= new UserManager();
		$User=Controler_Main::getInstance()->getUser();
		if($_SESSION['UserId'])
		{
			$UserManager->settLoginTimeNULL($_SESSION['UserId']);
		}
		$_SESSION['UserId']="";
		unset($_SESSION['DataBase']);	// server vari entfernen
		Controler_Main::getInstance()->setUser(User::getEmptyInstance());
		Controler_Main::getInstance()->addPermanentOutPut(); // den bereits gesetzten user usw überschreiben
		@session_destroy();
		$Controler_Picture=new Controler_Start();
		$Controler_Picture->start();
	}
}
?>