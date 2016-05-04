<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constraint extends Model
{
    public function validarCasosPrueba($casosPrueba){        
        if($casosPrueba < 1 || $casosPrueba >50){
            return false;
        }
        return true;
        
    }
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
