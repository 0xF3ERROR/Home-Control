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
?>
	<div id='middle'>
		<div id='m_o_1_sp'></div>
		<div id='m_m_1_sp'>
			<div id='m_m_1_sp_inhalt' align='center'>
				<div id="displayLinks">
					<table id="main_menue_nav" align="center" >
						<tr>
							<td><a href='index.php?Section=Backend&amp;Action=SystemStatus'>:T_SYSTEM_STATE:</a></td>
							<td><a href='index.php?Section=Users&amp;Action=UserManagement'>:T_USER_MANAGEMENT:</a></td>
							<td><a href='index.php?Section=UserGroups&amp;Action=UserGroupManagement'>:T_GROUP_MANAGEMENT:</a></td>
							<td><a href='index.php?Section=Menues&amp;Action=MenueManagement'>:T_MENUE_MANAGEMENT:</a></td>
							<td><a href='index.php?Section=Commands&amp;Action=CommandManagement'>:T_COMMAND_MANAGEMENT:</a></td>
							<td><a href='index.php?Section=Devices&amp;Action=DeviceManagement'>:T_DEVICE_MANAGEMENT:</a></td>
						</tr>
					</table>
				</div>		
				<br />	
				<h1>:T_DEVICE_MANAGEMENT:</h1>				
				<div id='Seitenbeschreibung'>
					<br />
					<p>:T_DEVICE_MANAGEMENT_TXT:</p>
				</div>
				<div id='Befehle_anzeigen'>					
<?php

	$HtmlSelector = "";
	if ( $this->HtmlSelector != NULL ) $HtmlSelector = $this->HtmlSelector;
	else 
		{
		echo"
					<div class='gruppenkontainer'>
						<form action='index.php?Section=Devices&amp;Action=showAddNewDevice' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_DEVICE_ADD_NEW:</legend>	
								<div class='buttonkontainer' >
									<div class='buttonbar'>";	
/* TODO: Liste der vorhandenen Device Templates anzeigen ---  class XXXXXX extends Device   */
		$counter = 0;
		foreach ( $this->DeviceTemplates AS $DeviceTemplate )
			{		
			if ( !($counter%7) )	echo "
									</div>
									<div class='buttonbar'>";
		
			echo "	
										<p class='buttonbar_button'><input type='Submit' class='submit' name='DeviceTyp' value='".$DeviceTemplate."'></p>";
			$counter++;
			}					
		echo "							
									</div>
								</div>
							</fieldset>
						</form>
					</div>";
		
		}
	if ( $this->Device != NULL ) echo $this->Device->getHTML( $HtmlSelector );
	if ( $this->DeviceCollection != NULL) 
		{
		foreach($this->DeviceCollection AS $Device)
			{
			if ($Device->getID() != 0) echo $Device->getHTML($HtmlSelector);	
			}
		}
?>

				</div>
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php 
include("tpl_Footer.php");
?>

