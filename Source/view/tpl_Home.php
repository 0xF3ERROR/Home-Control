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
				
				
				<h1>Home</h1>
	
				<h5><?php echo $this->User->getUserLevel(); ?> </h5>
				<h5><?php echo $this->Menue->getName(); ?> </h5>
				<h5><?php echo $this->Menue->getID(); ?> </h5>
				
		
			</div>
		</div>
		<div id="m_u_1_sp"></div>
	</div>

<?php

//echo $this->Menu->getContentOutput();

include("tpl_Footer.php");
?>
