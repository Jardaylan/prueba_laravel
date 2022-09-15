@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/person.css') }}">

<div class="container">
    <input type="text" name="formulario" id="formulario" value="Personas" hidden>
    <h2 class="text-center">Personas</h2>
    <div class="row">
        <div class="table-responsive">
            <table class="table compact hover" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Habeas data</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($peoples as $people)
                    <tr>
                      <td scope="row">{{ $people->name}}</td>
                      <td>{{ $people->last_name}}</td>
                      <td>{{ $people->document}}</td>
                      <td>{{ $people->departament}}</td>
                      <td>{{ $people->city}}</td>
                      <td>{{ $people->mobile}}</td>
                      <td>{{ $people->email}}</td>
                      <td>{{ $people->habeas_data}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
