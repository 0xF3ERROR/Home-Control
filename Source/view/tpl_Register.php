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
  

<h1>Neuen Home-Control Account Registrieren</h1> 

<?php
if($this->ErrorString)
{
	echo"<h3 style='color:red'>".$this->ErrorString."</h3>";
}
?>
<div align="center">
<form action='index.php?Section=Login&amp;Action=Register' name='form' method='POST' target=''>
Accountnamen angeben:	 <br />
<input type='Text' name='tb_Name' value='<?php echo $this->Name; ?>' size='' maxlength='25'><br>
Passwort:  <br />
<input type='Password' name='tb_Pass' value='' size='' maxlength='25'><br>
Passwort wiederholen:    <br />
<input type='Password' name='tb_PassConfirme' value='' size='' maxlength='25'><br>
Mail:<br />
<br><input type='Text' name='tb_Mail' value='<?php echo $this->MyMail; ?>' size='' maxlength='90'><br>
Mail wiederholen:
<br><input type='Text' name='tb_MailConfirme' value='<?php echo $this->MyMail; ?>' size='' maxlength='90'><br>



 <p>Im Uhrzeigersin lesen</p>
<img height="250" width="250" src="index.php?Section=Login&Action=GetCaptcha">	
<br>Sicherheitscode

<input type='Text' name='tb_Captcha' value='' size='' maxlength='90'><br>
 <a href="index.php?Section=AGB" class="a_whitelink" target="_blank">AGB</a>
 <br />
 <br />
 <br />
<p><input type='Submit' class='submit' name='btn_Register' value='Registrieren'></p>
</form>
<br />
<br />
<a href="index.php">Zur&uuml;ck</a>

</div>

			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php
include("tpl_Footer.php");
?>
