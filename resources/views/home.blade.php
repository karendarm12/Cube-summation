@extends('layout')
@section('main')

<div class="container">
<form action="{{ url('proceso') }}" method="POST" class="form-horizontal">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row-fluid">
        <div class="col-md-6">
            <div class="form-group">
                <label for="comment">Consultas</label>
                <textarea class="form-control" rows="10" id="querys" name="querys"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-default">Ejecutar Operaciones</button>
    </div>
   
      
      
    
   
</form>
</div>
    @if (isset($name))
  <?php print_r($name) ?>
    @endif



@endsection