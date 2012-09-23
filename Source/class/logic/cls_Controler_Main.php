<?php

class Controler_Main
	{
	private static $Instance;
	private $StartTime;
	private $Date;
	private $Language;
	private $User;
	private $Menu;
	private $Device;
	
	/**
	 * singelton
	 *
	 * @return Controler_Main 
	 *
	 */
	public static function getInstance()
		{
		if(self::$Instance===null)
			{
			self::$Instance = new Controler_Main();	
			}
		return self::$Instance;	
		}
	
	
	public  function getUser()
		{
		return $this->User;
		}
		
	
	public  function setUser(User $User)
		{
		$this->User=$User;
		}
	
	public  function getMenu()
		{
		return $this->Menu;
		}
		
	public  function setMenu(Menu $Menu)
		{
		$this->Menu=$Menu;
		}
		
	public  function getDevice()
		{
		return $this->Device;
		}
		
	public  function setDevice(Device $Device)
		{
		$this->Device=$Device;
		}
		
	/**
	 * der Contructor
	 *
	 * @return void 
	 *
	 */
	public function __construct()
		{
		$this->StartTime=microtime(true);
		$this->loadConfig();	// config ins system laden		$this->addClick();
		$this->Date=date("d.m.Y H:i");	// start zeit holen
		$this->setLanguage();  // sprache setzen
		}
	
	
	private function setLanguage()
		{
		$Request= new Request();
		$TempLate=Template::getInstance();
		if($Request->getAsString("Lang"))
			{
			$_SESSION['Language'] =$Request->getAsString("Lang");
			$this->Language=$_SESSION['Language'];
			$TempLate->setLanguage($this->Language);
			return false;	
			}
		if($_SESSION['Language'] && !$Request->getAsString("Lang"))
			{
			$this->Language=$_SESSION['Language'];
			}
		if(!$_SESSION['Language'] && !$Request->getAsString("Lang"))
			{
			$this->Language=LANGUAGE_GER;
			}		
		$TempLate->setLanguage($this->Language);
		}
	
	public function getEndTime()
		{
		return substr(microtime(true)-$this->StartTime,0,5);	
		}
	
	/**
	 * lädt die einstellungen für das system aus der config datei
	 *
	 * @return  
	 *
	 */
	private function loadConfig()
		{
		@include("cfg/cfg.php");// normale einstellungen laden nicht die db einstellungen die werden direkt von der db schnittstelle geladen 
		}



	private function userLogin()
		{
		$this->User= User::getEmptyInstance();
		$Request= new Request();
		// var_dump($_COOKIE);
		$UserFinder= new UserFinder();
		$UserCollection= new UserCollection();
		//$User = $UserFinder->getById(0);
		if(isset($_SESSION['UserName']) && isset($_SESSION['UserPass']) )
			{
			$this->User = $UserFinder->findByNameAndPass($_SESSION['UserName'],$_SESSION['UserPass']);
			return true;
			}
		if(strlen($Request->getAsString('UserName')) && strlen($Request->getAsString('UserPass')) )
			{
			$this->User->findByNameAndPass($Request->getAsString('UserName'),$Request->getAsString('UserPass'));
			}
		/* TODO: Wartezeit für falsche Logins ..... */
		}
	
	/**
	 * fügt den permaneten aoutput zum template hinzu
	 *
	 * @return void 
	 *
	 */
	public function addPermanentOutPut()
		{
		/* TODO: 2. Template Datenhaltung anpassen */
		/* daten in das template setzen!! */
		$Template= Template::getInstance("");		
		$Template->assign("Title",DOMAIN_NAME);
		$Template->assign("Author",AUTHOR);		
		$Template->assign("KeyWords",KEY_WORDS);
		$Template->assign("Description",DOMAIN_NAME);
		$Template->assign("UserName",$this->User->getName());
		$Template->assign("User",$this->User);
		$Template->assign("UserID",$this->User->getId());
		
	}
	
	public function isUserLoggedIn()
		{
		return $this->User->getId();
		}
		
	public function getUserLevel()
		{
		return $this->User->getUserLevel();
		}
	
	// Diese Function startet das system
	public function start()
		{
		$this->userLogin();
		$this->addPermanentOutPut();
		$Request= new Request();
		
		//var_dump($_SESSION['DataBase']);
		
		if($this->User->getId())
			{ // User ist angemeldet - Anfang
			switch($Request->getAsString('Section'))
				{	
				/* TODO: 1. Neue Hauptfunktion
				 * 1.1 neue Sektion einf�gen.  
				 * 1.2 unter /class/logic/ den Controler f�r die neue Sektion anlegen
				 * 1.3 im neuen Controler die Action definieren
				 * 1.4 unter /view/ ein neues Template anlegen
				 * 1.5 Navigation anpassen
				 * */
				case "Home": 
					{
					$Controler= new Controler_Home();
					$Controler->start();
					return true;
					}break;
					
				case "Account": 
					{
					$Controler= new Controler_Account();
					$Controler->start();
					return true;
					}break;
					
				case "Backend": 
					{
					$Controler= new Controler_Backend();
					$Controler->start();
					return true;
					}break;
					
				case "Users": 
					{
					$Controler= new Controler_Users();
					$Controler->start();
					return true;
					}break;
					
				case "UserGroups": 
					{
					$Controler= new Controler_UserGroups();
					$Controler->start();
					return true;
					}break;
					
				case "Menues": 
					{
					$Controler= new Controler_Menues();
					$Controler->start();
					return true;
					}break;
					
				case "Commands": 
					{
					$Controler= new Controler_Commands();
					$Controler->start();
					return true;
					}break;
					
				case "Devices": 
					{
					$Controler= new Controler_Devices();
					$Controler->start();
					return true;
					}break;
				
				
				
				case "Picture": 
					{
					$Controler= new Controler_Picture();
					$Controler->start();
					return true;
					}break;
				case "Data": 
					{
					$Controler= new Controler_Download();
					$Controler->start();
					return true;
					}break;	
				
				case "Music": 
					{
					$Controler= new Controler_Music();
					$Controler->start();
					}break;
				
				}
			} // User ist angemeldet - Ende
		
		switch($Request->getAsString('Section'))
			{
			case "Impressum": 
				{
				$this->showImpressum();
				}break;
				
			case "AGB": 
				{
				$this->showAGB();
				}break;	
					
			case "Login": 
				{
				$Controler= new Controler_Login();
				$Controler->start();
				}break;
				
			case "CheckUser": 
				{
				$this->checkUser();
				}break;	
				
			case "GetFolderIndex": 
				{
				$this->getFolderIndex();
				}break;		
			
			case "GetFileIndex": 
				{
				$this->getFileIndex();
				}break;
					
			default:
				{
				$Controler= new Controler_Start();
				$Controler->start();
				}break;
			}				
		}
	
	public function showStart()
		{
		$Controler= new Controler_Start();
		$Controler->start();
		}
		
	public function checkUser()
		{
		// 
		$ReQuest= new Request();
		$UserFinder= new UserFinder();
		$User=$UserFinder->findByNameAndPass($ReQuest->getAsString("UserName"),$ReQuest->getAsString("UserPass"));
		if($User->getId())
			{
			echo "true";	
			return true;
			}
		echo "false";
		return false;
		}
	
	public function getFileIndex()
		{
		// 
		Logger::write("File Index wurde geladen");
		$ReQuest= new Request();
		if(!$this->User->getId()){return false;}
		// das verzeichniss auslesen
		$Controler_Download= new Controler_Download();
		$Controler_Download->getFilesRekursiv($this->User->getFolder(),$this->User->getFolder());
		return true;
		}
		
	public function getFolderIndex()
		{
		// 
		$ReQuest= new Request();
		if(!$this->User->getId()){return false;}
		// das verzeichniss auslesen
		$Controler_Download= new Controler_Download();
		$Controler_Download->getDirRekursiv($this->User->getFolder(),$this->User->getFolder());
		return true;
		}
			
	public function showAGB()
		{
		$Template=Template::getInstance("tpl_AGB.php");  
		$Template->render();
		}
	
	private function showImpressumExtern()
		{
		$Template=Template::getInstance("tpl_Impressum.php");  
		$Template->render();	
		}
	
	private function showImpressum()
		{
		$Template=Template::getInstance("tpl_Impressum.php");
		$Template->render();	
		}
	
	/**
	* gibt ein zufälliges passwort mit der angegeben länge zurück
	*
	* @param int $Length
	* @return string
	*/
	function getRandomPass($Length=6)
		{
		$Pool = "qwertzupasdfghkyxcvbnm";
		$Pool .= "23456789";
		$Pool .= "WERTZUPLKJHGFDSAYXCVBNM";
		srand ((double)microtime()*1000000);
		for($Index = 0; $Index < $Length; $Index++)
		{
			$PassWord .= substr($Pool,(rand()%(strlen ($Pool))), 1);
		}
		return $PassWord;
		}
	}
?>