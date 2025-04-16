<?php
include 'Persona.php';
include 'Vuelo.php';
include 'Aerolinea.php';
include 'Aeropuerto.php';

// Crear 2 instancias de la clase Aerolínea
$aerolinea1 = new Aerolinea(603, "Aerolíneas Argentinas");
$aerolinea2 = new Aerolinea(785, "FlyBondi");

//Crear una persona para los vuelos
$persona = new Persona("Catalina", "Moriena", "Setefenelli 144", "morienacata@gmail.com", "2995330241");

///Crear  4 instancias de la clase vuelo.A 
$vuelo1 = new Vuelo(1, 50000, "01-06-2025", "Buenos Aires", "08:00", "10:00", 150, 100, $persona);
$vuelo2 = new Vuelo(2, 55000, "02-06-2025", "Córdoba", "12:00", "14:00", 140, 90, $persona);
$vuelo3 = new Vuelo(3, 60000, "03-06-2025", "Mendoza", "16:00", "18:00", 160, 120, $persona);
$vuelo4 = new Vuelo(4, 62000, "04-06-2025", "Salta", "20:00", "22:00", 130, 110, $persona);

//A cada instancia de Aerolínea creada en T1, incorporar 2 de los vuelos.
$aerolinea1->incorporarVuelo($vuelo1);
$aerolinea1->incorporarVuelo($vuelo2);

$aerolinea2->incorporarVuelo($vuelo3);
$aerolinea2->incorporarVuelo($vuelo4);

//Crea un objeto de la clase Aeropuerto con la colección de aerolíneas creadas.
$aeropuerto = new Aeropuerto("Aeropuerto Internacional Juan Domingo Perón", "San Martín 5901, Neuquén");
$aeropuerto->setColAerolineas([$aerolinea1, $aerolinea2]);

/*Invocar y visualizar el resultado del método  ventaAutomatica con cantidad de asientos 3 y como destino alguno 
de los destinos de los vuelos creados.*/
// Invocar y visualizar el resultado del método ventaAutomatica
echo "- Venta de 3 asientos para destino Córdoba -\n";

$vueloVendido = $aeropuerto->ventaAutomatica(3, "02-06-2025", "Córdoba");

if($vueloVendido != null){
    echo "Se realizó la venta en el siguiente vuelo:\n";
    echo $vueloVendido . "\n";
}else{
    echo "No se pudo realizar la venta.\n";
}

//Invocar  y visualizar el resultado del método  promedioRecaudadoXAerolinea.
echo "- Promedio recaudado por Aerolíneas Argentinas (ID 603) -\n";

$promedio = $aeropuerto->promedioRecaudadoXAerolinea(603);

echo "Promedio recaudado: $" . $promedio . "\n";
?>