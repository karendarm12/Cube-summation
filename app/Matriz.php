<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * @author Karen Ramirez <karendarm12@gmail.com>
 * Clase que representa la matriz sobre la cual se realizaran consultas.
 */

class Matriz extends Model
{
    /**
     *
     * @var $matriz, este atributo representa la estructura de almacenamiento de 
     * los datos ingresados por el usuario.
     */
     private $matriz; 
    /**
     *
     * @var $operaciones, este atributo representa las cantidad de operaciones que se ejecutarán sobre la matriz.    */
     private $operaciones;
    /**
     *
     * @var $dimension, este atributo representa las dimensiones ingresadas para la matriz. 
     */
     private $dimension;
    
    /**
     * metodo encargado de a inicialización de la matriz
     * @param $dimension, el tamaño de la matriz
     * @param $operaciones, la cantidad de operaciones que se ejecutarán sobre la matriz
     */
    public function __construct($dimension,$operaciones){
        $this->dimension = $dimension;
        $this->operaciones =$operaciones;
        $this->llenarMatriz($dimension);
    }
    
    
     /**
     * método encargado de actualizar un valores en la matriz segun los valores
     * recibidos
     * @param $x coordenada x 
     * @param $y coordenada y
     * @param $z coordenada en z
     * @param $value, el valor a almacenar 
     */
    public function uptdateMatriz($x,$y,$z,$valor){
        $this->matriz[$x][$y][$z] = $valor;
    }
    
    /**
     * Metodo encargado de ejecutar la consulta query ingresada.
     * @param $x1 el valor en x donde inicia la consulta
     * @param $y1 el valor en y donde inicia la consulta
     * @param $z1 el valor en z donde inicia la consulta
     * @param $x2 el valor en x donde termina la consulta
     * @param $y2 el valor en y donde termina la consulta
     * @param $z2 el valor en z donde termina la consulta
     * @return $cont, el resultado de la sumatoria del rango de valores establecido
     */
    public function queryMatriz($x1,$y1,$z1,$x2,$y2,$z2){
        $cont = 0;
        for($x=$x1; $x<=$x2;$x++){
            for($y=$y1; $y<=$y2;$y++){
                for($z=$z1; $z<=$z2;$z++){
                   $cont+=$this->matriz[$x][$y][$z];
                }
            }
        }
        return $cont;
    }
    
    /**
     * Metodo encargado de obtener la cantidad de operaciones ingresadas para la matriz
     * @param $n, dimension dada para la matriz. 
     */
    public function getOperaciones(){
        return $this->operaciones;
    }
    
    /**
     * Metodo encargado de llenar la matriz segun el tamaño ingresado
     * @param $n, dimension dada para la matriz. 
     */
    public function llenarMatriz($n){
        for($i=0; $i<$n;$i++){
            for($j=0; $j<$n;$j++){
                for($k=0; $k<$n;$k++){
                    $this->matriz[$i][$j][$k]=0;
                }
            }
        }
    }
        
                        
}
