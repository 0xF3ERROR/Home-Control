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
					<h1>:T_GROUP_ADD_USERS:: ".$this->Group->getName()."</h1>				
					<div id='Befehle_anzeigen'>
						<div class='gruppenkontainer'>
							<form action='index.php?Section=Groups&amp;Action=updateGroupUseres&amp;GroupID=".$this->GroupId."' name='form' method='POST' target=''>
								<fieldset class='BIM_Group_fieldset'>
									<legend>:T_GROUP_USERS:</legend>";
		
	if ( $this->UserCollection != NULL) 
		{
		foreach($this->UserCollection AS $User)
			{
			//echo $User->getID()," | ",$User->getName(),"<br />";

		echo "					
									<div class='befehlskontainer' >			
										".$User->getID().$User->getName()."
									</div>";			
			}
		}
										
		echo "															
									<div class='buttonkontainer' >		
										<div class='buttonbar'>	
											<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_GroupUpdate' value=':T_UPDATE:'></p>
											<p class='buttonbar_link'><a href='index.php?Section=Groups&amp;Action=GroupManagement'>:T_BACK:</a></p>											
										</div>
									</div>								
								</fieldset>
							</form>		
						</div>
					</div>";


include("tpl_Footer.php");
?>


