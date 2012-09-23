<?php

class Convert
{

	public static function timeStampToDate($TimeStamp)
	{
		$datum = date("d.m.Y",$TimeStamp);
		$uhrzeit = date("H:i",$TimeStamp);
		return $datum." - ".$uhrzeit." Uhr";
	}	
	
	
	
	public static function byteToString($Bytes)
	{
		if($Bytes< 1024)
			return $Bytes." B";
		if($Bytes< 1024*1024) // kb
			return number_format($Bytes/1024,1,",",".")." KB";	
			
		if($Bytes< 1024*1024*1024) // mb
			return number_format($Bytes/1024/1024,1,",",".")." MB";	
			
		if($Bytes< 1024*1024*1024*1024) // mb
			return number_format($Bytes/1024/1024/1024,1,",",".")." GB";	
		return $datum." - ".$uhrzeit." Uhr";
	}
	
	
	
	/**
	 * formatiert einen float zahl
	 *
	 * @param float $Float 
	 * @param int $Decimals gibt die nachkomma stellen an
	 * @return string ein zahlen string
	 *
	 */
	public static function fomat($Float,$Decimals=2)
	{
		return number_format($Float, $Decimals, ',', ' ');
	}
	
	
	
	
	
}?>
