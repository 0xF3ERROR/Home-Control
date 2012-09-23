<?php

class Logger
{
	private $LogFile ;
	
	public function __construct()
	{
	}
	
	public Static function write($String)
	{
		$File = fopen("Sytem.log","a+");
		fwrite($File,$datum = date("d.m.Y H:i",time())." ".$String."\n");
		fclose ($File);
	}
	
	
	
}


?>