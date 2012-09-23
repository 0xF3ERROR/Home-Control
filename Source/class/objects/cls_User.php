<?php
class User	implements i_CollectionElement
{
	protected $ID;
	protected $Name;
	protected $Pass;
	protected $Userid;
	protected $Userlevel;
	protected $Email;
	protected $Login;
	protected $Refresh;
	protected $Looked; 
	protected $RegisterDate;
	protected $Premium;
	
	
	public function __construct($ID=0,$Name="None",$Pass="",$Userid="",$Userlevel="",$Email="",$Login="",$Refresh=0,$Looked=0,$RegisterDate="",$Premium="")
	{
		$this->ID=$ID;
		$this->Name=$Name;
		$this->Pass=$Pass;
		$this->Userid=$Userid;
		$this->Userlevel=$Userlevel;
		$this->Email=$Email;
		$this->Login=$Login;
		$this->Refresh=$Refresh;
		$this->Looked=$Looked;
		$this->RegisterDate=$RegisterDate;
		$this->Premium=$Premium;
	}

	
	public static function getEmptyInstance()
	{
		//return new User(0,"","","","",0,0,0,0,0,"","","",0,0);
		return new User(0,"","","",0,"",0,0,0,"",0);
	}


	public function getID()
	{
		return $this->ID;
	}
	public function setID($ID)
	{
		$this->ID=$ID;	
	}
	

	public function getName()
	{
		return $this->Name;
	}
	public function setName($Name)
	{
		$this->Name = $Name;
	}
	

	public function getPass()
	{
		return $this->Pass;
	}
	public function setPass($Pass)
	{
		$this->Pass=$Pass;
	}

	
	public function getUserid()
	{
		return $this->Userid;
	}
	public function setUserid($Userid)
	{
		$this->Userid=$Userid;
	}
	

	public function getUserLevel()
	{
		return $this->Userlevel;
	}
	public function setUserLevel($Userlevel)
	{
		$this->Userlevel=$Userlevel;
	}
	

	public function getEmail()
	{
		return $this->Email;
	}
	public function setEmail($Email)
	{
		$this->Email=$Email;
	}
	

	public function getLogin()
	{
		return $this->Login;
	}
	public function setLogin($Login)
	{
		$this->Login=$Login;
	}
	

	public function getRefresh()
	{
		return $this->Refresh;
	}
	public function setRefresh($Refresh)
	{
		$this->Refresh=$Refresh;
	}
	

	public function getLooked()
	{
		return $this->Looked;
	}
	public function setLooked($Looked)
	{
		$this->Looked=$Looked;
	}
	

	public function getRegisterDate()
	{
		return $this->RegisterDate;
	}
	public function setRegisterDate($RegisterDate)
	{
		$this->RegisterDate=$RegisterDate;
	}
	

	public function getPremium()
	{
		return $this->Premium;
	}
	public function setPremium($Premium)
	{
		$this->Premium=$Premium;
	}
		
	
	/**
	 * gibt an ob der User ein premium User ist oder nicht
	 *
	 * @return bool true ist premium false ist keiner 
	 *
	 */
	public function getPremiumUser()
	{
		if($this->Premium<=USER_PREMIUM_LEVEL)
		{
			return true;	
		}
		return $this->Premium;
	}
	
	
}?>