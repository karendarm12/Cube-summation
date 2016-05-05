@extends('layout')
@section('main')



<div class="container"> 
    <div class="page-header">
        <h1>Cube-Summation <small>Prueba Backend para Grability</small></h1>
    </div>
    <form action="{{ url('proceso') }}" method="POST" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row-fluid">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="comment">Consultas</label>
                    <textarea class="form-control" rows="6" id="querys" name="querys"></textarea>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary btn-lg">Consultar</button>
            </div>
        </div> 
    </form>
    
    <div class="row-fluid">
        <div class="col-md-6 col-md-offset-3" style=" margin-top:20px;">
            
            <div class="jumbotron">
              <h3>Consultas ejecutadas:</h3>
              <p class="text-success">
                  @if(isset($resultado))
                     {{ $resultado }}
                    @endif                
              </p>
              <p class="text-danger">
                  @if(isset($error))
                     {{ $error }}
                    @endif                
              </p>
              
            </div>
            
        </div>
    </div> 
</div>






@endsection