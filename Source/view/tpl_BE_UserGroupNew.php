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
				<h1>:T_GROUP_ADD:</h1>				
				<div id='Befehle_anzeigen'>
					<div class='gruppenkontainer'>
						<form action='index.php?Section=UserGroups&amp;Action=addNewUserGroup' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_GROUP_DATA:</legend>
								<div class='befehlskontainer' >			
									:T_GROUP_NAME:: <input type='Text' name='tb_UserGroupName' value='' size='' maxlength='25'>
								</div>								
								<div class='buttonkontainer' >		
									<div class='buttonbar'>	
										<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_UserGroupAdd' value=':T_ADD:'></p>
										<p class='buttonbar_link'><a href='index.php?Section=UserGroups&amp;Action=UserGroupManagement'>:T_BACK:</a></p>											
									</div>
								</div>										
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
