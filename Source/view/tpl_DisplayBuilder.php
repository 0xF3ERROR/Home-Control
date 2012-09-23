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
							<td><a href='index.php?Section=Groups&amp;Action=GroupManagement'>:T_GROUP_MANAGEMENT:</a></td>
							<td><a href='index.php?Section=Menues&amp;Action=MenueManagement'>:T_MENUE_MANAGEMENT:</a></td>
							<td><a href='index.php?Section=Contents&amp;Action=ContentManagement'>:T_CONTENT_MANAGEMENT:</a></td>
							<td><a href='index.php?Section=Devices&amp;Action=DeviceManagement'>:T_DEVICE_MANAGEMENT:</a></td>
						</tr>
					</table>
				</div>
				<br>
				<h1>:T_DISPLAY_BUILDER:</h1>
				<br />
				<br />
				<br />
				<br />
				<p>Anzeigeoptionen hinzufügen</p>
				<br />
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php
include("tpl_Footer.php");
?>
