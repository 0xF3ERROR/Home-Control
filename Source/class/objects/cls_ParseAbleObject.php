<?php

/**
 * stellt function zum parsen von objekten bereit
 *
 */
class ParseAbleObject
{
	
	protected function parseAll($String)
	{
		$String=$this->parseBadWords($String);
		$String=$this->parseSmile($String);
		$String=$this->parseTabulators($String);
		$String=$this->parseBBCode($String);
		return $String ;
	}
	

	/**
		 * parst bbcod aus den objekten heraus
		 *
		 * @param string $String
		 * @return bool
		 */
	protected function parseBBCode($String)
	{
		
		$String=str_replace("[a]", "<a target=\"_blanke\" href=\"",$String);
		$String=str_replace("[/a]", "\">",$String);
		$String=str_replace("[/1a]", "</a>",$String);
		$String=str_replace("&RR;","'",$String);
		$String=str_replace("[u]", "<u>",$String);
		$String=str_replace("[/u]", "</u>",$String);
		
		$String=str_replace("[img]", "<img style='max-width:650px;width:expression(document.body.clientWidth > 650? \"650px\": \"auto\" );' src=\"",$String);
		$String=str_replace("[/img]", "\"></img>",$String);
		
		$String=str_replace("[b]","<b>",$String);
		$String=str_replace("[/b]","</b>",$String);
		
		$String=str_replace("[h1]","<h1>",$String);
		$String=str_replace("[/h1]","</h1>",$String);
		
		$String=str_replace("[hr]","<h2>",$String);
		$String=str_replace("[/hr]","</h2>",$String);
		
		$String=str_replace("[h2]","<h2>",$String);
		$String=str_replace("[/h2]","</h2>",$String);
		
		$String=str_replace("[h3]","<h3>",$String);
		$String=str_replace("[/h3]","</h3>",$String);
		

		
		$String=$this->parseTubeVids($String);
		
		
		$String=str_replace("[size=+4]",'<font size="+4">',$String);
		$String=str_replace("[size=+3]",'<font size="+3">',$String);
		$String=str_replace("[size=+2]",'<font size="+2">',$String);
		$String=str_replace("[size=+1]",'<font size="+1">',$String);
		$String=str_replace("[size=+0]",'<font size="+0">',$String);
		$String=str_replace("[/size]",'</font>',$String);
		
		$String=str_replace("[color=brown]",'<font color="brown">',$String);
		$String=str_replace("[color=burlywood]",'<font color="burlywood">',$String);
		$String=str_replace("[color=cyan]",'<font color="cyan">',$String);
		$String=str_replace("[color=darkgreen]",'<font color="darkgreen">',$String);
		$String=str_replace("[color=magenta]",'<font color="magenta">',$String);
		$String=str_replace("[color=maroon]",'<font color="maroon">',$String);
		$String=str_replace("[color=olive]",'<font color="olive">',$String);
		$String=str_replace("[color=purple]",'<font color="purple">',$String);
		$String=str_replace("[color=gray]",'<font color="gray">',$String);
		$String=str_replace("[color=silver]",'<font color="silver">',$String);
		$String=str_replace("[color=yellow]",'<font color="yellow">',$String);
		$String=str_replace("[color=white]",'<font color="white">',$String);
		$String=str_replace("[color=green]",'<font color="green">',$String);
		$String=str_replace("[color=black]",'<font color="black">',$String);
		$String=str_replace("[color=red]",'<font color="red">',$String);
		$String=str_replace("[color=blue]",'<font color="blue">',$String);
		$String=str_replace("[/color]",'</font>',$String);
		
		
		$String=str_replace("[font=Courier New]",'<font face="courier new">',$String);
		$String=str_replace("[font=Lucida Sans]",'<font face="lucida sans">',$String);
		$String=str_replace("[font=Times New Roman]",'<font face="times new roman">',$String);
		$String=str_replace("[font=Comic Sans MS]",'<font face="comic sans ms">',$String);
		$String=str_replace("[font=verdana]",'<font face="verdana">',$String);
		$String=str_replace("[font=helvetica]",'<font face="helvetica">',$String);
		$String=str_replace("[font=courier]",'<font face="courier">',$String);
		$String=str_replace("[/font]",'</font>',$String);
		
		$String=str_replace("[i]","<i>",$String);
		$String=str_replace("[/i]","</i>",$String);
		$String=str_replace("[center]","<center>",$String);
		$String=str_replace("[/center]","</center>",$String);
		return $String;
	}
	
	
	protected function parseTubeVids($String)
	{
		if (strpos($String,"[tube]")==false && strpos($String,"[/tube]")==false){return $String;}
// youtube link suchen 
// link einsetzen 
		$Link=substr($String,strpos($String,"[tube]")+6,strpos($String,"[/tube]")-strpos($String,"[tube]")-6);
		
		// link zerhacken weil eine andere url eingefügt werden muss ich hoffe youtube ändert das niemals
		$NewLink=substr($Link,31,strlen($Link)-31);
		$Link="http://www.youtube.com/v/".$NewLink;
		$FirstPart=substr($String,0,strpos($String,"[tube]"));
		$SecendPart=substr($String,strpos($String,"[/tube]")+7,strlen($String)-(strpos($String,"[/tube]")+7));
		return $FirstPart.'<object width="425" height="344"><param name="movie" value="'.$Link.'&hl=de&fs=1&></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'.$Link.'&hl=de&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>'.$SecendPart;
	}
	
	
	

	/**
	 * parst smiles aus dem string heraus
	 *
	 * @param string $Text
	 * @return bool
	 */
	protected  function parseSmile($Text)
	{
		$Text = str_replace(":-)", "<img src='img/smile/1.gif' alt='simle'>", $Text);
		$Text = str_replace(":weis:", "<img src='img/smile/3.gif' alt='simle'>", $Text);
		$Text = str_replace(":crazy:", "<img src='img/smile/4.gif' alt='simle'>", $Text);
		$Text = str_replace(":arsch:", "<img src='img/smile/5.gif' alt='simle'>", $Text);
		$Text = str_replace(":un:", "<img src='img/smile/6.gif' alt='simle'>", $Text);
		$Text = str_replace(":axt:", "<img src='img/smile/7.gif' alt='simle'>", $Text);
		$Text = str_replace(":weisnicht:", "<img src='img/smile/9.gif' alt='simle'>", $Text);
		$Text = str_replace(":teufel:", "<img src='img/smile/10.gif' alt='simle'>", $Text);
		$Text = str_replace(":grun:", "<img src='img/smile/11.gif' alt='simle'>", $Text);
		$Text = str_replace(":wut:", "<img src='img/smile/12.gif' alt='simle'>", $Text);
		$Text = str_replace(":blau:", "<img src='img/smile/13.gif' alt='simle'>", $Text);
		$Text = str_replace(";)", "<img src='img/smile/14.gif' alt='simle'>", $Text);
		$Text = str_replace(":ironi:", "<img src='img/smile/15.gif' alt='simle'>", $Text);
		$Text = str_replace(":mord:", "<img src='img/smile/18.gif' alt='simle'>", $Text);
		$Text = str_replace(":kuss:", "<img src='img/smile/19.gif' alt='simle'>", $Text);
		$Text = str_replace(":krank:", "<img src='img/smile/20.gif' alt='simle'>", $Text);
		$Text = str_replace(":krank2:", "<img src='img/smile/21.gif' alt='simle'>", $Text);
		$Text = str_replace(":lol:", "<img src='img/smile/22.gif' alt='simle'>", $Text);
		$Text = str_replace(":ahnung:", "<img src='img/smile/23.gif' alt='simle'>", $Text);
		$Text = str_replace(":stock:", "<img src='img/smile/24.gif' alt='simle'>", $Text);
		$Text = str_replace(":rubel:", "<img src='img/smile/25.gif' alt='simle'>", $Text);
		$Text = str_replace(":trink:", "<img src='img/smile/26.gif' alt='simle'>", $Text);
		$Text = str_replace(":brille:", "<img src='img/smile/27.gif' alt='simle'>", $Text);
		$Text = str_replace(":rot:", "<img src='img/smile/28.gif' alt='simle'>", $Text);
		$Text = str_replace(":tele:", "<img src='img/smile/29.gif' alt='simle'>", $Text);
		$Text = str_replace(":bier:", "<img src='img/smile/30.gif' alt='simle'>", $Text);
		$Text = str_replace(":komisch:", "<img src='img/smile/31.gif' alt='simle'>", $Text);
		$Text = str_replace(":zwei:", "<img src='img/smile/33.gif' alt='simle'>", $Text);
		$Text = str_replace(":horer:", "<img src='img/smile/34.gif' alt='simle'>", $Text);
		$Text = str_replace(":keule:", "<img src='img/smile/35.gif' alt='simle'>", $Text);
		$Text = str_replace(":lachen:", "<img src='img/smile/37.gif' alt='simle'>", $Text);
		$Text = str_replace(":)", "<img src='img/smile/38.gif' alt='simle'>", $Text);
		return $Text;
	}

	protected function parseTabulators($String)
	{
		$String=str_replace("\r\n","<br />",$String);
		$String=str_replace("\n","<br />",$String); 
		$String=str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$String);
		return $String;
	}

	/**
	 * parst böse worte aus dem string heraus
	 *
	 * @param string $String
	 * @return bool
	 */
	protected function parseBadWords($String)
	{
		$TempArray= explode(",",BAD_WORD);
		foreach ($TempArray as $Argument)
		{
			$Replacestring="";
			for($i=0;$i < strlen($Argument);$i++)
			{
				$Replacestring.="*";
			}
			$String=str_replace($Argument,$Replacestring,$String);
		}
		return $String;
	}
}


?>