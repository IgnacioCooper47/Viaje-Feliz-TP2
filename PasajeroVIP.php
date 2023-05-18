<?php


class PasajeroVIP extends Persona{
    
    private $nroViajeroFrecuente;

    private $cantMillas;

    
    public function __construct($nombre, $apellido, $telefono, $numDocumento, $nroViajeroFrecuente, $cantMillas){
        
        parent :: __construct($nombre, $apellido, $telefono, $numDocumento);

        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }


    //metodos de acceso.
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }

    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
    }


    public function getCantMillas(){
        return $this->cantMillas;
    }

    public function setCantMillas($cantMillas){
        $this->cantMillas = $cantMillas;
    }

    public function __toString(){
        $cadena = parent :: __toString();
        $cadena = $cadena . "\nNumero de pasajero frecuente: " . $this->getNroViajeroFrecuente() . "\nCantidad de millas acumuladas: " . $this->getCantMillas();

        return $cadena;
    }
}