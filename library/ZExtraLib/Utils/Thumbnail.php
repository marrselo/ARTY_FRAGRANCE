<?php
// Soporte para archivos BMP
include_once dirname(__FILE__) . '/BmpGd.php';
/**
 * 
 * @author Juan Odicio Arrieta
 * 
 * Clase para redimensionar imágenes
 *
 */
class ZExtraLib_Utils_Thumbnail
{
	
	/**
	 * Constantes de formato
	 */
	const FORMAT_GIF = 1;
	const FORMAT_JPG = 2;
	const FORMAT_PNG = 3;
    const FORMAT_BMP = 6;
	
	/**
	 * Indica el ancho máximo que puede tener la imagen
	 * 
	 * @var int
	 */
	protected $_maxWidth  = 120;
	
	/**
	 * Establece el alto máximo que puede tener una imagen
	 * 
	 * @var int
	 */
	protected $_maxHeight = 120;
	
	/**
	 * Establece el tamaño de corte que se aplicará a la imagen
	 * 
	 * @var int
	 */
	protected $_cropWidth  = 100;
	
	/**
	 * Establece el alto que tendrá el corte que se aplique a la
	 * imagen con el método cropImage
	 * 
	 * @var int
	 */
	protected $_cropHeight = 100;
	
	/**
	 * Indica si se aplicarán las restricciones de ancho y alto máximo
	 * indicadas en las propiedades $_maxWidth y $_maxHeight
	 * 
	 * @var bool
	 */
	protected $_applySizeLimit = true;
	
	
	/**
	 * Si es true, la imagen generada tendrá las dimensiones 
	 * indicadas en $_maxWidth y $_maxHeight
	 * 
	 * @var bool
	 */
	protected $_fixedSize = false;
	
	/**
	 * Establece el archivo sobre el que se realizarán las operaciones
	 * 
	 * @var string
	 */
	protected $_sourceFile = '';
	
	/**
	 * Guarda el último mensaje de error generado en las operaciones
	 * 
	 * @var string
	 */
	protected $_lastError = '';
	
	/**
	 * Establece la calidad de la imagen JPG generada
	 * 
	 * @var int
	 */
	protected $_jpgQuality = 85; // 0 to 100
	
	/**
	 * Establece la calidad de la imagen PNG generada
	 * @var int
	 */
	protected $_pngQuality = 8;  // 0 to 10
	
	
	
	public function __construct(array $config = array()) 
	{
		$this->setConfig($config);
	}
	
	/**
	 * Especifica el archivo sobre el que se realizarán las operaciones
	 * 
	 * @param string $file
	 * @return void
	 */
	public function setSourceFile($file) 
	{
		$this->_sourceFile = $file;
	}
	
	
	/**
	 * Guarda el archivo a $file_name 
	 * 
	 * @param string $file_name
	 * @param string $output_format
	 * @param $config
	 * @return bool
	 */
	public function saveToFile($file_name, $output_format = self::FORMAT_JPG, $config = array()) 
	{
		$inf = getimagesize($this->_sourceFile);
		
		if ($inf){
			
			if (!empty($config)){
				$this->setConfig($config);
			}
			
			$width  = $inf[0];
			$height = $inf[1];
			$src = self::openImageFile($this->_sourceFile);
			if (!$src){
				$this->_lastError = "Corrupted image file";
				return false;
			}
			
			$final_width  = $width;
			$final_height = $height;
			
			if ($this->_applySizeLimit == true){
				if ($final_width > $this->_maxWidth && $this->_maxWidth != 0){
					$final_width  = $this->_maxWidth;
					$final_height = ($height * $final_width) / $width;
				} 
				
				if ($final_height > $this->_maxHeight && $this->_maxHeight != 0){
					$final_height  = $this->_maxHeight;
					$final_width = ($width * $final_height) / $height;
				} 
			}
			
			/**
			 * Redimensiona la imagen aplicando las dimensiones indicadas
			 * en $_maxWidth y $_maxHeight 
			 */
			if ($this->_fixedSize == true) {
				$final_width  = $this->_maxWidth;
				$final_height = $this->_maxHeight; 
			}
			
			$new_img = imagecreatetruecolor($final_width, $final_height);
			imagecopyresampled($new_img, $src, 0, 0, 0, 0, $final_width, $final_height, $width, $height);
			
			
			switch ($output_format) {
				case self::FORMAT_GIF:
					return imagegif($new_img, $file_name);
					break;
				
				case self::FORMAT_JPG:
					return imagejpeg($new_img, $file_name, $this->_jpgQuality);
					break;
					
				case self::FORMAT_PNG:
					return imagepng($new_img, $file_name, $this->_pngQuality);
					break;
			}
			
			$this->_lastError = "Output format is not supported";
			return false;
				
		} else {
			$this->_lastError = 'Invalid image file';
			return false;
		}
		
	}
	
	/**
	 * Recorta una imagen según los parámetros de configuración
	 * 
	 * @param string $file_name
	 * @param string $output_format
	 * @param array $config
	 * @return void
	 */
	public function cropImage($file_name, $output_format = 'jpg', array $config = array()) 
	{
		if (!empty($config)){
			$this->setConfig($config);
		}
		
		$nw = $this->_cropWidth;
		$nh = $this->_cropHeight;
		
		$source = $this->_sourceFile;

		$size = getimagesize($source);
		$w = $size[0];
		$h = $size[1];
		
		$type  = $size[2]; // 1 = Gif, 2 = Jpg, 3 = Png
		
		$simg = null;
		switch ($type) {
			case self::FORMAT_GIF:
				$simg = @imagecreatefromgif($this->_sourceFile);
				break;
				
			case self::FORMAT_JPG:
				$simg = @imagecreatefromjpeg($this->_sourceFile);
				break;
				
			case self::FORMAT_PNG:
				$simg = @imagecreatefrompng($this->_sourceFile);
				break;
		}
	
		$dimg = imagecreatetruecolor($nw, $nh);
	
		$wm = $w / $nw;
		$hm = $h / $nh;
	 
		$h_height = $nh / 2;
		$w_height = $nw / 2;
	 
		if ($w > $h) {
			$adjusted_width = $w / $hm;
			$half_width = $adjusted_width / 2;
			$int_width = $half_width - $w_height;
			imagecopyresampled($dimg, $simg, -$int_width, 0, 0, 0, $adjusted_width, $nh, $w, $h);
			
		} elseif (($w <$h) || ($w == $h)) {
			$adjusted_height = $h / $wm;
			$half_height = $adjusted_height / 2;
			$int_height = $half_height - $h_height;
	
			imagecopyresampled($dimg, $simg, 0, -$int_height, 0, 0, $nw,$adjusted_height, $w, $h);
			
		} else {
			imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $nw, $nh, $w, $h);
			
		}
	
	    if ($output_format == 'jpg') {
			return imagejpeg($dimg, $file_name, $this->_jpgQuality);
	    }
		if ($output_format == 'png') {
			return imagepng($dimg, $file_name, $this->_pngQuality);
		}
		if ($output_format == 'gif') {
			return imagegif($dimg, $file_name);
		}
			
		$this->_lastError = "Output format is not supported";
		return false;

	}

	/**
	 * Establece las opciones de configuración que se usaran al realizar
	 * las operaciones sobre la imagen.
	 * 
	 * @param array $conf
	 * @return void
	 */
	public function setConfig(array $conf) 
	{
		foreach ($conf as $property => $value){
			$attribute = '_' . $property;
			$this->{$attribute} = $value;
		}
	}
	
	
	/**
	 * Combina dos imágenes
	 * 
	 * @param string $inputImgFile Archivo al que se aplicará el fondo
	 * @param string $outputImgFile Archivo que será escrito en disco
	 * @param string $backgroundImgFile Imagen que se usará como fondo para la combinación
	 * @return bool
	 */
	static function combineImages($inputImgFile, $outputImgFile, $backgroundImgFile
        , $applyCrop = false, $augmentBrigthness = 0)
	{
		$srcImg   = self::openImageFile($inputImgFile);
		$srcImgWidth = imagesx($srcImg);
		$srcImgHeight= imagesy($srcImg);
		
		$bgImg    = self::openImageFile($backgroundImgFile);
		$bgWidth  = imagesx($bgImg);
		$bgHeight = imagesy($bgImg);
		
		if ($srcImg == null) {
		    throw new Exception('No se pudo abrir ' . $inputImgFile);
		}
		
		if ($bgImg == null) {
		    throw new Exception('No se pudo abrir ' . $backgroundImgFile);
		}
		
		// CropImage 
		$cropWidth = 330;
		$cropHeight= 240;
		
		$outputImg = imagecreatetruecolor($bgWidth, $bgHeight);
		
		// Copiando la imagen de fondo
		imagecopy($outputImg, $bgImg, 0, 0, 0, 0, $bgWidth, $bgHeight);
		
		if ($applyCrop) {
			$crop = self::calculateCropSize($cropWidth, $cropHeight
                , $srcImgWidth, $srcImgHeight);
			// Copiando la imagen origen y colocandola sobre el fondo
			imagecopyresampled($outputImg, $srcImg, 65, 0, $crop->x, $crop->y
				, $cropWidth, $cropHeight, $crop->width, $crop->height);
		} else {
			imagecopyresampled($outputImg, $srcImg, 65, 0, 0, 0
				, 330, 236, $srcImgWidth, $srcImgHeight);
		}

        // Aplicar filtro para aumentar brillo
        if ($augmentBrigthness > 0) {
            imagefilter($outputImg, IMG_FILTER_BRIGHTNESS, $augmentBrigthness);
        }

		// Guardar imagen a disco
		return imagejpeg($outputImg, $outputImgFile, 100);
	}

	/**
	 * Coloca Marca de agua
	 *
	 * @param string $inputImgFile Archivo al que se aplicará el fondo
	 * @param string $outputImgFile Archivo que será escrito en disco
	 * @param string $backgroundImgFile Imagen que se usará como fondo para la combinación
	 * @return bool
	 */
	public function combineWatermark($inputImgFile, $outputImgFile, $output_format = self::FORMAT_JPG, $wmData = NULL, $margin = array(), $optional = false)
	{
		$srcImg = self::openImageFile($inputImgFile);

		if ($srcImg == null) {
		    $this->_lastError = "Corrupted image file";
                    return false;
		}

		$srcImgWidth = imagesx($srcImg);
		$srcImgHeight = imagesy($srcImg);

		$ok = 0;
		if(count($wmData)){
			foreach($wmData as $data){
				$wmImg = self::openImageFile($data['url']);
				$wmWidth = imagesx($wmImg);
				$wmHeight = imagesy($wmImg);

				if ($wmImg == null) {
                                    //throw new Exception('No se pudo abrir ' . $backgroundImgFile);
                                    $this->_lastError = "Corrupted image file WaterMark";
                                    return false;
				}

				// Calcular la posición donde debe copiarse la "marca de agua" en la fotografia
				switch($data['position']){
					case 'top-left':
						$horizmargen = $margin;
						$vertmargen = $margin;
						break;
					case 'top-right':
						$horizmargen = (($srcImgWidth - $wmWidth)/1) - $margin;
						$vertmargen = $margin;
						break;
					case 'bottom-right':
						$horizmargen = (($srcImgWidth - $wmWidth)/1) - $margin;
						$vertmargen = (($srcImgHeight - $wmHeight)/1) - $margin;
						break;
					case 'bottom-left':
						$horizmargen = $margin;
						$vertmargen = (($srcImgHeight - $wmHeight)/1) - $margin;
						break;
				}
				// copiar la "marca de agua" en la imagen
				ImageCopy($srcImg, $wmImg, $horizmargen, $vertmargen, 0, 0, $wmWidth, $wmHeight);
				ImageDestroy($wmImg);
				//guardar la nueva imagen
				switch ($output_format) {
					case self::FORMAT_GIF:
						if(imagegif($srcImg, $inputImgFile))
							$ok++;
						break;

					case self::FORMAT_JPG:
						if(imagejpeg($srcImg, $inputImgFile, $this->_jpgQuality))
							$ok++;
						break;

					case self::FORMAT_PNG:
						if(imagepng($srcImg, $inputImgFile, $this->_pngQuality))
							$ok++;
						break;
					default:
						$this->_lastError = "Output format is not supported";
						break;
				}

				if($optional){
					if($srcImgWidth < (2*$wmWidth))
					   return true;
				}
			}

			if( count($wmData) == $ok )
				return true;
			else{
				$this->_lastError = "Uploading images problems";
				return false;
			}
		}
	}

	/**
	 * Calcula las dimensiones al aplicar crop sobre una imagen
	 * 
	 * @param int $cropWidth Ancho del crop
	 * @param int $cropHeight Alto del crop
	 * @param int $imgWidth Ancho de la imagen
	 * @param int $imgHeight Alto de la imagen  
	 * @return stdClass
	 */
	static function calculateCropSize($cropWidth, $cropHeight, $imgWidth, $imgHeight)
	{
		try {			
			$size = self::fitToArea($cropWidth, $cropHeight, $imgWidth, $imgHeight);
			$cropWidth  = $size->width;
			$cropHeight = $size->height;

			$x = ($imgWidth - $cropWidth) / 2;
			$y = ($imgHeight - $cropHeight) / 2; 
			
			$ret = new stdClass();
			$ret->x = $x;
			$ret->y = $y;
			$ret->width = $cropWidth;
			$ret->height = $cropHeight;
			return $ret;
			
		} catch (Exception $ex) {
			return null;
		}
	}
	
	/**
	 * Reduce o aumenta el alto y ancho hasta que quepan en el rectángulo 
	 * formado por $maxWidth y $maxHeight
	 * 
	 * @param int $width
	 * @param int $height
	 * @param int $maxWidth
	 * @param int $maxHeight
	 * @return array
	 */
	static function fitToArea($width, $height, $maxWidth, $maxHeight)
	{
		$initialWidth  = $width;
		$initialHeight = $height;
        
		if ($maxWidth >= $maxHeight) {
			$width = $maxWidth ;
			$height = self::ruleOfThree($initialWidth, $initialHeight, $width);
		} else {
			$height = $maxHeight;
			$width  = self::ruleOfThree($initialHeight, $initialWidth, $height);
		}

		while ($width > $maxWidth || $height > $maxHeight) {
			if ($width > $maxWidth) {
				$height = self::ruleOfThree($width, $height, $maxWidth);
				$width  = $maxWidth;
			}

			if ($height > $maxHeight) {
				$width  = self::ruleOfThree($height, $width, $maxHeight);
				$height = $maxHeight;
			}
		}
		
		$ret = new stdClass();
		$ret->width  = $width;
		$ret->height = $height;
		$ret->maxWidth  = $maxWidth;
		$ret->maxHeight = $maxHeight;
		return $ret;
	}
	
	/**
	 * Regla de tres
	 * 
	 * @param int $a1
	 * @param int $a2
	 * @param int $b1
	 * @return int
	 */
	static function ruleOfThree($a1, $a2, $b1) 
	{
		return (($a2 * $b1) / $a1);
	}
	
	/**
	 * 
	 * @param string $file ruta completa del archivo de imagen
	 * @return resource
	 */
	static function openImageFile($file)
	{
		$size = getimagesize($file);
		$w = $size[0];
		$h = $size[1];
		
		$type  = $size[2]; // 1 = Gif, 2 = Jpg, 3 = Png
		$simg = null;
		switch ($type) {
			case self::FORMAT_GIF:
				$simg = @imagecreatefromgif($file);
				break;
				
			case self::FORMAT_JPG:
				$simg = @imagecreatefromjpeg($file);
				break;
				
			case self::FORMAT_PNG:
				$simg = @imagecreatefrompng($file);
				break;

            case self::FORMAT_BMP:
                $simg = @imagecreatefrombmp($file);
                break;
		}
		
		return $simg;
	}
	
	public function getLastError()
	{
	    return $this->_lastError;
	}

}


