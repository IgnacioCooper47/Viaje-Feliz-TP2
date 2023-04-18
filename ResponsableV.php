<?php

class ResponsableV{

    private $nroEmpleado;

    private $nroLicencia;

    private $nombre;

    private $apellido;

   


    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido){
        //Metodo constructor de la clase Responsable.
        $this->nroEmpleado = $nroEmpleado;
        $this->nroLicencia = $nroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        
    }



    public function getNroEmpleado(){
        return $this->nroEmpleado; 
    }
    
    public function setNroEmpleado($nroEmpleado){
        $this->nroEmpleado = $nroEmpleado;
    }



    public function getNrolicencia(){
        return $this->nroLicencia; 
    }
    
    public function setNroLicencia($nroLicencia){
        $this->nroLicencia = $nroLicencia;
    }



    public function getNombre(){
        return $this->nombre; 
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }



    public function getApellido(){
        return $this->apellido; 
    }
    
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }


    public function __toString(){
        return "\n Numero de empleado: " . $this->getNroEmpleado() . "\n Numero de licencia: " . $this->getNrolicencia() . "\n Nombre: " . $this->getNombre() . "\n Apellido: " . $this->getApellido(); 
    }

    

}