<?php

/**
 * class cls_Controler_Click
 *
 * Description for class cls_Controler_Click
 *
 * @author:
*/
class Controler_Login  
{

	/**
	 * cls_Controler_Click constructor
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
				case "ShowRegister":
				{
					$this->showRegister();
				}break;
				case "Register":
				{
					$this->registerNewUser();
				}break;
				case "UserLogin":
				{
					$this->userLogin();
				}break;
				case "Logout":
				{
					$this->userLogout();
				}break;
			
			
			case "DeleteUser":
				{
				$this->deleteUser();
				}break;
			
			case "GetCaptcha":
			{
				$this->getCaptcha();
			}break;
			
			case "ShowProfil":
				{
				$this->showProfil();
				}break;
			
			
			
				default:
					$this->showLogin();
			}
	}
	
	
	public function deleteUser()
	{
		if(!Controler_Main::getInstance()->getUser()->getId()){Controler_Main::getInstance()->showStart();}
		
		// den speicherplatz des Useres auslesen
		$User=Controler_Main::getInstance()->getUser();
		$DataControler= new Controler_Download();
		
		// alle dateien löschen
		$DataControler->deleteDirectiry("./".$User->getFolder());
		// thumbs löschen
		$DataControler->deleteDirectiry("./thumb/".$User->getFolder());
		
		// user aus db löschen
		$UserManager= new UserManager();
		//$UserManager->deleteUserById($User->getId());
		
		
		
		$this->userLogout();
		
	}


	public function showProfil()
	{
		if(!Controler_Main::getInstance()->getUser()->getId()){$this->registerNewUser();return false;}
		$Template=Template::getInstance("tpl_Profil.php");  
		$Template->assign("UserId",Controler_Main::getInstance()->getUser()->getId()); 
		// den speicherplatz des Useres auslesen
		$User=Controler_Main::getInstance()->getUser();
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
		
		$Template->render();
	}

	/**
	 * setzt den captcha cod in die session
	 *
	 * @return void 
	 *
	 */
	private function setCaptchaCode()
	{
		$Pass= Controler_Main::getInstance()->getRandomPass(5);
		$_SESSION['Captcha']=$Pass;
	}
	
	public function showRegister($ErrorString="")
	{
		$Request= new Request();
		$this->setCaptchaCode();
		$Template=Template::getInstance("tpl_Register.php");  
		$Template->assign("Title",DOMAIN_NAME);
		$Template->assign("Author",AUTHOR);
		$Template->assign("KeyWords",KEY_WORDS);
		$Template->assign("Description",DOMAIN_NAME);
		$Template->assign("Name",$Request->getAsString("tb_Name"));
		$Template->assign("MyMail",$Request->getAsString("tb_Mail"));
		$Template->assign("Pass",$Request->getAsString("tb_Pass"));
		$Template->assign("ErrorString",$ErrorString);
		$Template->render();
	}
	
	
	
	/**
	 * diese fu8nction schickt ein bild zum browser
	 *
	 * @return void 
	 *
	 */
	public function getCaptcha()
	{	
		Header ("Content-type: image/png");
		// Laden der Rohdatei, die sich im Verzeichnis befinden muss
		
		$Pic = ImageCreate(250, 250);
		$Background=imagecreatefrompng("./img/Captcha.png");
		ImageCopy($Pic,$Background,0,0,$_SESSION['Random'][$_SESSION['PicCounter']],$_SESSION['Random'][$_SESSION['PicCounter']],250,250);
		//$Font=imageloadfont("./images/font/sector_017.ttf");
		$farbe_w = ImageColorAllocate ($Pic, 255, 255, 255);
		$farbe_b = ImageColorAllocate ($Pic, 0, 0, 0);

		ImageString($Pic,5, mt_rand(120,160),  mt_rand(50,90), $_SESSION['Captcha'][0], $farbe_b);
		ImageString($Pic, 5,  mt_rand(165,175),  mt_rand(125,150), $_SESSION['Captcha'][1], $farbe_b);
		ImageString($Pic, 5,  mt_rand(120,150),  mt_rand(190,220), $_SESSION['Captcha'][2], $farbe_b);
		ImageString($Pic, 5,  mt_rand(60,100),  mt_rand(170,210), $_SESSION['Captcha'][3], $farbe_b);
		ImageString($Pic, 5,  mt_rand(60,100), mt_rand(100,140), $_SESSION['Captcha'][4], $farbe_b);	

		header ("Content-type: image/png");
		ImagePNG ($Pic);
		ImageDestroy ($Pic);
		return false;		
	}
	
	
	
	
	
	/**
	 * registriert neue benutzer im system
	 *
	 * @return void This is the return value description
	 *
	 */
	public function registerNewUser()
	{
		$Request= new Request();
		
		$Controler_Main= Controler_Main::getInstance();
		$ErrorString="";
		if(strlen($Request->getAsString("tb_Name"))<3){$ErrorString.=":T_REGISTER_ERROR1: <br />";}
		if(strlen($Request->getAsString("tb_Pass"))<5){$ErrorString.=":T_REGISTER_ERROR2: <br />";}
		if(strlen($Request->getAsString("tb_Pass"))===$Request->getAsString("tb_PassConfirme")){$ErrorString.=":T_REGISTER_ERROR3:<br />";}
		$UserFinder= new UserFinder();
		if(strlen($Request->getAsString("tb_Mail"))>3)
		{
			$User=$UserFinder->findByMail($Request->getAsString("tb_Mail"));
			if($User->getId()!=0)
			{
				$ErrorString.=":T_REGISTER_ERROR4: <br />";
			}
		}else
		{
			$ErrorString.=":T_REGISTER_ERROR5: <br />";
		}	
		if(strlen($Request->getAsString("tb_Mail"))===$Request->getAsString("tb_MailConfirme")){$ErrorString.=":T_REGISTER_ERROR6:<br />";}
		if(strlen($Request->getAsString("tb_Name")))
		{
			$User=$UserFinder->findByName($Request->getAsString("tb_Name"));
			if($User->getId()!=0){$ErrorString.=":T_REGISTER_ERROR7: <br />";}
		}
		
		
		if(!$this->isMailCorrect($Request->getAsString("tb_Mail")))
		{
			$ErrorString.=":T_REGISTER_ERROR8: <br />";
		}	
		
		if(strtolower($_SESSION['Captcha'])!=(strtolower($Request->getAsString("tb_Captcha"))))
		{
			$ErrorString.=":T_REGISTER_ERROR9: <br />";
		}
			
		if(strlen($ErrorString)!=0)
		{
			$this->showRegister($ErrorString);
			$this->setCaptchaCode();
			return false;
		}
		$User= new User(0,$Request->getAsString("tb_Name"),md5($Request->getAsString("tb_Pass")),$Request->getAsString("tb_Mail"),0,1,0,0);	
		$UserManager= new UserManager();
		
		
		
		
		// user Ordner anlegen
		
		// htaccess zugriff legen
		if(!is_dir(STORE_FOLDER."/".md5($User->getName())))
		{
			mkdir(STORE_FOLDER."/".md5($User->getName()), 0777);// ordner erstellen
			$User->setFolder(STORE_FOLDER."/".md5($User->getName()));
		}else
		{
			$Folder=STORE_FOLDER."/".md5($User->getName()+mktime());
			mkdir($Folder, 0777);
			$User->setFolder($Folder);
		}
		
		$User->setSpaceMax(MAXSPACE);
		//var_dump("und den UserFinder eintragen");
		$UserManager->insertUser($User);// user in die db eintragen
		if(!$UserManager->getLastInsertId())
		{
			$this->showRegister($ErrorString);
			return false;
		}
		$User->setId($UserManager->getLastInsertId());
		$this->userLogin();
		

	}

	
	/**
	 * prüft ob die eingegebene Mail im filter ist wenn ja wird false zurück gegeben
	 *
	 * @return bool This is the return value description
	 *
	 */
	public function isMailCorrect($Mail)
	{
		$MailArray=explode(",",EMAIL_FILTER);
		
		foreach($MailArray as $Filter)
		{
			if(strpos($Mail,$Filter)>0 || strpos($Mail,$Filter)===0)
			{
				   return false;
			}
		}		
		return true;
	}
	
	public function userLogin()
	{
		$Request= new Request();
		if($_SESSION['BadLogin']==5)
		{
			$this->showLogin();
			return false;
		}
		
		$UserFinder= new UserFinder();
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
		$ControlerData= new Controler_Download();
		$ControlerData->start();

	}
	public function showLogin($ErrorString= "")
	{
		$Template=Template::getInstance("tpl_Login.php"); 
		$Template->assign("Title","Login ".DOMAIN_NAME);
		$Template->assign("Author",AUTHOR);
		$Template->assign("KeyWords",KEY_WORDS);
		$Template->assign("Description",DOMAIN_NAME);
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