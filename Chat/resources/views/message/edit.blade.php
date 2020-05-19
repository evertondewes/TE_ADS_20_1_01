@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Mensagens</h1>
        <div class="table-responsive">
            <form method="post" action="{{ route('message.update', $message) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="text">Mensagem</label>
                    <input type="text" name="text" class="form-control" placeholder="Texto"   value="{{ $message->text }}">
                </div>
                <button class="btn btn-info">Enviar</button>
            </form>
        </div>
    </div>
@endsection
