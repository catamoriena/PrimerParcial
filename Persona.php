<?php
class Persona{
    //En la clase Persona se registra la siguiente información: nombre, apellido, dirección, mail y teléfono.
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    /*Implemente el método constructor de la clase Persona, que recibe  por parámetro los valores iniciales 
    de todos  los atributos definidos en la clase.*/
    public function __construct($nombre, $apellido, $direccion, $mail, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
    }

    //Método get
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    //Método set
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    
    //Redefinir el método toString  para que retorne la información de los atributos definidos en la clase Persona.
    public function __toString()
    {
        return
        "Nombre: " . $this->nombre . "\n" .
        "Apellido: " . $this->apellido . "\n" .
        "Dirección: " . $this->direccion . "\n" .
        "Mail: " . $this->mail . "\n" .
        "Telefono: " . $this->telefono;
    }
}
?>