<?php
class Controler_Start
{
	
	public function start()
	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
		{
			case "Impressum": 
			{
				$this->showImpressum();
			}break;
			/*
			case "GetFileList": 
			{
				$this->getFileList();
			}break;
			*/
			case "ShowData": 
			{
				$this->showData();
			}break;
			
			
			default:
				$this->showStart();
				break;
		}
	}
	
	
	public function showData()
	{
		$Request= new Request();
		$UserName=$Request->getAsString("User");
		$UserPass=$Request->getAsString("Pass");
		$UserFinder= new UserFinder();
		$User=$UserFinder->findByNameAndPass($UserName,$UserPass);
		if($User->getId()==0)
		{
			return false;	
		}
		//echo $User->getFolder();
		//$this->listDir("./".$User->getFolder());
		return true;
	}	
	
	
	public function getFileList()
	{
		$Request= new Request();
		$UserName=$Request->getAsString("User");
		$UserPass=$Request->getAsString("Pass");
		$UserFinder= new UserFinder();
		$User=$UserFinder->findByNameAndPass($UserName,$UserPass);
		if($User->getId()==0)
		{
			return false;	
		}
		//echo $User->getFolder();
		$this->listDir("./".$User->getFolder());
		return true;
	}	
	/*
	private function listDir($Dir)
	{	
		$Handle =  opendir($Dir);
		while ($Datei = readdir($Handle)) 
		{ 
			if ($Datei != "." && $Datei != "..") 
			{ 
				if (is_dir($Dir."/".$Datei)) // Wenn Verzeichniseintrag ein Verzeichnis ist 
				{ 
					$this->listDir($Dir."/".$Datei); 
				}
				else
				{ 
					// Wenn Verzeichnis-Eintrag eine Datei ist, diese ausgeben
					echo $Dir."/".$Datei.";".filemtime($Dir."/".$Datei)."\n";
				} 
			}
		} 
		closedir($Handle); 
	}
	*/
	public function showStart()
	{
		$Template=Template::getInstance("tpl_Start.php"); 
		$Template->render();	

	}	
	
}

?>