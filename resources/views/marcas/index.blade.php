@extends('plantillas.plantilla1')
@section('titulo')
marcas
@endsection
@section('cabecera')
Marcas Clásicas S.A.
@endsection
@section('contenido')
@if($text=Session::get("mensaje"))
    <p class="bg-secondary text-white p-2 my-3">{{$text}}</p>
@endif
<table class="table table-striped table-primary">
    <thead>
      <tr>
        <th scope="col">Detalle</th>
        <th scope="col">Nombre</th>
        <th scope="col">Logo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach($marcas as $item)
        <tr style="vertical-align: middle">
        <th scope="row">#</th>
        <td>{{$item->nombre}}</td>
        <td><img src="{{asset($item->logo)}}" width="95rem" height="90rem" class="rounded-circe"></td>
        <td>
            <form name="a" action="{{route('marcas.destroy', $item)}}" method='POST' class="form-inline">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('¿Borrar Marca')">
                    <i class="fas fa-trash"></i> Borrar</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$marcas->links()}}
@endsection
