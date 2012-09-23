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
				<h1>:T_LOGIN_TEXT:</h1>
				<form enctype="multipart/form-data" action="index.php?Section=Login&amp;Action=UserLogin" method="post">
					<table   style="margin:auto;">
						<tr>
							<td>:T_USER_NAME: </td>
							<td colspan="2"><input style="width:95%;" type="text" id="tb_Name" name="tb_Name" value="" size="" maxlength="" /> </td>
						</tr>
						<tr>
							<td>:T_PASSWORD: </td>
							<td colspan="2"><input style="width:95%;" type="password" name="tb_Pass" value="" size="" maxlength=""  /> </td>
						</tr>
						<tr>
							<td> </td>
							<td><input type="submit" name="" value=":T_LOGIN:" /> </td>
							<td> </td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>
<?php
include("tpl_Footer.php");
?>
