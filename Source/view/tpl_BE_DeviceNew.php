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
				<h1>:T_DEVICE_ADD:</h1>				
				<div id='Befehle_anzeigen'>
					<div class='gruppenkontainer'>
						<form action='index.php?Section=Devices&amp;Action=addNewDevice' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_DEVICE_DATA:</legend>
								<div class='befehlskontainer' >			
									:T_DEVICE_NAME:: <input type='Text' name='tb_DeviceName' value='' size='' maxlength='25'>
								</div>								
								<div class='buttonkontainer' >		
									<div class='buttonbar'>	
										<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_UserGroupAdd' value=':T_ADD:'></p>
										<p class='buttonbar_link'><a href='index.php?Section=Devices&amp;Action=DeviceManagement'>:T_BACK:</a></p>											
									</div>
								</div>										
							</fieldset>
						</form>		
					</div>";






echo "
				</div>		
			</div>
		</div>
		<div id='m_u_1_sp'></div>
	</div>";
include("tpl_Footer.php");
?>
