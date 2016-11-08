<?php

/**
 * Description of Subir
 *
 * @author Usuario
 */
class Subir {
    private $input, $destino='', $gestionarchivo="nada", $nombre, $tamaño, 
            $extensiones = ["jpg"=> 1,
                            "png"=> 1,
                            "gif"=> 1,
                            "txt"=> 1,
                            "pdf"=> 1];
    private $errorpropio=0;
    
    
    function __construct($input) {
        $this->input = $input;
        $this->tamaño = 1024*1024;
        $this->check();
    }
    
    private function check(){
        $this->errorpropio = 0;
        if(isset($_FILES[$this->input])){
            $this->nombre = $_FILES[$this->input]["name"];
            $this->checkSize();
            $this->checkExtension();
        }else{
            $this->errorpropio=-1;
        }
    }
    
    private function checkSize(){
        if($_FILES[$this->input]["size"]>$this->tamaño){
                $this->errorpropio = -2;
            }
    }
    
    private function checkExtension(){
        $nombreoriginal = $_FILES[$this->input]["name"];
        $partes=  pathinfo($nombreoriginal);
        $ext = $partes['extension'];
        if(!$this->isValid($ext)){
            $this->errorpropio = -3;
            }
    }
    
        public function getError(){
         
         //UPLOAD_ERR_OK, 0, no hay error
         //UPLOAD_ERR_INI_SIZE, 1, tamaño del archivo excede upload_max_filesize
         //UPLOAD_ERR_FORM_SIZE, 2, tamaño del archivo excede MAX_FILE_SIZE
         //UPLOAD_ERR_PARTIAL,3 archivo subido sólo parcialmente.
         //UPLOAD_ERR_NO_FILE, 4,no se ha subido archivo
         //UPLOAD_ERR_NO_TMP_DIR, 5, no existe carpeta temporal
         //UPLOAD_ERR_CANT_WRITE, 6, no se puede escribir en disco
         //UPLOAD_ERR_EXTENSION, 7, alguna extensión de phpha impedido subir el archivo
         //UPLOAD_ERR_QUE_ERRORPROPIO,-1, 
        if($this->errorpropio==0){
            return $_FILES[$this->input]["error"];
        }
        return $this->errorpropio;
    }


    public function getInput() {
        return $this->input;
    }

    
        /*
         * Este metodo cambia el nombre del input type file que se va a subir,
         * al cambiar el input tambien cambia el nombre del archivo, aunque lo
         * hayamos modificado con setNombre().
         * @param type $input
         */
    public function setInput($input) {//tenemos que hacer las mismas comprobaciones que en el constructor.
        $this->input = $input;
        $this->check();
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        if($destino == "" || $destino =="/"){
            $this->destino = "";
        }else{
            $caracter = substr($destino, -1);
            if($caracter != "/"){
                $destino.="/";
            }
            $this->destino = $destino;
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $nombreoriginal = $_FILES[$this->input]["name"];
        $partes=  pathinfo($nombreoriginal);
        $ext = $partes['extension'];
        $this->nombre = $nombre.".".$ext;
    }

    public function getTamaño() {
        return $this->tamaño;
    }

    public function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
        $this->checkSize();
    }

    public function getExtensiones() {
        return $this->extensiones;
    }

    public function addExtension($extension) {//para añadir nuevas eXtensiones
        $this->extensiones[] = 1;
    }

    public function isValid($extension){
        if(isset($this->extensiones[$extension])){
            return true;
        }
        return false;
    }

    public function removeExtension($extension){
        if($this->isValid($extension)){
            unset($this->extensiones[$extension]);
        }
    }
    
    public function getGestion(){
        return $this->gestionarchivo;
    }
    
    public function setGestion($gestion){
         if($gestion == 1 || $gestion == "sobrescribir"){
            $this->gestionarchivo = "sobrescribir";
        }else{if($gestion == 2 || $gestion == "renombrar"){
                $this->gestionarchivo = "renombrar";
            }else{
                $this->gestionarchivo = "nada";
            }
        }
    }

    public function subir(){
        if($this->getError()==0){
           $valida = is_uploaded_file($_FILES[$this->input]['tmp_name']);
           if($valida){
               $nombre = $this->getValidName();
               if($nombre != ""){
                   move_uploaded_file($_FILES[$this->input]["tmp_name"], $this->destino . $nombre);
                   return $nombre;
               }
           } else{
               $this->errorpropio = -4;
           }
        }
        return false;
    }
    
    public function getValidName(){
        if($this->gestionarchivo == "nada"){
            if(file_exists($this->destino . $this->nombre)){
                return "";
            }else{
                return $this->nombre;
            }
        }elseif ($this->gestionarchivo == "sobrescribir") {
            return $this->nombre;
        }elseif($this->gestionarchivo == "renombrar"){
            $carpeta = $this->destino;
            $nombre = $this->nombre;
            $partes = pathinfo($nombre);
            $ext = $partes['extension'];
            $nom = $partes['filename'];
            $nomext= $nom . "." . $ext;
            $cont=0;
            while (file_exists($carpeta . $nomext)){
                $cont++;
                $nomext = $nom . "_" . $cont . "." . $ext;
            }
            return $nomext;
        }        
    }

}

?>
