@extends('layouts.app')


@section('content')

<br><h3>Editar Contato</h3><br>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/agenda/update/{{$usuario->id}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nome</label>
      <input type="text" name="nome" id="" class="form-control" value="{{$usuario->nome}}">   
      {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Sobrenome</label>
      <input type="text" name="sobrenome" class="form-control" id="" value="{{$usuario->sobrenome}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" id="" value="{{$user->email}}">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Telefone</label>
        <input type="number" name="telefone" class="form-control" id="" value="{{$usuario->telefone}}">
      </div>
      

      <button class="btn btn-info" type="submit">Editar Contato</button>
  </form>



@endsection