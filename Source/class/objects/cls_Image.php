<?php


class Image
{
	private $ImageFile;
	private $ImageSize;
	private $ImageWidth;
	private $ImageHeight;
	private $ImageType;
	private $Thumb;
	private $Image;
	
	
	public function create($ImagePath)
	{
		$this->ImageFile = $ImagePath;
		$this->ImageSize = getimagesize($this->ImageFile);
		$this->ImageWidth = $this->ImageSize[0];
		$this->ImageHeight = $this->ImageSize[1];
		$this->ImageType = $this->ImageSize[2];
		switch ($this->ImageType)
		{
			// Bedeutung von $imagetype:
			// 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM
			case 1: // GIF
				$this->Image = imagecreatefromgif($this->ImageFile);
				break;
			case 2: // JPEG
				$this->Image = imagecreatefromjpeg($this->ImageFile);
				break;
			case 3: // PNG
				$this->Image = imagecreatefrompng($this->ImageFile);
				break;
			default:
				//die('Unsupported imageformat');
				$this->Image=false;
		}
	}
	
	
	private function calculateThumbNail($MaxThumbWidth,$MaxThumbHeight)
	{
		if(!$this->Image){return true;}
		// Ausmaße kopieren, wir gehen zuerst davon aus, dass das Bild schon Thumbnailgröße hat
		$thumbwidth = $this->ImageWidth;
		$thumbheight = $this->ImageHeight;
		// Breite skalieren falls nötig
		if ($thumbwidth > $MaxThumbWidth)
		{
			$factor = $MaxThumbWidth / $thumbwidth;
			$thumbwidth *= $factor;
			$thumbheight *= $factor;
		}
		// Höhe skalieren, falls nötig
		if ($thumbheight > $MaxThumbHeight)
		{
			$factor = $MaxThumbHeight / $thumbheight;
			$thumbwidth *= $factor;
			$thumbheight *= $factor;
		}
		// Thumbnail erstellen
		$thumb = imagecreatetruecolor($MaxThumbWidth, $MaxThumbHeight);
		
		imagecopyresampled(
			$thumb,
			$this->Image,
			0, 0, 0, 0, // Startposition des Ausschnittes
			$MaxThumbWidth, $MaxThumbHeight,
			$this->ImageWidth, $this->ImageHeight
			);	
		$this->Thumb=$thumb;
			
	}
	
	
	public function createThumbNail($MaxThumbWidth,$MaxThumbHeight)
	{
		if(!$this->Image){return true;}
		$this->calculateThumbNail($MaxThumbWidth,$MaxThumbHeight);
		header('Content-Type: image/png');
		imagepng($this->Thumb);
		// In Datei speichern
		// $thumbfile = 'thumbs/' . $imagefile;
		// imagepng($thumb, $thumbfile);
		imagedestroy($this->Thumb);
	}
	
	
	/**
	 * speichert das vorschaubild am angegeben pfad ab
	 *
	 * @param int $MaxThumbWidth breite
	 * @param int $MaxThumbHeight höhe
	 * @param string $Path der pfad mit namen des bildes
	 * @return void 
	 *
	 */
	public function saveThumbNail($MaxThumbWidth,$MaxThumbHeight,$Path)
	{
		if(!$this->Image){return true;}
		$this->calculateThumbNail($MaxThumbWidth,$MaxThumbHeight);
		
		$Dir=substr($Path,0,strrpos($Path,"/")); // das verzeichniss ohne dateinamen
		// ordner prüfen
		mkdir($Dir,0777,true);
		
		imagepng($this->Thumb,$Path);
		// In Datei speichern
		// $thumbfile = 'thumbs/' . $imagefile;
		// imagepng($thumb, $thumbfile);
		imagedestroy($this->Thumb);
	}
	
	
	
	
}

?>