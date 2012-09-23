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
				<h1>:T_MENUE_MANAGEMENT:</h1>				
				<div id='Seitenbeschreibung'>
					<br />
					<p>:T_MENUE_MANAGEMENT_TXT:</p>
					<br />
					<div class='buttonbar_link'><a href='index.php?Section=Menues&amp;Action=showAddNewMenue'>:T_MENUE_ADD_NEW:</a></div>
				</div>	
				
				
				
<?php

				echo "
					<div id='Befehle_anzeigen'>
						<div class='gruppenkontainer'>
							<form action='index.php?Section=Menues&amp;Action=updateMenue' name='form' method='POST' target=''>
								<fieldset class='BIM_Group_fieldset'>
									<legend>:T_MENUE_LIST_ALL:</legend>";

	if ( $this->MenueCollection != NULL) 
		{
		foreach($this->MenueCollection AS $Menue)
			{
			//echo $Menue->getID()," | ",$Menue->getName(),"<br />"; 
			if ( $Menue->getID() != 0 )
				{
				echo"	
									<div class='befehlskontainer' >			
										:T_MENUE_ID:: ".$Menue->getID()." | 	
										:T_MENUE_NAME:: ".$Menue->getName()." | 		
										:T_MENUE_LEVEL:: ".$Menue->getPosition()."
										<div class='buttonbar_link'>
											<a href='index.php?Section=Menues&amp;Action=showEditMenue&amp;MenueID=".$Menue->getID()."'>:T_EDIT:</a>
										</div>	
										<div class='buttonbar_link'>
											<a href='index.php?Section=Menues&amp;Action=deleteMenue&amp;MenueID=".$Menue->getID()."' onclick='return confirm(\":T_DELETE_CONFIRM:\");'>:T_DELETE:</a>
										</div>	
									</div>";
				}
			}
		}
	echo "													
								</fieldset>
							</form>		
						</div>
					</div>";	
?>

			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php 

include("tpl_Footer.php");
?>
