<?php


class PasajeroDiferente extends Persona{
    
    private $sillaRuedas;

    private $asistenciaBarque;

    private $comidaEspecial;

    public function __construct($nombre, $apellido, $telefono, $numDocumento, $sillaRuedas, $asistenciaBarque, $comidaEspecial){
        
        parent :: __construct($nombre, $apellido, $telefono, $numDocumento);

        $this->sillaRuedas = $sillaRuedas;
        $this->asistenciaBarque = $asistenciaBarque;
        $this->comidaEspecial = $comidaEspecial;
    }


    //metodos de acceso.
    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }

    public function setSillaRuedas($sillaRuedas){
        $this->sillaRuedas = $sillaRuedas;
    }


    public function getAsistenciaBarque(){
        return $this->asistenciaBarque;
    }

    public function setAsistenciaBarque($asistenciaBarque){
        $this->asistenciaBarque = $asistenciaBarque;
    }


    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }

    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }



    public function __toString(){
        $cadena = parent :: __toString();
        $cadena = $cadena . "\nNecesita Silla de ruedas: " . $this->getSillaRuedas() . "\nNecesita asistencia de Em/desemBarque: " . $this->getAsistenciaBarque() . "\nNecesita comida especial: " . $this->getComidaEspecial();
        
        return $cadena;
    }



}