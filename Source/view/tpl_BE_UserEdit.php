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
					/*
					<p class='buttonbar_link'><a href='index.php?Section=Users&amp;Action=UserManagement'>:T_BACK:</a></p>
					*/
echo "
	<div id='middle'>
		<div id='m_o_1_sp'></div>
		<div id='m_m_1_sp'>
			<div id='m_m_1_sp_inhalt' align='center'> 
				<h1>:T_USER_EDIT:</h1>				
				<div id='Befehle_anzeigen'>											
					<div class='gruppenkontainer'>
						<form action='index.php?Section=Users&amp;Action=updateUserName&amp;EditUserID=".$this->EditUserID."' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_USER_CHANGE_NAME:</legend>
								<div class='befehlskontainer' >			
									:T_USER_NAME:: <input type='Text' name='tb_Name' value='".$this->Name."' size='' maxlength='50'>
									<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_UserUpdate' value=':T_UPDATE:'></p>
								</div>								
							</fieldset>
						</form>		
					</div>
					<div class='gruppenkontainer'>
						<form action='index.php?Section=Users&amp;Action=updateUserEmail&amp;EditUserID=".$this->EditUserID."' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_USER_CHANGE_EMAIL:</legend>
								<div class='befehlskontainer' >			
									:T_USER_EMAIL:: <input type='Text' name='tb_Email' value='".$this->Email."' size='' maxlength='50'>
									<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_UserUpdate' value=':T_UPDATE:'></p>
								</div>								
							</fieldset>
						</form>		
					</div>
					<div class='gruppenkontainer'>
						<form action='index.php?Section=Users&amp;Action=updateUserPass&amp;EditUserID=".$this->EditUserID."' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_USER_CHANGE_PASSWORD:</legend>
								<div class='befehlskontainer' >			
									:T_USER_PASSWORD:: <input type='Text' name='tb_Pass' value='".$this->Password."' size='' maxlength='50'>
								</div>											
								<div class='befehlskontainer' >			
									:T_USER_PASSWORD_CONFIRM:: <input type='Text' name='tb_PassConfirme' value='".$this->Password."' size='' maxlength='50'>
								</div>								
								<div class='befehlskontainer' >					
									<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_UserUpdate' value=':T_UPDATE:'></p>
									<p class='buttonbar_link'><a href='index.php?Section=Users&amp;Action=getRandomPassword&amp;EditUserID=".$this->EditUserID."'>:T_GET_RANDOM_PASSWORD:</a></p>			
								</div>								
							</fieldset>
						</form>		
					</div>
					<p class='buttonbar_link'><a href='index.php?Section=Users&amp;Action=UserManagement'>:T_BACK:</a></p>											
				</div>";

// UserGroups auflisten

	echo "
				<h1>:T_USER_GROUP_EDIT:</h1>				
				<div id='Befehle_anzeigen'>										
					<div class='gruppenkontainer'>
						<form action='index.php?Section=Users&amp;Action=updateUG&amp;EditUserID=".$this->EditUserID."' name='form' method='POST' target=''>
							<fieldset class='BIM_Group_fieldset'>
								<legend>:T_USER_GROUP_EDIT:</legend>";

	if ( $this->UserGroupCollection != NULL) 
		{
		foreach( $this->UserGroupCollection AS $UserGroup )
			{
			if ( $UserGroup->getID() != 0 )
				{
				$UG = $this->UGCollection->getByUserIdAndGroupId($this->EditUserID,$UserGroup->getID());
				echo "				
								<div class='befehlskontainer' >";			
				if( $UG->getId() != 0)
					{
					echo "
									<input type='CheckBox' name='tb_Dummy' value='1' disabled='true' checked='checked'>
									 ".$UserGroup->getName()."
									<p class='buttonbar_link'><a class='fieldset_link' href='index.php?Section=Users&amp;Action=deleteUG&amp;UG_ID=".$UG->getId()."&amp;EditUserID=".$this->EditUserID."' onclick='return confirm(\":T_USER_DELETE_FROM_GROUP_CONFIRM:\");'>:T_DELETE:</a></p>";
					}
				else
					{
					echo "
									<input type='CheckBox' name='tb_Dummy' value='0' disabled='true'>
									 ".$UserGroup->getName()."
									<p class='buttonbar_link'><a class='fieldset_link' href='index.php?Section=Users&amp;Action=insertUG&amp;UserGroupID=".$UserGroup->getID()."&amp;EditUserID=".$this->EditUserID."'>:T_ADD:</a></p>";
					}
				echo "				
								</div>";	
				}
			}			
		}
echo "							
							</fieldset>
						</form>		
					</div>
					<p class='buttonbar_link'><a href='index.php?Section=Users&amp;Action=UserManagement'>:T_BACK:</a></p>	
				</div>
			</div>
		</div>
		<div id='m_u_1_sp'></div>
	</div>";
include("tpl_Footer.php");
?>


