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
				<h1>:T_PASSWORD_CHANGE:</h1> 
				<br />
				<h5><?php echo $this->User->getName(); ?> </h5>	
				<br />    
				<div align="center">
					<form action='index.php?Section=Account&amp;Action=ChangePass' name='form' method='POST' target=''>
						:T_PASSWORD:: <input type='Password' name='tb_Pass' value='' size='' maxlength='25'>
						<br>
						:T_PASSWORD_RETYPE:: <input type='Password' name='tb_PassConfirme' value='' size='' maxlength='25'>
						<br />
						<br />
						<p><input type='Submit' class='submit' name='btn_ChangePass' value=':T_PASSWORD_CHANGE:'></p>
					</form>
				</div>
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php
include("tpl_Footer.php");
?>