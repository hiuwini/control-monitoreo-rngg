@extends('layouts.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">


@endsection

@section('main-content')
   <div class="breadcrumb">
                <h1>Beneficiarios</h1>
                <ul>
                    
                    <li><a href="">GESTION</a></li>
                    
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Listado Beneficiario
                                <a style="margin: 19px;" href="{{ url('/beneficiarios/create')}}" class="btn btn-primary">Nuevo Beneficiario</a>
                                <a style="margin: 19px;" href="" class="btn btn-primary">Buscar Beneficiario</a>
                            </div>
                            
                                <div class="row">

                                     <table class="table table-light">
                                         <thead class="thead-light">
                                             <tr>
                                                 <th>Id</th>
                                                 <th>Nombre</th>
                                                 <th>Apellido</th>
                                                 <th>Género</th>
                                                 <th>Miembro de grupo gestor</th>
                                                 <th>Rango de Edad</th>
                                                 <th>Ubicación</th>
                                                 
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach($beneficiarios as $beneficario)
                                             <tr>
                                                 <td>{{$loop->iteration}}</td>
                                                 <td>{{ $beneficario->nombrebeneficiario}}</td>
                                                 <td>{{ $beneficario->apellidobeneficiario}}</td>
                                                 <td>{{ $beneficario->genero}}</td>
                                                 <td>
                            @if ($beneficario->estado == true)
                            <span class="badge badge-success">Activo</span></td>
                            @else
                            <span class="badge badge-warning">Inactivo</span></td>
                            @endif
                                                 <td>{{ $beneficario->rangoedad}}</td>
                                                 <td>{{ $beneficario->nombreubicacion}}</td>
                                                 
                                                 <td>

                                                    <a href="{{ route('beneficiarios.edit', $beneficario->id)}}" class="btn btn-warning">Editar</a>

                                                     <td>
                                                     <form action="{{ route('beneficiarios.destroy', $beneficario->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </td>
                                                     
                                                    </td>
                                                    </form>
                                                 </td>
                                                 
                                             </tr>

                                             @endforeach
                                            
                                         </tbody>
                                        
                                     </table>  
                                     {!! $beneficiarios->links() !!}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>


@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>



@endsection

@section('bottom-js')
<script src="{{asset('assets/js/form.basic.script.js')}}"></script>


@endsection
