@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Mensagens</h1>
        <div class="panel-body">
            <p><b>Id: </b>{{ $message->id }}</p>
            <p><b>Usuário: </b>{{ $u->name }} </p>
            <p>{{ $u->email }} - {{ $u->created_at }}</p>
            <p><b>Texto: </b>{{ $message->text }}</p>
            <p><b>Criada: </b>{{ $message->created_at }}</p>
            <p><b>Alterada: </b>{{ $message->updated_at  }}</p>
        </div>
    </div>
@endsection
