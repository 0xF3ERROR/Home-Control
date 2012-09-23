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
					<h1>:T_CONTENT_EDIT:</h1>				
					<div id='Befehle_anzeigen'>
						<div class='gruppenkontainer'>
							<form action='index.php?Section=Menues&amp;Action=updateContentName&amp;ContentID=".$this->ContentID."&amp;MenueID=".$this->MenueID."' name='form' method='POST' target=''>
								<fieldset class='BIM_Group_fieldset'>
									<legend>:T_CONTENT_DATA:</legend>
									<div class='befehlskontainer' >			
										:T_CONTENT_NAME:: <input type='Text' name='tb_ContentName' value='".$this->ContentName."' size='' maxlength='25'>
									</div>											
									<div class='buttonkontainer' >		
										<div class='buttonbar'>	
											<p class='buttonbar_button'><input type='Submit' class='submit' name='btn_GroupUpdate' value=':T_UPDATE:'></p>
											<p class='buttonbar_link'><a href='index.php?Section=Menues&amp;Action=showMenueEdit'>:T_BACK:</a></p>											
										</div>
									</div>								
								</fieldset>
							</form>		
						</div>
					</div>";


include("tpl_Footer.php");
?>


