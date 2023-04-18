<?php

class Viaje{
    // Recolecta y modifica los datos de un viaje
    // Los atributos son: $codigoDeViaje, $destino, $cantMaxPasajeros, $pasajeros

    private $codigoDeViaje;

    private $destino;

    private $cantMaxPasajeros;

    private $colPasajeros;

    private $objResponsable;

    public function __construct($codigoDeViaje, $destino, $cantMaxPasajeros, $colPasajeros, $objResponsable){
        //metodo constructor de la clase viaje
        $this->codigoDeViaje = $codigoDeViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->colPasajeros = $colPasajeros;
        $this->objResponsable = $objResponsable;
    }

    public function getCodigoDeViaje(){
        return $this->codigoDeViaje;
    }
    
    public function setCodigoDeViaje($codigoDeViaje){
        $this->codigoDeViaje = $codigoDeViaje;
    }

    public function getDestino(){
        return $this->destino;
    }
    
    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }

    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function getColPasajeros(){
        return $this->colPasajeros;
    }

    public function setColPasajeros($colPasajeros){
        $this->colPasajeros = $colPasajeros;
    }

    public function getObjResponsable(){
        return $this->objResponsable;
    }

    public function setObjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }



    public function agregarPasajero($nombre, $apellido, $telefono, $numDocumento){
        $colPasajeros = $this->getColPasajeros();
        $nuevaPersona = new Persona($nombre, $apellido, $telefono, $numDocumento);
        array_push($colPasajeros, $nuevaPersona);
        $this->setColPasajeros($colPasajeros);
    }

    public function modificarPasajero($indice, $nombre, $apellido, $telefono, $numDocumento){
        $indice = $indice - 1;
        $colPasajeros = $this->getColPasajeros();
        $personaModificada = new Persona($nombre, $apellido, $telefono, $numDocumento);
        $colPasajeros [$indice] = $personaModificada;
        $this->setColPasajeros($colPasajeros);
    }

    public function mostrarArreglo(){
        $arreglo = $this->getColPasajeros();
        $cadena = "";
        $indice = 0;
        foreach ($arreglo as $persona){
            $indice = $indice + 1;
            $cadena = $cadena . "\n\n Pasajero: ". $indice ." \n";
            $cadena = $cadena . "Nombre: " . $persona->getNombre() . "\n";
            $cadena = $cadena . "Apellido: " . $persona->getApellido() . "\n";
            $cadena = $cadena . "Telefono: " . $persona->getTelefono() . "\n";
            $cadena = $cadena . "Numero de documento: " . $persona->getNumDocumento() . "\n";

        }
        return $cadena;
    }

    public function __toString(){
        return "Codigo de viaje: " . $this->getCodigoDeViaje() . " \n El destino: " . $this->getDestino() . "\n Cantidad Maxima de pasajeros: " . $this->getCantMaxPasajeros() . "\n". $this->getObjResponsable() . "\n" . $this->mostrarArreglo();
    }

    public function eliminaPasajero($indice){
        $arreglo = $this->getColPasajeros();
        $indice = $indice - 1;
        unset($arreglo[$indice]);
        $arreglo = array_values($arreglo);
        $this->setColPasajeros($arreglo);
    }

    public function nuevoPasajero($nombre, $apellido, $telefono, $numDocumento){
        $colPasajeros = $this->getColPasajeros();
        $max = $this->getCantMaxPasajeros();
        if ($max <= count($colPasajeros)){
            $resultado = "No se puede ingresar un nuevo pasajero porque ya esta lleno.";
        }else {
            $nuevaPersona = new Persona($nombre, $apellido, $telefono, $numDocumento);
            array_push($colPasajeros, $nuevaPersona);
            $this->setColPasajeros($colPasajeros);
            $resultado = "Se agrego el pasajero correctamente!\n";
        }
        return $resultado;
    }
}