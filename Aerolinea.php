<?php
class Aerolinea{
    //En la clase Aerolíneas se registra la siguiente información: identificación, nombre y la colección de vuelos programados.
    private $identificacion;
    private $nombre;
    private $coleccionVuelos;

    //Realice una implementación válida para el método constructor de la clase Aerolínea.
    public function __construct($identificacion, $nombre)
    {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->coleccionVuelos = [];
    }

    //Método get
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getColeccionVuelos(){
        return $this->coleccionVuelos;
    }

    //Método set
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setColeccionVuelos($coleccionVuelos){
        $this->coleccionVuelos = $coleccionVuelos;
    }

    //Método __toString()
    public function __toString()
    {
        $cadena = "Identificación: " . $this->getIdentificacion() . "\n";
        $cadena = $cadena . "Nombre: " . $this->getNombre() . "\n";
        $cadena = $cadena . "Los Vuelos: " . $this->getColeccionVuelos() . "\n";
        return $cadena;
    }

    /*Se debe implementar el método  darVueloADestino que recibe por parámetro un destino junto a una cantidad de asientos libres y 
    se debe retornar una colección con los vuelos disponibles a ese destino.*/
    public function darVueloADestino($destino, $cant_asientos){
        // Array para vuelos disponibles
        $vuelosDisponibles = [];

        $vuelosDeLaAereolinea = $this->getColeccionVuelos();
    
        foreach ($vuelosDeLaAereolinea as $unVuelo) {
            //Busco destino
            $elDestino = $unVuelo->getDestino();
            //Asientos disponibles
            $asientosLibres = $unVuelo->getCantAsientosDisponibles();
            //Compara vuelo y asientos
            if ($elDestino == $destino && $asientosLibres >= $cant_asientos){
                $vuelosDisponibles[] = $unVuelo;
            }
        }
        return $vuelosDisponibles;
    }   

    /*Implementar en la clase Aerolinea el método incorporarVuelo que recibe como parámetro un vuelo, verifica que no se encuentre 
    registrado ningún otro vuelo al mismo destino, en la misma fecha y con el mismo horario de partida.
    El método debe retornar verdadero si la incorporación del vuelo se realizó correctamente y falso en caso contrario.*/
    public function incorporarVuelo($nuevoVuelo){
        $vuelosDeLaAereolinea = $this->getColeccionVuelos();
    
        foreach ($vuelosDeLaAereolinea as $vueloExistente) {
            //Comparo destino, fecha y hora de partida
            $mismoDestino = $vueloExistente->getDestino() == $nuevoVuelo->getDestino();
            $mismaFecha = $vueloExistente->getFecha() == $nuevoVuelo->getFecha();
            $mismaHora = $vueloExistente->getHoraPartida() == $nuevoVuelo->getHoraPartida();
            //Si ya hay uno igual, no lo agrego
            if ($mismoDestino && $mismaFecha && $mismaHora){
                return false;
            }
        }    
        // Si no se repite, lo agrego a la colección
        $this->coleccionVuelos[] = $nuevoVuelo;
        return true;
    }
    
    /*Implemente en la clase Aerolinea  el método venderVueloADestino, que recibe por parámetro: la cantidad de asientos, el 
    destino y una fecha. El método realiza la venta con el primer vuelo encontrado a ese destino, con los asientos disponibles 
    y en la fecha deseada. 
    En la implementación debe invocar al método asignarAsientosDisponibles y retornar la instancia del vuelo asignado o 
    null en caso contrario.*/
    public function venderVueloADestino($cantAsientos, $destino, $fecha){
    $vuelos = $this->getColeccionVuelos();

    foreach ($vuelos as $unVuelo) {
        //Comparar destino y fecha
        $esMismoDestino = $unVuelo->getDestino() == $destino;
        $esMismaFecha = $unVuelo->getFecha() == $fecha;
        //Cumple destino y fecha
        if ($esMismoDestino && $esMismaFecha){
            $seAsignaron = $unVuelo->asignarAsientosDisponibles($cantAsientos);
            //Si se asigna asiento
            if ($seAsignaron) {
                return $unVuelo;
            }
        }
    }
    //Si no se asigna asiento
    return null;
}

/*En la clase Aerolínea  se debe implementar el método  montoPromedioRecaudado que retorna el importe promedio recaudado 
por la aerolínea con cada uno de sus vuelos.*/
public function montoPromedioRecaudado(){
    $vuelos = $this->getColeccionVuelos();
    $totalRecaudado = 0;
    $cantVuelos = count($vuelos);

    if ($cantVuelos > 0) {
        foreach ($vuelos as $unVuelo){
            $importe = $unVuelo->getImporte();
            $asientosVendidos = $unVuelo->getCantAsientosTot() - $unVuelo->getCantAsientosDisp();
            $totalRecaudado += $importe * $asientosVendidos;
        }
        $promedio = $totalRecaudado / $cantVuelos;
        }else{
            $promedio = 0;
        }
        return $promedio;
    }
}
?>