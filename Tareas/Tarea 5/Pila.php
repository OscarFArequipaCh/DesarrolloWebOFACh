<?php 
class Pila {
    private $elementos;
    private $tope;

    public function __construct() {
        $this->elementos = [];
        $this->tope = 0;
    }
    public function insertar($elemento){
       $this->elementos[$this->tope]=$elemento;
       $this->tope++;
    }
    public function eliminar(){
        if($this->tope < 1){
            return "La pila esta vacia.";
        } else {
            $elemento=$this->elementos[$this->tope-1];
            $this->tope--;
            return $elemento;
        }    
    }
    public function mostrar(){
        for ($i=0;$i<$this->tope;$i++){
            echo $this->elementos[$i]."<br>";
        }
    }
}