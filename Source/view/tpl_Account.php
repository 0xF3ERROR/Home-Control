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
				<h1>:T_ACCOUNT:</h1>
				<br />
 				<h5>:T_USER_NAME:: <?php echo $this->User->getName(); ?> </h5>	
				<h5>:T_MAIL::  <?php echo $this->User->getEmail(); ?> </h5>	
				<br />
				<a class="a_whitelink" href="index.php?Section=Account&amp;Action=showChangePass&amp;UI=<?php echo $this->UserId;?>">:T_PASSWORD_CHANGE:</a>
				<br />
				<br />
				<p>Umschaltbares Farblayout der Seite w&auml;re w&uuml;nschenswert</p>
				<br />
				<p>Kontaktformular zum dem(n) Administrator(en) des Systems</p>
				<br />	
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php
include("tpl_Footer.php");
?>
