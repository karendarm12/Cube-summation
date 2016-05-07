<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @author Karen Ramirez <karendarm12@gmail.com>
 * Clase que contiene las validaciones establecidas para los parametros de la consulta.
 */
class Constraint extends Model
{
    
    /**
     * metodo encargado de validar el número de casos de prueba ingresados
     * @param $casosPrueba, número de casos prueba a validar
     * @return valor booleano con el resultado de la validación
     */
    public function validarCasosPrueba($casosPrueba){        
        if($casosPrueba < 1 || $casosPrueba >50){
            return false;
        }
        return true;
        
    }
    
    /**
     * metodo encargado de realizar las validaciones sobre las dimensiones de la matriz y la cantidad de      operaciones ingresadas
     * @param $n, dimensiones ingresadas para la matriz
     * @param $m, cantidad de operaciones a realizar
     * @return valor booleano con el resultado de la validación
     */
    public function validarData($n,$m){        
        if($n < 1 || $n >100){
            return false;
        }
        if($m < 1 || $m >1000){
            return false;
        }
        return true;
        
    }
}
