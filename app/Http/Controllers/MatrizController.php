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
        
       if($constraint->validarCasosPrueba($casosPrueba)){
          while ($casosPrueba >=1){
              
               $cuboInfo = explode(" ",next($consulta));
              
            if ($constraint->validarData($cuboInfo[0],$cuboInfo[1])){  
                
                $matriz = new Matriz ($cuboInfo[0],$cuboInfo[1]);
                
                for($i=0;$i< $matriz->getOperaciones(); $i++){
                    
                    $operacion = explode(" ", next($consulta));
                   
                }           
                 return view("home",["name"=>$operacin]);
            }
              
          } 
           
       }
        
    }
    
    
}
