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
		
			

/* TODO+++: Browsererkennung
 * Hier sollte der Browser des Besuchers erkannt werden.
 * Interressante Daten w�ren:
 * - Browser-Engine
 * - Browser-Version
 * - Aufl�sung des Anzeigenbereiches
 */
?>
	<div id='middle'>
		<div id='m_o_1_sp'></div>
		<div id='m_m_1_sp'>
			<div id='m_m_1_sp_inhalt' align='center'>

				<H1>:T_START_TEXT:</H1>

			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>

<?php
include("tpl_Footer.php");
?>
