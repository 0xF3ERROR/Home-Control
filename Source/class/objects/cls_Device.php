<?php
class  Device	implements i_CollectionElement
{
	
	protected $Id;
	protected $Name;
	protected $Typ;
	protected $Version;
	protected $IP;
	protected $Port;
	protected $Status;
	protected $TX;
	protected $RX;
	
	public function __construct($Id=0,$Name="",$Typ="",$Version="",$IP="",$Port=0,$Status=0,$TX="",$RX="")
	{
		$this->Id=$Id;
		$this->Name=$Name;
		$this->Typ=$Typ;
		$this->Version=$Version;
		$this->IP=$IP;
		$this->Port=$Port;
		$this->Status=$Status;
		$this->TX=$TX;
		$this->RX=$RX;
	}

	protected function getDiv($Language,$Name,$Adribut)
	{
		return "<div class='befehlskontainer' >			
										$Language: <input type='Text' name='$Name' value='".$this->getValue($Adribut)."' size='' maxlength='25'>
									</div>";
	}
	
	
	protected function getValue($Atribut)
	{
		switch($Atribut)
		{
			case "Name":
				{
					return $this->Name;
				}break;
			
			default:
			return $this->Id;
		}	
	
	}
	
	
	
	public function getHTML($Action="")
	{
		switch($Action)
		{
			case "showAddNewDevice":
			{
				$Output = "					<h1>:T_DEVICE_ADD_NEW:</h1>	
						<div class='gruppenkontainer'>
							<form action='index.php?Section=Devices&amp;Action=addNewDevice' name='form' method='POST' target=''>
								<fieldset class='BIM_Group_fieldset'>
									<legend>:T_DEVICE_DATA:</legend>
									<div class='befehlskontainer' >			
										:T_DEVICE_NAME:: <input type='Text' name='tb_DeviceName' value='".$this->Name."' size='' maxlength='25'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_TYP:: <input type='Text' name='tb_DeviceTyp' value='".$this->DeviceTyp."' size='' maxlength='25'>
									</div>								
									<div class='befehlskontainer' >
										:T_DEVICE_VERSION:: <input type='Text' name='tb_DeviceVersion' value='".$this->DeviceVersion."' size='' maxlength='25'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_IP:: <input type='Text' name='tb_DeviceIP' value='".$this->DeviceIP."' size='' maxlength='90'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_PORT: <input type='Text' name='tb_DevicePort' value='".$this->DevicePort."' size='' maxlength='90'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_STAT:"; 
				if($this->Status == 1) {
					$Output .= " 										<input type='radio' name='tb_DeviceStatus' value='0' size='' maxlength='90'>
										<input type='radio' name='tb_DeviceStatus' value='1' size='' maxlength='90' checked='checked'>";
				}
				else {
					$Output .= " 										<input type='radio' name='tb_DeviceStatus' value='0' size='' maxlength='90' checked='checked'>
										<input type='radio' name='tb_DeviceStatus' value='1' size='' maxlength='90'>";
				}
				$Output .= "	
									</div>							
									<div class='buttonkontainer' >		
										<div class='buttonbar'>	
											<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_DeviceAdd' value=':T_ADD:'></p>
											<p class='buttonbar_link'><a href='index.php?Section=Devices&amp;Action=DeviceManagement'>:T_BACK:</a></p>											
										</div>
									</div>										
								</fieldset>
							</form>		
					</div>";
				return $Output;			
			}
			case "showEditDevice":
			{
				$Output = "					<h1>:T_DEVICE_EDIT:</h1>
						<div class='gruppenkontainer'>
							<form action='index.php?Section=Devices&amp;Action=updateDevice&amp;tb_DeviceID=".$this->getID()."' name='form' method='POST' target=''>
								<fieldset class='BIM_Group_fieldset'>
									<legend>:T_DEVICE_DATA:</legend>
									<div class='befehlskontainer' >			
										:T_DEVICE_NAME:: <input type='Text' name='tb_DeviceName' value='".$this->Name."' size='' maxlength='25'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_TYP:: <input type='Text' name='tb_DeviceTyp' value='".$this->Typ."' size='' maxlength='25'>
									</div>								
									<div class='befehlskontainer' >
										:T_DEVICE_VERSION:: <input type='Text' name='tb_DeviceVersion' value='".$this->Version."' size='' maxlength='25'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_IP:: <input type='Text' name='tb_DeviceIP' value='".$this->IP."' size='' maxlength='90'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_PORT: <input type='Text' name='tb_DevicePort' value='".$this->Port."' size='' maxlength='90'>
									</div>								
									<div class='befehlskontainer' >									
										:T_DEVICE_STAT:"; 
				if($this->Status == 1) {
					$Output .= " 										<input type='radio' name='tb_DeviceStatus' value='0' size='' maxlength='90'>
										<input type='radio' name='tb_DeviceStatus' value='1' size='' maxlength='90' checked='checked'>";
				}
				else {
					$Output .= " 										<input type='radio' name='tb_DeviceStatus' value='0' size='' maxlength='90' checked='checked'>
										<input type='radio' name='tb_DeviceStatus' value='1' size='' maxlength='90'>";
				}
				$Output .= "	
									</div>							
									<div class='buttonkontainer' >		
										<div class='buttonbar'>	
											<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_DeviceUpdate' value=':T_UPDATE:'></p>
											<p class='buttonbar_link'><a href='index.php?Section=Devices&amp;Action=DeviceManagement'>:T_BACK:</a></p>											
										</div>
									</div>								
								</fieldset>
							</form>		
						</div>";		
				return $Output;			
			}	
			default:
				{
				/*
				 * 
				<br>
				<h1>:T_DEVICE_MANAGEMENT:</h1>
				<br />
				<p>:T_DEVICE_MANAGEMENT_TXT:</p>
				<br />			
				
				<div><a href='index.php?Section=Backend&amp;Action=showAddNewDevice'>:T_DEVICE_ADD_NEW:</a></div>
				
				 */
				 $Output = "					
						<div class='gruppenkontainer'>
							<form action='index.php?Section=Devices&amp;Action=updateDevice' name='form' method='POST' target=''>
								<fieldset class='BIM_Group_fieldset'>
									<legend>:T_DEVICE_DATA:</legend>
									<div class='befehlskontainer' >			
										:T_DEVICE_ID:: ".$this->getID()."
									</div>
									<div class='befehlskontainer' >			
										:T_DEVICE_NAME:: ".$this->getName()."
									</div>
									<div class='befehlskontainer' >			
										:T_DEVICE_TYP:: ".$this->getTyp()."
									</div>
									<div class='befehlskontainer' >			
										:T_DEVICE_VERSION:: ".$this->getVersion()."
									</div>
									<div class='befehlskontainer' >			
										:T_DEVICE_IP:: ".$this->getIP()."
									</div>
									<div class='befehlskontainer' >			
										:T_DEVICE_PORT:: ".$this->getPort()."
									</div>
									<div class='befehlskontainer' >									
										:T_DEVICE_STAT:"; 
				if($this->Status == 1) {
					$Output .= " 										<input type='radio' name='tb_DeviceStatus' value='0' size='' maxlength='90'>
										<input type='radio' name='tb_DeviceStatus' value='1' size='' maxlength='90' checked='checked'>";
				}
				else {
					$Output .= " 										<input type='radio' name='tb_DeviceStatus' value='0' size='' maxlength='90' checked='checked'>
										<input type='radio' name='tb_DeviceStatus' value='1' size='' maxlength='90'>";
				}
				$Output .= "	
									</div>									
									<div class='buttonkontainer' >		
										<div class='buttonbar'>	
											<div class='buttonbar_link'>
												<a href='index.php?Section=Devices&amp;Action=updateDeviceStatus&amp;DeviceID=".$this->getID()."&amp;DeviceStatus=".$this->getStatus()."'>Status: ".$this->getStatus()."</a>
											</div>
											<div class='buttonbar_link'>
												<a href='index.php?Section=Devices&amp;Action=showEditDevice&amp;DeviceID=".$this->getID()."'>:T_EDIT:</a>
											</div>	
											<div class='buttonbar_link'>
												<a href='index.php?Section=Devices&amp;Action=deleteDevice&amp;DeviceID=".$this->getID()."' onclick='return confirm(\":T_DELETE_CONFIRM:\");'>:T_DELETE:</a>
											</div>											
										</div>
									</div>								
								</fieldset>
							</form>		
						</div>";	
				return $Output;	
			}		
		}
	}
	
	/* TODO: Socket Communication */
	public function execute($CommandString="")
	{
		return true;	
	}
	
	
	
	
	
	
	
	public static function getEmptyInstance()
	{
		return new Device(0,"","","","",0,0,"TX","RX");
	}
	
	
	public function getId()
	{
		return $this->Id;
	}	
	public function setId($Id)
	{
		$this->Id=$Id;
	}

	
	public function getName()
	{
		return $this->Name;
	}	
	public function setName($Name)
	{
		$this->Name=$Name;
	}

	
	public function getTyp()
	{
		return $this->Typ;
	}	
	public function setTyp($Typ)
	{
		$this->Typ=$Typ;
	}

	
	public function getVersion()
	{
		return $this->Version;
	}	
	public function setVersion($Version)
	{
		$this->Version=Version;
	}

	
	public function getIP()
	{
		return $this->IP;
	}	
	public function setIP($IP)
	{
		$this->IP=$IP;
	}
		
	
	public function getPort()
	{
		return $this->Port;
	}	
	public function setPort($Port)
	{
		$this->Port=$Port;
	}
		
	
	public function getStatus()
	{
		return $this->Status;
	}	
	public function setStatus($Status)
	{
		$this->Status=$Status;
	}
		
	
	public function getTX()
	{
		return $this->TX;
	}	
	public function setTX($TX)
	{
		$this->TX=$TX;
	}
		
	
	public function getRX()
	{
		return $this->RX;
	}	
	public function setRX($RX)
	{
		$this->RX=$RX;
	}

}	
?>