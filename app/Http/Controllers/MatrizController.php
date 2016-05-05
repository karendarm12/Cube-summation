<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Matriz;
use App\Constraint;

class MatrizController extends Controller
{
    public function index()
    {        
        return view('home');
    }
    
    public function procesarQuery(Request $request)
    {
       $constraint = new Constraint();
       $input= $request->request->get('querys');
       $consulta = explode("\n", $input);
       $casosPrueba = intval(trim(current($consulta)));
       $resultado = '';
        
       if($constraint->validarCasosPrueba($casosPrueba)){
          while ($casosPrueba >=1){
              
               $cuboInfo = explode(" ",next($consulta));
              
            if ($constraint->validarData($cuboInfo[0],$cuboInfo[1])){  
                
                $matriz = new Matriz($cuboInfo[0],$cuboInfo[1]);
                
                for($i=0;$i< $matriz->getOperaciones(); $i++){
                    
                    $operacion = explode(" ", next($consulta));
                    $query = $operacion[0];
                    
                    if($query == "UPDATE"){
                        $matriz->uptdateMatriz(
                            $this->restarIndice($operacion[1]),
                            $this->restarIndice($operacion[2]),
                            $this->restarIndice($operacion[3]),
                            intval($operacion[4]));
                    }else{
                       $sumaMatriz = $matriz->queryMatriz(
                            $this->restarIndice($operacion[1]),
                            $this->restarIndice($operacion[2]),
                            $this->restarIndice($operacion[3]),
                            $this->restarIndice($operacion[4]),
                            $this->restarIndice($operacion[5]),
                            $this->restarIndice($operacion[6]));
                        $resultado .=$sumaMatriz."\n";
                    }    
                }
                
                
                 
            }else{
                return view("home",['error'=>"Los datos ingresados no son validos"]);
            }
            $casosPrueba--;  
          } 
           return view("home",['resultado'=>$resultado,'casosPrueba'=>$casosPrueba]);
       }else{
           return view("home",['error'=>"Los datos ingresados no son correctos"]);
       }
        
    }
    
    public function restarIndice($index){
        return intval($index)-1;
    }
}
