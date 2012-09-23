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
				<h1>:T_COMMAND_MANAGEMENT:</h1>				
				<div id='Seitenbeschreibung'>
					<br />
					<p>:T_COMMAND_MANAGEMENT_TXT:</p>
					<br />
					<div class='buttonbar_link'><a href='index.php?Section=Commands&amp;Action=showAddNewCommand'>:T_COMMAND_ADD_NEW:</a></div>
				</div>	
				<div id='Befehle_anzeigen'>
					<div class='gruppenkontainer'>
						<form action='index.php?Section=Contents&amp;Action=updateContentName' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_COMMAND_DATA:</legend>
<?php
	if ( $this->CommandCollection != NULL) 
		{
		foreach($this->CommandCollection AS $Command)
			{
			//echo $Group->getID()," | ",$Group->getName(),"<br />";
			if( $Command->getID() != 0 )
				{
				echo "
								<div class='befehlskontainer' >			
									".$Command->getID()." | 	
									".$Command->getName()." | 
									".$Command->getDevice_ID()." | 	
									".$this->DeviceCollection->getById($Command->getDevice_ID())->getName()." | 
									".$Command->getExecute()." ->  
									".$Command->getData()." 
										<div class='buttonbar_link'>
											<a href='index.php?Section=Commands&amp;Action=showEditCommand&amp;CommandID=".$Command->getID()."'>:T_EDIT:</a>
										</div>	
										<div class='buttonbar_link'>
											<a href='index.php?Section=Commands&amp;Action=deleteCommand&amp;CommandID=".$Command->getID()."' onclick='return confirm(\":T_COMMAND_DELETE_CONFIRM:\");'>:T_DELETE:</a>
										</div>	
								</div>";	
				}	
			}
		}	
?>				
							</fieldset>
						</form>		
					</div>
				</div>
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
	
<?php

include("tpl_Footer.php");
?>

