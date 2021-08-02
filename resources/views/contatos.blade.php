@extends('layouts.app')


@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contatos as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->sobrenome}}</td>
                <td>{{$item->user}}</td>
                <td>{{$item->telefone}}</td>
                <td>
                    <a href="/agenda/formulario/{{$item->id}}/editar"><i class="far fa-edit" style="margin-right: 10px;"></i></a>
                    <a href="/agenda/deletar/{{$item->id}}"><i class="far fa-trash"></i></a>
                </td>
            </tr>                
            @endforeach
        </tbody>            
    </table>

    {{$contatos->links()}}                       
@endsection