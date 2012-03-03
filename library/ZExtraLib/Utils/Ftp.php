<?php
/**
 * @author njara
 *
 */
class ZExtraLib_Utils_Ftp
{
    /**
     * @var string
     */
    protected $_host;
    /**
     * @var string
     */
    protected $_username;
    /**
     * @var string
     */
    protected $_password;
    /**
     * @var string
     */
    protected $_cidftp;
    
    /**
     * @param string $host
     * @param string $username
     * @param string $password
     */
    public function __construct ($host, $username, $password)
    {
        $this->_host = $host; //host del servidor ftp
        $this->_username = $username; // usuario ftp
        $this->_password = $password; //passwrod ftp
    }
    
    /**
     * @return string
     */
    public function openFtp ()
    {
        $this->_cidftp = ftp_connect($this->_host); // Luego creamos un login al mismo con nuestro usuario y contraseÃ±a
        $resultado = ftp_login($this->_cidftp, $this->_username, $this->_password);
        $result = ! ((! $this->_cidftp) || (! $resultado));
        /*
        if ((! $this->_cidftp) || (! $resultado)) {
            $result = "Fallo en la conexiÃ³n";
            die();
        } else {
            $result = "Conectado.";
        }*/
        ftp_pasv($this->_cidftp, true);
        return $result;
    }
    
    /**
     * Cierra la conexiÃ³n FTP
     * @return void
     */
    public function closeFtp ()
    {
        if (isset($this->_cidftp))
        ftp_close($this->_cidftp);
        else return false;
    }
    
    /**
     * @param unknown_type $ruta
     * @param unknown_type $file
     */
    public function upImage ($ruta, $file)
    {
        ftp_put($this->_cidftp, $ruta, $file, FTP_BINARY);
        ftp_chmod($this->_cidftp, 0777, $ruta);
    }
    
    /**
     * @param unknown_type $arrayRuta
     * @param unknown_type $nomdir
     */
    function newDirectory ($arrayRuta)
    {
        /*foreach ($arrayRuta as $ruta) :
            //ftp_chdir($this->_cidftp, "public");
            ftp_chdir($this->_cidftp, $ruta);
            if (! @ftp_chdir($this->_cidftp, $nomdir)) {
                @ftp_mkdir($this->_cidftp, $nomdir);
                @ftp_chmod($this->_cidftp, 0777, $nomdir);
            }
            ftp_chdir($this->_cidftp, "../../");
        endforeach;*/
        foreach ($arrayRuta as $ruta) :
            //ftp_chdir($this->_cidftp, "public");
            if (! @ftp_chdir($this->_cidftp, $ruta)) {
                @ftp_mkdir($this->_cidftp, $ruta);
                @ftp_chmod($this->_cidftp, 0777, $ruta);
                ftp_chdir($this->_cidftp, $ruta);
            }
            //ftp_chdir($this->_cidftp, $ruta);
        endforeach;
    }

    function getPermisos($ruta)
    {
        @ftp_chmod($this->_cidftp, 0777, $ruta);
    }
    
    /**
     * @param unknown_type $ruta
     * @return string|string
     */
    function delete ($ruta)
    {
        if (isset($this->_cidftp))
    	return ftp_delete($this->_cidftp, $ruta);/*
        if (ftp_delete($this->_cidftp, $ruta)) {
            return "se elimino el archivo";
        } else {
            return "no se elimino el archivo";
        }*/
        else return false;
    }
    function listar ($ruta)
    {
        if (isset($this->_cidftp))
        {
            /*foreach ($arrayRuta as $ruta)
                ftp_chdir($this->_cidftp, $ruta); */           
    	return ftp_nlist ($this->_cidftp, $ruta);/*
        if (ftp_delete($this->_cidftp, $ruta)) {
            return "se elimino el archivo";
        } else {
            return "no se elimino el archivo";
        }*/
        }
        else return false;
    }
    function existfile ($ruta)
    {        
        if (isset($this->_cidftp))
        {
            $size=ftp_size($this->_cidftp,$ruta);
            if($size>-1)
                return true;
            else
                return false;
        }
        else
        {
            return false;
        }
    }
}