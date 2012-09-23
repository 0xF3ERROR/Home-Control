<?php

/**
 * class cls_Controler_Users
 *
 * Description for class cls_Controler_Users
 *
 * @author:
*/
class Controler_Users  
{
	
	/**
	 * cls_Controler_Users constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
		
	
	public function start()	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
			{	
			case "UserManagement":
				{
				$this->showUserManagement();
				}break;
				
			case "showAddNewUser":
				{
				$this->showAddNewUser();
				}break;
										
			case "addNewUser":
				{
				$this->addNewUser();
				}break;	
				
			case "showEditUser":
				{
				$this->showEditUser();
				}break;
										
			case "getRandomPassword":
				{
				$this->getRandomPassword();
				}break;	
										
			case "updateUser":
				{
				$this->updateUser();
				}break;	
										
			case "updateUserName":
				{
				$this->updateUserName();
				}break;	
										
			case "updateUserEmail":
				{
				$this->updateUserEmail();
				}break;	
										
			case "updateUserPass":
				{
				$this->updateUserPass();
				}break;		
				
			case "deleteUser":
				{
				$this->deleteUserByID();
				}break;		
						
			case "insertUG":
				{
				$this->insertUG();
				}break;	
											
			case "deleteUG":
				{
				$this->deleteUG();
				}break;				
				
			default:
				$this->showUserManagement();
			}
	}


	/**
	 * 
	 * showUserManagement
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function showUserManagement($ErrorString="",$StatusString="")
		{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}
		$Request= new Request();		
		$UserFinder = new UserFinder();
		$UserCollection = $UserFinder->findAll();		
		$Template=Template::getInstance("tpl_BE_UserManager.php");  
		$Template->assign("UserCollection",$UserCollection);
		$Template->assign("StatusString",$StatusString);
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
		}
	
		
	/**
	 * 
	 * showAddNewUser
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function showAddNewUser($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();		
		$Template=Template::getInstance("tpl_BE_UserNew.php"); 
		$Template->assign("Name",$Request->getAsString("tb_Name"));
		$Template->assign("MyMail",$Request->getAsString("tb_Mail"));
		$Template->assign("Pass",$Request->getAsString("tb_Pass"));
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
	}
	
		
	/**
	 * 
	 * addNewUser
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function addNewUser($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}		
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
					
		if(strlen($ErrorString)!=0)
		{
			$this->showAddNewUser($ErrorString);
			return false;
		}
		$UserManager= new UserManager();
		$UserManager->insertNewUser($Request->getAsString("tb_Name"), $Request->getAsString("tb_Mail"), $Request->getAsString("tb_Mail"));
		if(!$UserManager->getLastInsertId())
		{
			$this->showAddNewUser($ErrorString);
			return false;
		}
		$this->showUserManagement("",":T_USER_NEW_ADDED_STATUS:");
	}
	
		
	/**
	 * 
	 * showEditUser
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function showEditUser($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();	
		$UserFinder = new UserFinder();
		$UserOutput = $UserFinder->findById($Request->getAsInt("EditUserID"));		
		$UserGroupFinder = new UserGroupFinder();
		$UserGroupCollection = $UserGroupFinder->findAll();		
		$UGFinder = new UGFinder();
		$UGCollection = $UGFinder->findAll();		
		$Template=Template::getInstance("tpl_BE_UserEdit.php"); 
		$Template->assign("EditUserID",$UserOutput->getID());
		$Template->assign("Name",$UserOutput->getName());
		$Template->assign("Email",$UserOutput->getEmail());
		$Template->assign("Pass","");
		$Template->assign("UserGroupCollection",$UserGroupCollection);
		$Template->assign("UGCollection",$UGCollection);
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
	}
	
		
	/**
	 * 
	 * getRandomPassword
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function getRandomPassword($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();	
		$UserFinder = new UserFinder();
		$UserOutput = $UserFinder->findById($Request->getAsInt("EditUserID"));		
		$UserGroupFinder = new UserGroupFinder();
		$UserGroupCollection = $UserGroupFinder->findAll();		
		$UGFinder = new UGFinder();
		$UGCollection = $UGFinder->findAll();		
		$Template=Template::getInstance("tpl_BE_UserEdit.php"); 
		$Template->assign("EditUserID",$UserOutput->getID());
		$Template->assign("Name",$UserOutput->getName());
		$Template->assign("Email",$UserOutput->getEmail());
		$Template->assign("Pass","");
		$Template->assign("UserGroupCollection",$UserGroupCollection);
		$Template->assign("UGCollection",$UGCollection);
		/* TODO: Salt für Passwort */	
		$pass_word = "";
		$pool = "qwretzusapdfghkyxcvbnm";
		$pool .= "23456789";
		$pool .= "WRETZUPJKLHGSFDAYXCBVNM";
		srand ((double)microtime()*1000000);
		for($index = 0; $index < RANDOM_PASSWORD_LENGTH; $index++)
			{
			$pass_word .= substr($pool,(rand()%(strlen ($pool))), 1);
			}		
		$Template->assign("Password",$pass_word);
		$Template->assign("tb_PassConfirme",$pass_word);	
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
	}
	
		
	/**
	 * 
	 * updateUser
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function updateUser($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
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
					
		if(strlen($ErrorString)!=0)
		{
			$this->showNewUser($ErrorString);
			return false;
		}
		/* TODO: Salt für Passwort */
		$UserManager= new UserManager();
		$UserManager->updateUser($User);
		if(!$UserManager->getLastInsertId())
		{
			$this->showRegister($ErrorString);
			return false;
		}
		$this->showRegister("",":T_USER_UPDATED_STATUS:");
	}	
	
		
	/**
	 * 
	 * updateUserPass
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function updateUserPass($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		
		$Controler_Main= Controler_Main::getInstance();
		$ErrorString="";
		if(strlen($Request->getAsString("tb_Pass"))<5){$ErrorString.=":T_REGISTER_ERROR2: <br />";}
		if($Request->getAsString("tb_Pass")!=($Request->getAsString("tb_PassConfirme"))){$ErrorString.=":T_REGISTER_ERROR3:<br />";}			
		if(strlen($ErrorString)!=0)
		{
			$this->showEditUser($ErrorString);
			return false;
		}
		/* TODO: Salt für Passwort */		
		$UserID = $Request->getAsInt("EditUserID");
		$PW = $Request->getAsString("tb_Pass");
		$UserManager = new UserManager();
		$UserManager->updateUserPass(md5($PW), $UserID);
		$UserFinder = new UserFinder();
		$UserFrom = $UserFinder->findById(1);
		$UserTo = $UserFinder->findById($UserID);
		if(SEND_PASSWORD_EMAIL)
		{
			/* TODO: Passwort per Mail Versenden */
	      	$from = "From: ".DOMAIN_NAME." <".$UserFrom->getEmail().">";
	      	$subject = "DOMAIN_NAME";
	      	$body = "Hallo ".$UserTo->getName().",\n\n"
				."Es wurde ein neues Passwort erstellt.\n\n"
				.FQDN."\n\n"
				."Benutzername: ".$UserTo->getName()."\n"
				."Passwort: ".$PW."\n\n"
				."";
	        $email = $UserTo->getEmail();   
	      	if ( !mail($email,$subject,$body,$from) ) 
	      	{
	      		$this->showEditUser($ErrorString);
	      		return false; 
	      	}
		}
		$this->showEditUser("",":T_USER_PASS_CHANGE_STATUS:");
	}	
	
		
	/**
	 * 
	 * updateUserName
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function updateUserName($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		
		$Controler_Main= Controler_Main::getInstance();
		$ErrorString="";
		$ID = $Request->getAsString("EditUserID");
		if(strlen($Request->getAsString("tb_Name"))<3){$ErrorString.=":T_REGISTER_ERROR1: <br />";}  
		$UserFinder= new UserFinder();
		if(strlen($Request->getAsString("tb_Name")))
		{
			$User=$UserFinder->findByName($Request->getAsString("tb_Name"));
			if($User->getId()!=0){$ErrorString.=":T_REGISTER_ERROR7: <br />";}
		}		
		if(strlen($ErrorString)!=0)
		{
			$this->showUserManagement($ErrorString);
			return false;
		}
		$UserManager= new UserManager();
		$UserManager->updateUserNameByID($ID,$Request->getAsString("tb_Name"));
		$this->showEditUser("",":T_USER_UPDATED_NAME_STATUS:");
	}	
	
		
	/**
	 * 
	 * updateUserEmail
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function updateUserEmail($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		
		$Controler_Main= Controler_Main::getInstance();
		$ErrorString="";
		$ID = $Request->getAsString("EditUserID");
		$UserFinder= new UserFinder();
		/* TODO: User Email Adress ist einzigartig im System */
		/*
		if(strlen($Request->getAsString("tb_Email")))
		{
			$User=$UserFinder->findByEmail($Request->getAsString("tb_Email"));
			if($User->getId()!=0){$ErrorString.=":T_REGISTER_ERROR7: <br />";}
		}	
		*/	
		if(!strlen($Request->getAsString("tb_Email"))) {$ErrorString.=":T_REGISTER_ERROR5: <br />";}
		/* TODO: 0 Richtige Mailprüfung einbauen !!! */
		if(!$this->isMailCorrect($Request->getAsString("tb_Mail")))
		{
			$ErrorString.=":T_REGISTER_ERROR6: <br />";
		}	
		if(strlen($ErrorString)!=0)
		{
			$this->showUserManagement($ErrorString);
			return false;
		}
		$UserManager= new UserManager();
		$UserManager->updateUserEmailByID($ID,$Request->getAsString("tb_Email"));
		$this->showEditUser("",":T_USER_UPDATED_EMAIL_STATUS:");
	}	
	
		
	/**
	 * 
	 * deleteUserByID
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function deleteUserByID($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}		
		$Request= new Request();
		$UserManager = new UserManager();
		$UGManager = new UGManager();		
		$ID = $Request->getAsString("EditUserID");		
		$UGManager->deleteAllByUserId($ID);		
		$UserManager->deleteUserById($ID);	
		$this->showUserManagement("",":T_USER_DELETED_STATUS:");
	}
		
	
	/**
	 * 
	 * isMailCorrect
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function isMailCorrect($Mail)
	{
		/* TODO: 0 Richtige Mailprüfung einbauen !!! */
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

/*
 * 
 * Gedöns TODO: Mail Adresse checken
 * 
 * 
      
      // kadresse error checking 
      $field = "kadresse";  //Use field name for email
      if(!$subemail || strlen($subemail = trim($subemail)) == 0){
         $form->setError($field, "* Email not entered");
      }
      else{
         // Check if valid email address 
		  
		 
         // Check if valid email address 
         $regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                 ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                 ."\.([a-z]{2,}){1}$";
         if(!eregi($regex,$subemail)){
		 //if((!eregi($regex2,$userName))||(strlen($userName)!=6)||($mailDomain!="htw-dresden.de")) {
            $form->setError($field, "* Email invalid");
            //$form->setError($field, $subpass );
         }         
         $subemail = stripslashes($subemail);
      }
 */
	
		
	/**
	 * 
	 * insertUG
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function insertUG($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}		
		$Request= new Request();
		$ErrorString="";
		$UserGroupID = $Request->getAsString("UserGroupID");
		$UserID = $Request->getAsString("EditUserID");
		$UGFinder = new UGFinder();
		if ($UGFinder->findByUserIdAndGroupId($UserID, $UserGroupID)->getID() != 0 ) return $ErrorString="Fehler";
		$UGManager = new UGManager();
		$UGManager->insertUserIdAndGroupId($UserID, $UserGroupID);
		$this->showEditUser("",":T_USER_GROUP_INSERT_STATUS:");
	}
	
		
	/**
	 * 
	 * deleteUG
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function deleteUG($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}		
		$Request= new Request();
		$ErrorString="";
		$ID = $Request->getAsString("UG_ID");
		$UGManager = new UGManager();
		$UGManager->deleteById($ID);
		$this->showEditUser("",":T_USER_GROUP_DELETE_STATUS:");
	}		
}
?>