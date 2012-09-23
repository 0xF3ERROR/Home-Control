<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->Title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Content-Language" content="de" />
<meta name="author" content="<?php echo $this->Author?>" />
<meta name="KeyWords" content="<?php echo $this->KeyWords?>" />
<meta name="Description" content="<?php echo $this->Description?>" />

<script src="js/main_menue.js" type="text/javascript"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="/img/favicon.ico" type="image/ico" />

</head>
<body>
<div id="wrapper">
	<div id="head">
		<div id="logo"></div>
		<div id="nav">		
			<div id="tab">
				<table border="0" cellpadding="0" cellspacing="0"  >
					<tr>							    
<?php	
	if(Controler_Main::getInstance()->isUserLoggedIn())	
	{
?>			
						<td valign="top">
							<a href="index.php?Section=Home&amp;Action=Homescreen"
							onmouseover="Bildwechsel(0, Highlight1)"
							onmouseout="Bildwechsel(0, Normal1)">
							<img src="img/button1_home.png" width="139" height="45" alt=":T_HOME:" />
							</a><br />
						</td>
						<td valign="top">
							<a href="index.php?Section=Account&amp;Action=ShowAccountData"
							onmouseover="Bildwechsel(1, Highlight2)"
							onmouseout="Bildwechsel(1, Normal2)">
							<img src="img/button1_account.png" width="139" height="45" alt=":T_ACCOUNT:" />
							</a><br />
						</td>
						<td valign="top">
							<a href="index.php?Section=Login&amp;Action=Logout"
							onmouseover="Bildwechsel(2, Highlight3)"
							onmouseout="Bildwechsel(2, Normal3)">
							<img src="img/button1_logout.png" width="139" height="45" alt=":T_LOGOUT:" />
							</a><br />
						</td>
<?php 
	if( $this->User->getUserLevel() >= BACKEND_USERLEVEL ) 
		{ 
?>
						<td valign="top">
							<a class="a_mainmenu" href="index.php?Section=Backend"
							onmouseover="Bildwechsel(3, Highlight4)"
							onmouseout="Bildwechsel(3, Normal4)">
							<img src="img/button1_backend.png" width="139" height="45" alt=":T_BACKEND:" />
							</a><br />
						</td>
<?php 		
		}
	/* TODO++++: Hilfemenü einbauen -> :T_HELP: */
	}	
	else
	{
?>
						<td valign="top">
							<a href="index.php?Section=Login"
							onmouseover="Bildwechsel(0, Highlight5)"
							onmouseout="Bildwechsel(0, Normal5)">
							<img src="images/button1_login.png" width="139" height="45" alt=":T_LOGIN:" />
							</a><br />
						</td>							
<?php 
	}
?>
					</tr>
				</table>
			</div>
		</div> 		
	</div>			
	<!--- Header End -->