<?php
class Aeropuerto{
    // En la clase Aeropuerto se registra: denominación, dirección y la colección de aerolíneas que arriban a él
    private $denominacion;
    private $direccion;
    private $colAerolineas;

    //Constructor
    public function __construct($denominacion, $direccion){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colAerolineas = [];
    }

    //Métodos get
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColAerolineas(){
        return $this->colAerolineas;
    }

    //Métodos set
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setColAerolineas($colAerolineas){
        $this->colAerolineas = $colAerolineas;
    }

    //Implementar el método __toString() de la clase Aeropuerto, teniendo en cuentas las buenas prácticas de programación.
    public function __toString(){
        $cadena = "Denominación: " . $this->getDenominacion() . "\n";
        $cadena = $cadena . "Dirección: " . $this->getDireccion() . "\n";
        $cadena = $cadena . "Aerolíneas:\n";
    
        foreach ($this->getColAerolineas() as $unaAerolinea){
            $cadena = $cadena . $unaAerolinea . "\n"; // asume que la aerolínea tiene su propio __toString()
        }
    
        return $cadena;
    }

    /*Implementar el método retornarVuelosAerolinea que recibe por parámetro una aerolínea y retorna todos los vuelos 
    asignados a esa aerolínea.*/
    public function retornarVuelosAerolinea($unaAerolinea){
        $vuelos = [];

    foreach ($this->getColAerolineas() as $aerolinea){
        if ($aerolinea == $unaAerolinea){
            $vuelos = $aerolinea->getColeccionVuelos();
        }
    }
    //Devuelvo la colección de vuelos (vacía si no se encontró)
    return $vuelos;
    } 
    
    /*Implementar el método ventaAutomatica que recibe por parámetro la cantidad de asientos, una fecha y un destino y el 
    aeropuerto realiza automáticamente la asignación al vuelo. 
    Para la implementación de este método debe utilizarse uno de los métodos implementados en la clase Vuelo.*/
    public function ventaAutomatica($cantAsientos, $fecha, $destino){
        $colAeros = $this->getColAerolineas();

        foreach ($colAeros as $aerolinea){
            //Intento vender un vuelo
            $vueloAsignado = $aerolinea->venderVueloADestino($cantAsientos, $destino, $fecha);
            //Si encuentra, asigno uno
            if ($vueloAsignado != null){
                return $vueloAsignado;
            }
    }
    //Si no se pudo asignar vuelo, devuelvo null
    return null;
    }

    /*Implementar en la clase Aeropuerto el método promedioRecaudadoXAerolinea,  que recibe por parámetro la identificación 
    de una Aerolínea y retorna el promedio de lo recaudado por esa Aerolínea en ese Aeropuerto.
    Para la implementación utilizar, si es posible, alguno de los métodos previamente implementado.*/
    public function promedioRecaudadoXAerolinea($identificacion){
        $promedio = 0;
        $aerolineas = $this->getColAerolineas();
        
        foreach ($aerolineas as $unaAerolinea){
            if ($unaAerolinea->getIdentificacion() == $identificacion){
                $promedio = $unaAerolinea->montoPromedioRecaudado();
            }
        }
        //Devuelvo el promedio (0 si no la encontró)
        return $promedio;
    } 
}
?>
