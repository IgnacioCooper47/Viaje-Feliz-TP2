<?php

class Viaje{
    // Recolecta y modifica los datos de un viaje
    // Los atributos son: $codigoDeViaje, $destino, $cantMaxPasajeros, $pasajeros

    private $codigoDeViaje;

    private $destino;

    private $cantMaxPasajeros;

    private $colPasajeros;

    private $objResponsable;

    private $costoViaje;

    private $costosAbonadosPasajeros;

    
    public function __construct($codigoDeViaje, $destino, $cantMaxPasajeros, $colPasajeros, $objResponsable, $costoViaje, $costosAbonadosPasajeros){
        //metodo constructor de la clase viaje
        $this->codigoDeViaje = $codigoDeViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->colPasajeros = $colPasajeros;
        $this->objResponsable = $objResponsable;
        $this->costoViaje = $costoViaje;
        $this->costosAbonadosPasajeros = $costosAbonadosPasajeros;
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

    public function getCostoViaje(){
    return $this->costoViaje;
    }

    public function setCostoViaje($costoViaje){
        $this->costoViaje = $costoViaje;
    }

    public function getCostosAbonadosPasajeros(){
        return $this->costosAbonadosPasajeros;
    }

    public function setCostosAbonadosPasajeros($costosAbonadosPasajeros){
        $this->costosAbonadosPasajeros = $costosAbonadosPasajeros;
    }

    //Queria agregar como comentario que despues me di cuenta que tal vez, otra opcion de hacer esto era crear el objeto 
    // de cada tipo de pasajero en el test y mandar el obj a una sola funcion, pero la verdad me parece mas limpio 
    // tener todo aca en el codigo del viaje, cuanto mas pueda hacer por si sola la clase mejor, no?
    // Estoy hablando del tema de tener una funcion de agregar y modificar para cada tipo de pasajero.

    public function agregarPasajero($nombre, $apellido, $telefono, $numDocumento, $nroAsiento, $nroTicket){
        $colPasajeros = $this->getColPasajeros();
        $nuevoPasajero = new Pasajero($nombre, $apellido, $telefono, $numDocumento, $nroAsiento, $nroTicket);
        array_push($colPasajeros, $nuevoPasajero);
        $this->setColPasajeros($colPasajeros);
        $costoViaje = $this->getCostoViaje();
        $costos = $this->getCostosAbonadosPasajeros();
        $porcentaje = $nuevoPasajero->darPorcentajeIncremento();
        $costoFinal = ($costoViaje * $porcentaje) / 100;
        $costoFinal = $costoFinal + $costoViaje;
        $costos = $costos + $costoFinal;
        $this->setCostosAbonadosPasajeros($costoFinal);
    }

    public function agregarPasajeroVip($nombre, $apellido, $telefono, $numDocumento, $nroViajeroFrecuente, $cantMillas){
        $colPasajeros = $this->getColPasajeros();
        $nuevoPasajeroVip = new PasajeroVIP($nombre, $apellido, $telefono, $numDocumento, $nroViajeroFrecuente, $cantMillas);
        array_push($colPasajeros, $nuevoPasajeroVip);
        $this->setColPasajeros($colPasajeros);
        $costoViaje = $this->getCostoViaje();
        $costos = $this->getCostosAbonadosPasajeros();
        $porcentaje = $nuevoPasajeroVip->darPorcentajeIncremento();
        $costoFinal = ($costoViaje * $porcentaje) / 100;
        $costoFinal = $costoFinal + $costoViaje;
        $costos = $costos + $costoFinal;
        $this->setCostosAbonadosPasajeros($costoFinal);
    }

    /**
     * La funcion del pasajero diferente solo acepta desde el test que se le ingrese un 0 o 1, para las variables espceciales 
     * de silla de ruedas, asistencia y comida especial, para determinar si ls necesita o no.
     */
    public function agregarPasajeroDiferente($nombre, $apellido, $telefono, $numDocumento, $sillaRuedas, $asistenciaBarque, $comidaEspecial){
        $colPasajeros = $this->getColPasajeros();
        $nuevoPasajeroDiferente = new PasajeroDiferente($nombre, $apellido, $telefono, $numDocumento, $sillaRuedas, $asistenciaBarque, $comidaEspecial);
        array_push($colPasajeros, $nuevoPasajeroDiferente);
        $this->setColPasajeros($colPasajeros);
        $costoViaje = $this->getCostoViaje();
        $costos = $this->getCostosAbonadosPasajeros();
        $porcentaje = $nuevoPasajeroDiferente->darPorcentajeIncremento();
        $costoFinal = ($costoViaje * $porcentaje) / 100;
        $costoFinal = $costoFinal + $costoViaje;
        $costos = $costos + $costoFinal;
        $this->setCostosAbonadosPasajeros($costoFinal);
    }

    public function modificarPasajero($indice, $nombre, $apellido, $telefono, $numDocumento){
        $indice = $indice - 1;
        $colPasajeros = $this->getColPasajeros();
        $nroTicket = $colPasajeros[$indice]-> getNroTicket();
        $nroAsiento = $indice;
        $personaModificada = new Pasajero($nombre, $apellido, $telefono, $numDocumento, $nroAsiento, $nroTicket);
        $colPasajeros [$indice] = $personaModificada;
        $this->setColPasajeros($colPasajeros);
    }

    public function modificarPasajeroVIP($indice, $nombre, $apellido, $telefono, $numDocumento, $nroViajeroFrecuente, $cantMillas){
        $indice = $indice - 1;
        $colPasajeros = $this->getColPasajeros();
        $pasajeroVIP = new PasajeroVIP($nombre, $apellido, $telefono, $numDocumento, $nroViajeroFrecuente, $cantMillas);
        $colPasajeros [$indice] = $pasajeroVIP;
        $this->setColPasajeros($colPasajeros);
    }

    public function modificarPasajeroDiferente($indice, $nombre, $apellido, $telefono, $numDocumento, $sillaRuedas, $asistenciaBarque, $comidaEspecial){
        $indice = $indice - 1;
        $colPasajeros = $this->getColPasajeros();
        $pasajeroDif = new PasajeroDiferente($nombre, $apellido, $telefono, $numDocumento, $sillaRuedas, $asistenciaBarque, $comidaEspecial);
        $colPasajeros [$indice] = $pasajeroDif;
        $this->setColPasajeros($colPasajeros);
    }

    public function mostrarArreglo(){
        $arreglo = $this->getColPasajeros();
        $cadena = "";
        $indice = 0;
        foreach ($arreglo as $persona){
            $indice = $indice + 1;
            $cadena = $cadena . "\n\n Pasajero: ". $indice ." \n";
            $cadena = $cadena . $persona->__toString();
        }
        return $cadena;
    }

    public function __toString(){
        return "Codigo de viaje: " . $this->getCodigoDeViaje() . " \n El destino: " . $this->getDestino() . "\n Cantidad Maxima de pasajeros: " . $this->getCantMaxPasajeros() . "\nCosto del viaje: " . $this->getCostoViaje() . "\nCostos abonados de los pasajeros: " . $this->getCostosAbonadosPasajeros() . "\n" . $this->getObjResponsable() . "\n" . $this->mostrarArreglo();
    }

    public function eliminaPasajero($indice){
        $arreglo = $this->getColPasajeros();
        $indice = $indice - 1;
        unset($arreglo[$indice]);
        $arreglo = array_values($arreglo);
        $this->setColPasajeros($arreglo);
    }

    //todas las funciones de nuevo pasajero quedaron obsoletas por la funcion de vender pasaje, las dejo igual.
    //No me di cuenta y las hice igual jajaja.
    public function nuevoPasajero($nombre, $apellido, $telefono, $numDocumento){
        $colPasajeros = $this->getColPasajeros();
        $max = $this->getCantMaxPasajeros();
        $nroAsiento = count($colPasajeros) + 1;
        $nroTicket = 2131233113212 + $nroAsiento;
        if ($max <= count($colPasajeros)){
            $resultado = "No se puede ingresar un nuevo pasajero porque ya esta lleno.";
        }else {
            $nuevaPersona = new Pasajero($nombre, $apellido, $telefono, $numDocumento, $nroAsiento, $nroTicket);
            array_push($colPasajeros, $nuevaPersona);
            $this->setColPasajeros($colPasajeros);
            $resultado = "Se agrego el pasajero correctamente!\n";
        }
        return $resultado;
    }

    public function nuevoPasajeroVIP($nombre, $apellido, $telefono, $numDocumento, $nroViajeroFrecuente, $cantMillas){
        $colPasajeros = $this->getColPasajeros();
        $max = $this->getCantMaxPasajeros();
        if ($max <= count($colPasajeros)){
            $resultado = "No se puede ingresar un nuevo pasajero porque ya esta lleno.";
        }else {
            $nuevaPersona = new PasajeroVIP($nombre, $apellido, $telefono, $numDocumento, $nroViajeroFrecuente, $cantMillas);
            array_push($colPasajeros, $nuevaPersona);
            $this->setColPasajeros($colPasajeros);
            $resultado = "Se agrego el pasajero correctamente!\n";
        }
        return $resultado;
    }

    public function nuevoPasajeroDiferente($nombre, $apellido, $telefono, $numDocumento, $sillaRuedas, $asistenciaBarque, $comidaEspecial){
        $colPasajeros = $this->getColPasajeros();
        $max = $this->getCantMaxPasajeros();
        if ($max <= count($colPasajeros)){
            $resultado = "No se puede ingresar un nuevo pasajero porque ya esta lleno.";
        }else {
            $nuevaPersona = new PasajeroDiferente($nombre, $apellido, $telefono, $numDocumento, $sillaRuedas, $asistenciaBarque, $comidaEspecial);
            array_push($colPasajeros, $nuevaPersona);
            $this->setColPasajeros($colPasajeros);
            $resultado = "Se agrego el pasajero correctamente!\n";
        }
        return $resultado;
    }

    public function venderPasaje($objPasajero){
        $colPasajeros = $this->getColPasajeros();
        $costoViaje = $this->getCostoViaje();
        $costos = $this->getCostosAbonadosPasajeros();
        $porcentaje = $objPasajero->darPorcentajeIncremento();
        
        if ($this->hayPasajesDisponible()){
            array_push($colPasajeros, $objPasajero);
            $this->setColPasajeros($colPasajeros);
            $costoFinal = ($costoViaje * $porcentaje) / 100;
            $costoFinal = $costoFinal + $costoViaje;
            $costos = $costos + $costoFinal;
            $this->setCostosAbonadosPasajeros($costos);
        }else {
            $costoFinal = 0;
        }
        return $costoFinal;
    }

    public function hayPasajesDisponible(){
        $colPasajeros = $this->getColPasajeros();
        $cantMaxPasajeros = $this->getCantMaxPasajeros();
        $resultado = false;
        if (count($colPasajeros) < $cantMaxPasajeros){
            $resultado = true;
        }
        return $resultado;
    }
}