<?php
class Controler_Home
{
	
	
	public function start()
	{
		$Request= new Request();
		switch($Request->getAsString('Action'))		{

			
			case "Homescreen": 
			{
				$this->showHomescreen();
			}break;	
			
			default:
				$this->showHomescreen();
		}
	}
	

	public function showHomescreen()
	{
		if(!Controler_Main::getInstance()->isUserLoggedIn())
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}	
		$Request= new Request();
		
		
		
		$this->Menue= Menue::getEmptyInstance();
		$Request= new Request();
		// var_dump($_COOKIE);
		$MenueFinder= new MenueFinder();
		$this->Menue=$MenueFinder->findByID(1);
		$this->User=Controler_Main::getInstance()->getUser();	
		
		
		$Template=Template::getInstance("tpl_Home.php"); 
		
		$MenueFinder = new MenueFinder();
		$MenueCollection = $MenueFinder->findAll();
		
		
		$Template->assign("User",$this->User);
		$Template->assign("UserName",Controler_Main::getInstance()->getUser()->getName());
		$Template->assign("UserID",Controler_Main::getInstance()->getUser()->getId());		
		
		
		$Template->assign("MenueCollection",$MenueCollection);		
		
		$Template->assign("Menue",$this->Menue);
		
		
		$Template->render();	

	}	
	
}

?>


