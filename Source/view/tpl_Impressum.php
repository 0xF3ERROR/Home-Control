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
				<h1>:T_ABOUT:</h1>
				<br />
				<br />	
				<p> 
					:T_ABOUT_NAME:<br />
					<br />
					:T_ABOUT_ADRESS:<br />
					:T_ABOUT_POSTCODE1:<br /> 
					:T_ABOUT_POSTCODE2:<br /> 
					:T_ABOUT_COUNTRY:<br /> 
					<br />
					:T_ABOUT_TEXT:<br />	
					<br />	
				</p>
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php
include("tpl_Footer.php");
?>
