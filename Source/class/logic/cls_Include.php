<?php

function __autoload($Class)
{
	$BasicInclueConst =  Basic_include_const::getInstance();
	if (isset($BasicInclueConst->PathArray[$Class]) && file_exists($BasicInclueConst->PathArray[$Class]))
	{
		try {
			require_once($BasicInclueConst->PathArray[$Class]);	
			}
			catch (Exception $e)
			{
			echo "datei konnte nicht gefunden werden ". $Class."<br />der name der Klasse";
			}	
	}else 
	{
		echo "ein include Datei wurde nicht gefunden ". $Class."<br />der name der Klasse";
		
		
		
		//var_dump($BasicInclueConst);
		
		
		
		//die();
	}

}


 class  Basic_include_const
{
	
	
	public $PathArray=null;
    private static $Instance=null;
	
	
	
	private function __construct()
	{
		$this->createPathArray();
	}
	
	public static function getInstance()
	{
		{
			if(self::$Instance === NULL)
			{
				self::$Instance = new Basic_include_const;
			}

			return self::$Instance;
		}
	}
		
	private function createPathArray()
	{
		$this->PathArray['i_CollectionElement']='class/objects/i_CollectionElements.php';
		$this->PathArray['Request']='class/logic/cls_Request.php';
	 	$this->PathArray['MySqlExeption']='class/db/cls_mysql_exeption.php';
		$this->PathArray['MySqldb']='class/db/cls_mysql.php';
		#region Controler Objekte

		$this->PathArray['Controler_Start']='class/logic/cls_Controler_Start.php';
		$this->PathArray['Controler_Login']='class/logic/cls_Controler_Login.php';
		$this->PathArray['Controler_Main']='class/logic/cls_Controler_Main.php';
		
		
		
		
		
		
		//$this->PathArray['Controler_Download']='class/logic/cls_Controler_Download.php';
		//$this->PathArray['Controler_Music']='class/logic/cls_Controler_Music.php';
		//$this->PathArray['Controler_Picture']='class/logic/cls_Controler_Picture.php';
		
		
		$this->PathArray['Logger']='class/objects/cls_Logger.php';
		
		
		$this->PathArray['Image']='class/objects/cls_Image.php';
		
		#endregion

		//$this->PathArray['PictureManager']='class/DatabaseObjects/cls_PictureManager.php';
		//$this->PathArray['PictureFinder']='class/DatabaseObjects/cls_PictureFinder.php';
		//$this->PathArray['Picture']='class/objects/cls_Picture.php'; 
		//$this->PathArray['PictureCollection']='class/objects/cls_PictureCollection.php';
		$this->PathArray['SystemFinder']='class/DatabaseObjects/cls_SystemFinder.php'; 

		$this->PathArray['SystemManager']='class/DatabaseObjects/cls_SystemManager.php';
		$this->PathArray['Collection']='class/objects/cls_AbstractCollection.php'; 
		$this->PathArray['ParseAbleObject']='class/objects/cls_ParseAbleObject.php'; //parse object
		
		$this->PathArray['Template']='class/objects/cls_Template.php'; 
		$this->PathArray['Date']='class/objects/cls_Date.php';
		
		$this->PathArray['Convert']='class/objects/cls_Convert.php';
		

		//$this->PathArray['Comment']='class/objects/cls_Comment.php';
		//$this->PathArray['CommentCollection']='class/objects/cls_CommntCollection.php';
		//$this->PathArray['CommentFinder']='class/DatabaseObjects/cls_CommentFinder.php';
		//$this->PathArray['CommentManager']='class/DatabaseObjects/cls_CommentManager.php';
		
		$this->PathArray['DataManager']='class/DatabaseObjects/cls_DataManager.php';
		//$this->PathArray['DataFinder']='class/DatabaseObjects/cls_DataFinder.php';
		

		//$this->PathArray['Gallery']='class/objects/cls_Gallery.php';
		//$this->PathArray['GalleryCollection']='class/objects/cls_GalleryCollection.php';
		//$this->PathArray['GalleryFinder']='class/DatabaseObjects/cls_GalleryFinder.php';
		//$this->PathArray['GalleryManager']='class/DatabaseObjects/cls_GalleryManager.php';
		
		# Mailer
		//$this->PathArray['User']='class/logic/cls_Mailer.php';
		
		# HomeControl_start
		$this->PathArray['Controler_Home']='class/logic/cls_Controler_Home.php';
		$this->PathArray['Controler_Account']='class/logic/cls_Controler_Account.php';
		$this->PathArray['Controler_Backend']='class/logic/cls_Controler_Backend.php';	
		
		
		# User Manager
		$this->PathArray['Controler_Users']='class/logic/cls_Controler_Users.php';
		$this->PathArray['User']='class/objects/cls_User.php';
		$this->PathArray['UserCollection']='class/objects/cls_UserCollection.php';
		$this->PathArray['UserFinder']='class/DatabaseObjects/cls_UserFinder.php';
		$this->PathArray['UserManager']='class/DatabaseObjects/cls_UserManager.php';
		
		# UG		
		$this->PathArray['UG']='class/objects/cls_UG.php';
		$this->PathArray['UGCollection']='class/objects/cls_UGCollection.php';
		$this->PathArray['UGFinder']='class/DatabaseObjects/cls_UGFinder.php';
		$this->PathArray['UGManager']='class/DatabaseObjects/cls_UGManager.php';	
		
		# Right		
		$this->PathArray['Right']='class/objects/cls_Right.php';
		$this->PathArray['RightCollection']='class/objects/cls_RightCollection.php';
		$this->PathArray['RightFinder']='class/DatabaseObjects/cls_RightFinder.php';
		$this->PathArray['RightManager']='class/DatabaseObjects/cls_RightManager.php';	
		
		# User Group Manager
		$this->PathArray['Controler_UserGroups']='class/logic/cls_Controler_UserGroups.php';
		$this->PathArray['UserGroup']='class/objects/cls_UserGroup.php';
		$this->PathArray['UserGroupCollection']='class/objects/cls_UserGroupCollection.php';
		$this->PathArray['UserGroupFinder']='class/DatabaseObjects/cls_UserGroupFinder.php';
		$this->PathArray['UserGroupManager']='class/DatabaseObjects/cls_UserGroupManager.php';	
		
		# Menue Manager
		$this->PathArray['Controler_Menues']='class/logic/cls_Controler_Menues.php';
		$this->PathArray['Menue']='class/objects/cls_Menue.php';
		$this->PathArray['MenueBuilder']='class/objects/cls_MenueBuilder.php';
		$this->PathArray['MenueCollection']='class/objects/cls_MenueCollection.php';
		$this->PathArray['MenueFinder']='class/DatabaseObjects/cls_MenueFinder.php';
		$this->PathArray['MenueManager']='class/DatabaseObjects/cls_MenueManager.php';
					
		# Content
		$this->PathArray['Content']='class/objects/cls_Content.php';
		$this->PathArray['ContentCollection']='class/objects/cls_ContentCollection.php';
		$this->PathArray['ContentFinder']='class/DatabaseObjects/cls_ContentFinder.php';
		$this->PathArray['ContentManager']='class/DatabaseObjects/cls_ContentManager.php';
		
		# ContentGroup
		$this->PathArray['ContentGroup']='class/objects/cls_ContentGroup.php';
		$this->PathArray['ContentGroupCollection']='class/objects/cls_ContentGroupCollection.php';
		$this->PathArray['ContentGroupFinder']='class/DatabaseObjects/cls_ContentGroupFinder.php';
		$this->PathArray['ContentGroupManager']='class/DatabaseObjects/cls_ContentGroupManager.php';
			
		# Command Manager
		$this->PathArray['Controler_Commands']='class/logic/cls_Controler_Commands.php';
		$this->PathArray['Command']='class/objects/cls_Command.php';
		$this->PathArray['CommandCollection']='class/objects/cls_CommandCollection.php';
		$this->PathArray['CommandFinder']='class/DatabaseObjects/cls_CommandFinder.php';
		$this->PathArray['CommandManager']='class/DatabaseObjects/cls_CommandManager.php';
			
		# View
		$this->PathArray['View']='class/objects/cls_View.php';
		$this->PathArray['ViewCollection']='class/objects/cls_ViewCollection.php';
		$this->PathArray['ViewFinder']='class/DatabaseObjects/cls_ViewFinder.php';
		$this->PathArray['ViewManager']='class/DatabaseObjects/cls_ViewManager.php';	
		
		# Device Manager
		$this->PathArray['Controler_Devices']='class/logic/cls_Controler_Devices.php';
		$this->PathArray['Device']='class/objects/cls_Device.php';
		$this->PathArray['DeviceCollection']='class/objects/cls_DeviceCollection.php';
		$this->PathArray['DeviceFinder']='class/DatabaseObjects/cls_DeviceFinder.php';
		$this->PathArray['DeviceManager']='class/DatabaseObjects/cls_DeviceManager.php';
		
		
		
		# System Information		
		#$this->PathArray['SystemInformationFinder']='class/DatabaseObjects/cls_SystemInformationFinder.php';
		
		#Devices 
		#$this->PathArray['USBForAll']='class/objects/devices/cls_USBforAll.php';
		$this->includeDevices();
		
		# HomeControl_end
	}	
	
	public function includeDevices()
	{
		$DeviceInclidePath = "class/objects/devices";
		//$scan_device_templates = scandir("class/objects/devices");
		$scan_device_templates = scandir($DeviceInclidePath);		
		sort($scan_device_templates);
		foreach($scan_device_templates AS $device_template)
			{
			// Test auf Typ 
			if (!in_array(substr($device_template, -3, 3), array('..','.','thumbs.db','Thumbs.db' )))
				{
				//include(Device_Template_Path."/".$device_template."/".$device_template.".php");
				$this->PathArray[$device_template]='class/objects/devices/'.$device_template.'/cls_'.$device_template.'.php';
				}
			}
	}
	
	
}

?>