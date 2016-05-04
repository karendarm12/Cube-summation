<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriz extends Model
{
    private $matriz; 
    private $operaciones;
    private $dimension;
    
    public function __construct($dimension,$operaciones){
        $this->dimension = $dimension;
        $this->operaciones =$operaciones;
        $this->llenarMatriz($dimension);
    }
    
    public function llenarMatriz ($n){
        for($i=0; $i<$n;$i++){
            for($j=0; $j<$n;$j++){
                for($k=0; $k<$n;$k++){
                    $this->matriz[$i][$j][$k]=0;
                }
            }
        }
    }
    
    public function uptdateMatriz($x,$y,$z,$valor){
        $this->matriz[$x][$y][$z] = $valor;
    }
    
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
    
    public function getOperaciones(){
        return $this->operaciones;
    }
        
                        
}
