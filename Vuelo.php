<?php
class Vuelo{
    /*Se registra la siguiente información: número, importe, fecha, destino, hora arribo, 
    hora partida, cantidad asientos totales y disponibles, y una referencia a la persona responsable del vuelo. */
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $cantAsientosTot;
    private $cantAsientosDisp;
    private $persona;

    //un Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la clase.
    public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $cantAsientosTot, 
    $cantAsientosDisp, $persona)
    {
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->destino = $destino;
        $this->horaArribo = $horaArribo;
        $this->horaPartida = $horaPartida;
        $this->cantAsientosTot = $cantAsientosTot;
        $this->cantAsientosDisp = $cantAsientosDisp;
        $this->persona = $persona;
    }

    //los métodos de acceso de cada uno de los atributos de la clase.
    //Método get
    public function getNumero(){
        return $this->numero;
    }
    public function getImporte(){
        return $this->importe;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getHoraArribo(){
        return $this->horaArribo;
    }
    public function getHoraPartida(){
        return $this->horaPartida;
    }
    public function getCantAsientosTot(){
        return $this->cantAsientosTot;
    }
    public function getCantAsientosDisp(){
        return $this->cantAsientosDisp;
    }
    public function getPersona(){
        return $this->persona;
    }

    //Método set
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setHoraArribo($horaArribo){
        $this->horaArribo = $horaArribo;
    }
    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }
    public function setCantAsientosTot($cantAsientosTot){
        $this->cantAsientosTot = $cantAsientosTot;
    }
    public function setCantAsientosDisp($cantAsientosDisp){
        $this->cantAsientosDisp = $cantAsientosDisp;
    }
    public function setPersona($persona){
        $this->persona = $persona;
    }

    /*En la clase Vuelo se debe implementar el método asignarAsientosDisponibles que recibe por parámetros la 
    cantidad de asientos que desean asignarse y de ser necesario actualizando la información del vuelo.
    El método retorna verdadero en caso que la asignación puedo concretarse y falso en caso contrario.*/
    public function asignarAsientosDisponibles($cantPasajeros){
        $respuesta = false;

        //Cuantos asientos disp hay
        $asientosDisp = $this->getCantAsientosDisp();

        //Hay suficientes
        if($asientosDisp >= $cantPasajeros){
            $this->setCantAsientosDisp($asientosDisp - $cantPasajeros);
            $respuesta = true;
        }else{
            //No hay suficientes
            $respuesta = false;
        }
        return $respuesta;
    }
}
?>