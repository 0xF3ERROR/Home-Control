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
				<h1>:T_SYSTEM_STATE:</h1>				
				<div id='Seitenbeschreibung'>
					<br />
					<p>:T_SYSTEM_STATE_TXT:</p>
					<br />
					<div class='buttonbar_link'><a href='index.php?Section=Users&amp;Action=showAddNewUser'>:T_USER_ADD_NEW:</a></div>
					<div class='buttonbar_link'><a href='index.php?Section=UserGroups&amp;Action=showAddNewUserGroup'>:T_GROUP_ADD_NEW:</a></div>
					<div class='buttonbar_link'><a href='index.php?Section=Menues&amp;Action=showAddNewMenue'>:T_MENUE_ADD_NEW:</a></div>
				</div>	
				
				<div id='Befehle_anzeigen'>
					<div class='gruppenkontainer'>
						<fieldset class='BIM_Group_fieldset'>
							<legend>:T_SYSTEM_INFORMATION:</legend>				
							<div class='befehlskontainer' >	
								:T_SERVER_VERSION:: <?php echo SYSTEM_VERSION; ?>
							</div>	
						</fieldset>	
					</div>	
					<div class='gruppenkontainer'>	
						<fieldset class='BIM_Group_fieldset'>
							<legend>:T_SYSTEM_WEBSERVER_CONFIGURATION:</legend>
							<?php echo $this->WebserverConfig; ?>	
						</fieldset>		
					</div>	
					<div class='gruppenkontainer'>										
						<fieldset class='BIM_Group_fieldset'>
							<legend>:T_SYSTEM_WEBSERVER_VERSION:</legend>
							<?php echo $this->WebserverVersion; ?>	
						</fieldset>	
					</div>	
					<div class='gruppenkontainer'>									
						<fieldset class='BIM_Group_fieldset'>
							<legend>:T_SYSTEM_DATABASE_INFORMATION:</legend>
							<div class='befehlskontainer' >	
								MySql-Version: <?php echo $this->MySqlVersion; ?>	
							</div>	
							<div class='befehlskontainer' >	
								MySql-Host: <?php echo $this->MySqlHostInfo; ?>	
							</div>	
							<div class='befehlskontainer' >	
								MySql-Protocol: <?php echo $this->MySqlProtInfo; ?>	
							</div>	
							<div class='befehlskontainer' >	
								MySql-Client: <?php echo $this->MySqlClientInfo; ?>	
							</div>	
						</fieldset>	
					</div>	
					<div class='gruppenkontainer'>	
						<fieldset class='BIM_Group_fieldset'>
							<legend>:T_SYSTEM_INFORMATION:</legend>
							<div class='befehlskontainer' >									
								<h5>:T_USER_NAME:: <?php echo $this->User->getName(); ?> </h5>	
								<h5>:T_MAIL::  <?php echo $this->User->getEmail(); ?> </h5>									
							</div>	
						</fieldset>	
					</div>	
				</div>					
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php
include("tpl_Footer.php");
?>
