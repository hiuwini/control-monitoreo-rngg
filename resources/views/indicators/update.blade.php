@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Actualizar</h1>
                <ul>
                    <li>Indicador</li>
                    <li><a href="">Proyectos</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Actualizar Indicador</div>
                            <form class="needs-validation" novalidate method="POST" action="{{ url("/indicators/$i->id") }}">
                                {{ method_field('PUT') }}                            
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName">Nombre</label>
                                        <input type="text" class="form-control form-control-rounded" 
                                    name="name" id="name" placeholder="Nombre de indicador" value="{{ $i->name }}" required>
                                    </div>
                                   
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="status">Estatus</label>
                                        <select name="status"  class="form-control form-control-rounded" required>
                                            <option value="1" {{ ($i->status == 1) ? 'selected':''  }}>En proceso</option>
                                            <option value="2" {{ ($i->status == 2) ? 'selected':''  }}>Cumplido</option>
                                            <option value="0" {{ ($i->status == 0) ? 'selected':''  }}>Anulado</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="date_alert">Fecha alertiva</label>
                                        <div class="input-group">
                                        <input id="date_alert" name="date_alert" class="form-control form-control-rounded" placeholder="yyyy-mm-dd" value="{{ $i->date_alert }}" >
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary btn-rounded"  type="button">
                                                    <i class="icon-regular i-Calendar-4"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="date_limit">Fecha de entrega</label>
                                        <div class="input-group">
                                        <input id="date_limit" name="date_limit" class="form-control form-control-rounded" placeholder="yyyy-mm-dd" value="{{ $i->date_limit }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary btn-rounded"  type="button">
                                                    <i class="icon-regular i-Calendar-4"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                         <button class="btn btn-success" type="submit">Actualizar Indicador</button>
                                    <a style="margin: 19px;" href="/project/{{$i->id_proyecto}}" class="btn btn-danger m-1">Cancelar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

<script>
$('#date_limit, #date_alert').pickadate({
    format: 'yyyy-mm-dd',
    closeOnSelect: true,
    closeOnClear: true,
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

@endsection

@section('bottom-js')

@endsection