<?php 

include("tpl_Header.php");

if($this->ErrorString)
	{
	echo "	<div id='ErrorStringContainer'><p>".$this->ErrorString."</p></div>";
	}
if($this->StatusString)
	{
	echo "	<div id='StatusStringContainer' align=center><p>".$this->StatusString."</p></div>";
	}
echo "
	<div id='middle'>
		<div id='m_o_1_sp'></div>
		<div id='m_m_1_sp'>
			<div id='m_m_1_sp_inhalt' align='center'> 
				<h1>:T_USER_GROUP_EDIT:</h1>				
				<div id='Befehle_anzeigen'>	
					<div class='gruppenkontainer'>
						<form action='index.php?Section=UserGroups&amp;Action=updateUserGroup&amp;UserGroupID=".$this->UserGroupId."' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_USER_GROUP_DATA:</legend>
								<div class='befehlskontainer' >			
									:T_GROUP_NAME:: <input type='Text' name='tb_UserGroupName' value='".$this->UserGroup->getName()."' size='' maxlength='25'>
										<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_GroupUpdate' value=':T_UPDATE:'></p>	
								</div>								
							</fieldset>
						</form>		
					</div>";
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
echo "
					<p class='buttonbar_link'><a href='index.php?Section=Devices&amp;Action=DeviceManagement'>:T_BACK:</a></p>
					<div class='gruppenkontainer'>
						<fieldset class='BIM_Group_fieldset'>
							<legend>:T_USER_GROUP_DATA:</legend>";

	$HtmlSelector = "";
	if ( $this->HtmlSelector != NULL ) $HtmlSelector = $this->HtmlSelector;
	else 
		{
		echo"
				<h1>:T_DEVICE_MANAGEMENT:</h1>				
				<div id='Seitenbeschreibung'>
					<br />
					<p>:T_DEVICE_MANAGEMENT_TXT:</p>
					<br />
					<div class='buttonbar_link'><a href='index.php?Section=Devices&amp;Action=showAddNewDevice'>:T_DEVICE_ADD_NEW:</a></div>
				</div>";
		}
	if ( $this->Device != NULL ) echo $this->Device->getHTML( $HtmlSelector );
	if ( $this->DeviceCollection != NULL) 
		{
		foreach($this->DeviceCollection AS $Device)
			{
			echo $Device->getHTML($HtmlSelector);	
			}
		}


echo "
						</fieldset>	
					</div>";
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
echo "
					<p class='buttonbar_link'><a href='index.php?Section=Devices&amp;Action=DeviceManagement'>:T_BACK:</a></p>
				</div>
			</div>
		</div>
		<div id='m_u_1_sp'></div>
	</div>";

include("tpl_Footer.php");
?>




