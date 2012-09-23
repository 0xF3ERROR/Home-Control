<?php
/**
 * class cls_Controler_Groups
 *
 * Description for class cls_Controler_Groups
 *
 * @author:
*/
class Controler_UserGroups  
{
	/**
	 * cls_Controler_Groups constructor
	 *
	 * @param 
	 */
	function __construct() {

	}
		
	
	public function start()	{
		$Request= new Request();
		switch($Request->getAsString('Action'))
			{					
			case "UserGroupManagement":
				{
				$this->showUserGroupManagement();
				}break;				
				
			case "showAddNewUserGroup":
				{
				$this->showAddNewUserGroup();
				}break;
				
			case "addNewUserGroup":
				{
				$this->addNewUserGroup();
				}break;			
				
			case "showEditUserGroup":
				{
				$this->showEditUserGroup();
				}break;		
				
			case "showEditGroupUsers":
				{
				$this->showEditGroupUsers();
				}break;
				
			case "updateUserGroup":
				{
				$this->updateUserGroupName();
				}break;	
											
			case "deleteUserGroup":
				{
				$this->deleteUserUserGroup();
				}break;
				
			case "insertRightRead":
				{
				$this->insertRightRead();
				}break;	
				
			case "insertRightWrite":
				{
				$this->insertRightWrite();
				}break;	
				
			case "deleteRightWrite":
				{
				$this->deleteRightWrite();
				}break;	
				
			case "deleteRights":
				{
				$this->deleteRights();
				}break;	
			
			default:
				$this->showUserGroupManagement();
			}
	}
	
		
	/**
	 * 
	 * showUserGroupManagement
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */
	public function showUserGroupManagement($ErrorString="",$StatusString="")
		{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}
		$Request= new Request();
		$UserGroupFinder= new UserGroupFinder();
		$UserGroupCollection = $UserGroupFinder->findAll();
		$Template=Template::getInstance("tpl_BE_UserGroupManager.php");  	
		$Template->assign("UserGroupCollection",$UserGroupCollection);
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
		}
		
		
	/**
	 * 
	 * showAddNewUserGroup
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */
	public function showAddNewUserGroup($ErrorString="",$StatusString="")
		{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}
		$Request= new Request();
		$Template=Template::getInstance("tpl_BE_UserGroupNew.php");  
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
		}
		
	
	/**
	 * 
	 * addNewUserGroup
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */
	public function addNewUserGroup($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		$ErrorString="";
		$StatusString="";
		$UserGroupFinder= new UserGroupFinder();		
		$Controler_Main= Controler_Main::getInstance();
		if(strlen($Request->getAsString("tb_UserGroupName"))<3){$ErrorString.=":T_GROUP_ERROR1:";}
		if(strlen($Request->getAsString("tb_UserGroupName")))
		{
			$UserGroup=$UserGroupFinder->findByName($Request->getAsString("tb_UserGroupName"));
			if($UserGroup->getId()!=0){$ErrorString.=":T_GROUP_ERROR2:";}
		}					
		if(strlen($ErrorString)!=0)
		{
			$this->showAddNewUserGroup($ErrorString, $StatusString);
			return false;
		}
		$UserGroupManager= new UserGroupManager();
		$UserGroup = $Request->getAsString("tb_UserGroupName");
		$UserGroupManager->insert($UserGroup);
		$this->showUserGroupManagement("",":T_USER_GROUP_INSERTED_STATUS:");
	}	

	
	/**
	 * 
	 * showEditUserGroup
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */
	public function showEditUserGroup($ErrorString="",$StatusString="")
		{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}
		$Request= new Request();
		$UserGroupID = $Request->getAsInt("UserGroupID");
		$UserGroup = UserGroup::getEmptyInstance();
		$UserGroupFinder = new UserGroupFinder();
		$UserGroup = $UserGroupFinder->findById($UserGroupID);
		$CommandFinder = new CommandFinder();
		$CommandCollection = $CommandFinder->findAll();
		$RightFinder = new RightFinder();
		$RightCollection = $RightFinder->findByUserGroupId($UserGroupID);
		$Template=Template::getInstance("tpl_BE_UserGroupEdit.php");  
		$Template->assign("CommandCollection",$CommandCollection);		
		$Template->assign("RightCollection",$RightCollection);
		$Template->assign("UserGroup",$UserGroup);
		$Template->assign("UserGroupId",$UserGroupID);
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
		}
		
		
	/**
	 * 
	 * updateUserGroup
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */
	public function updateUserGroupName($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		$ErrorString="";
		$StatusString="";
		$UserGroupFinder= new UserGroupFinder();		
		$Controler_Main= Controler_Main::getInstance();
		if(strlen($Request->getAsString("tb_UserGroupName"))<3){$ErrorString.=":T_USER_GROUP_ERROR1:";}
		if(strlen($Request->getAsString("tb_UserGroupName")))
		{
			$UserGroup=$UserGroupFinder->findByName($Request->getAsString("tb_UserGroupName"));
			if($UserGroup->getId()!=0){$ErrorString.=":T_USER_GROUP_ERROR2:";}
		}					
		if(strlen($ErrorString)!=0)
		{
			$this->showEditUserGroup($ErrorString, $StatusString);
			return false;
		}		
		$UserGroupManager= new UserGroupManager();
		$UserGroupName = $Request->getAsString("tb_UserGroupName");	
		$UserGroupID = $Request->getAsString("UserGroupID");
		if ( $UserGroupManager->updateByID($UserGroupID,$UserGroupName) ) $this->showEditUserGroup("",":T_USER_GROUP_NAME_UPDATED_STATUS:");
		else $this->showEditUserGroup(":T_USER_GROUP_NAME_UPDATED_ERROR:");
	}	
	
	/**
	 * 
	 * showEditGroupUsers
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function showEditGroupUsers($ErrorString="",$StatusString="")
		{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
			{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
			}
		$Request= new Request();
		$ID = $Request->getAsInt("UserGroupID");
		$UserGroup = UserGroup::getEmptyInstance();
		$UserGroupFinder = new UserGroupFinder();
		$UserGroup = $UserGroupFinder->findById($ID);
		$UserFinder = new UserUserFinder();
		$UserCollection = $UserFinder->findAll();	
		$Template=Template::getInstance("tpl_BE_GroupUsers.php");  
		$Template->assign("UserGroup",$UserGroup);
		$Template->assign("UserCollection",$UserCollection);
		$Template->assign("GroupId",$ID);
		$Template->assign("ErrorString",$ErrorString);
		$Template->assign("StatusString",$StatusString);
		$Template->render();
		}
		
		
	/**
	 * 
	 * updateGroupUsers
	 *
	 * @param String $ErrorString
	 * @param String $StatusString
	 */
	public function updateGroupUsers($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request= new Request();
		$ErrorString="";
		$StatusString="";
		$UserGroupFinder= new UserGroupFinder();		
		$Controler_Main= Controler_Main::getInstance();
		if(strlen($Request->getAsString("tb_UserGroupName"))<3){$ErrorString.=":T_USER_GROUP_ERROR1:";}
		if(strlen($Request->getAsString("tb_UserGroupName")))
		{
			$UserGroup=$UserGroupFinder->findByName($Request->getAsString("tb_UserGroupName"));
			if($Group->getId()!=0){$ErrorString.=":T_USER_GROUP_ERROR2:";}
		}					
		if(strlen($ErrorString)!=0)
		{
			$this->showEditGroup($ErrorString, $StatusString);
			return false;
		}
		$UserGroup= new UserGroup();
		$UserGroupManager= new UserGroupManager();
		$UserGroup = $Request->getAsString("tb_UserGroupName");
		$UserGroupID = $Request->getAsString("UserGroupID");
		$this->showEditUserGroup("",":T_USER_GROUP_UPDATED_STATUS:");
	}	
	
	
	/**
	 * 
	 * 	deleteUserUserGroup
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function deleteUserUserGroup($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request = new Request();
		$ID=$Request->getAsInt("UserGroupID");
		/* TODO: Verknüpfungen auch löschen !! */
		$UserGroupManager = new UserGroupManager();
		if($UserGroupManager->deleteById($ID)) $this->showUserGroupManagement("",":T_USER_GROUP_DELETE_STATUS:");
		else $this->showUserGroupManagement(":T_USER_GROUP_DELETE_ERROR:");
	}
	
	
	/**
	 * 
	 * 	insertRightRead
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function insertRightRead($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request = new Request();
		$CommandID=$Request->getAsInt("CommandID");
		$RightID=$Request->getAsInt("RightID");
		$UserGroupId=$Request->getAsInt("UserGroupID");		
		$RightFinder = new RightFinder();			
		$RightManager = new RightManager();			
		if($RightID == 0) { $RightManager->insertAll( $UserGroupId, $CommandID, true, false ); }	
		else { $RightManager->updateWriteById( $RightID,false ); }		
		$this->showEditUserGroup("",":T_USER_GROUP_INSERT_READ_STATUS:");
	}
	

	/**
	 * 
	 *  insertRightWrite
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function insertRightWrite($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request = new Request();
		$CommandID=$Request->getAsInt("CommandID");
		$RightID=$Request->getAsInt("RightID");
		$UserGroupId=$Request->getAsInt("UserGroupID");		
		$RightManager = new RightManager();		
		if($RightID == 0) {	$RightManager->insertAll( $UserGroupId, $CommandID, true, true ); }	
		else { $RightManager->updateWriteById($RightID,true ); }			
		$this->showEditUserGroup("",":T_USER_GROUP_INSERT_WRITE_STATUS:");
	}

	
	/**
	 * 
	 * 	deleteRightWrite
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function deleteRightWrite($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request = new Request();
		$CommandID=$Request->getAsInt("CommandID");
		$RightID=$Request->getAsInt("RightID");
		$UserGroupId=$Request->getAsInt("UserGroupID");	
		$RightManager = new RightManager();
		$RightManager->updateWriteById($RightID,false);	
		$this->showEditUserGroup("",":T_USER_GROUP_DELETE_WRITE_STATUS:");
	}
	
	
	/**
	 * 
	 * 	deleteRights
	 * 
	 * @param String $ErrorString
	 * @param String $StatusString
	 */	
	public function deleteRights($ErrorString="",$StatusString="")
	{
		if( Controler_Main::getInstance()->getUserLevel() < BACKEND_USERLEVEL )
		{
			$ControlerStart= new Controler_Start();
			$ControlerStart->start();
			return false;
		}
		$Request = new Request();
		$CommandID=$Request->getAsInt("CommandID");
		$RightID=$Request->getAsInt("RightID");
		$UserGroupId=$Request->getAsInt("UserGroupID");	
		$RightManager = new RightManager();
		$RightManager->deleteById($RightID);	
		$this->showEditUserGroup("",":T_USER_GROUP_DELETE_RIGHTS_STATUS:");
	}	
}
?>