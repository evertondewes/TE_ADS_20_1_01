@extends('layouts.app')

@section('content')


    <div class="container">
        <h1 class="page-header">Mensagens</h1>

        <p>
            <a class="btn btn-info" href="{{ route('message.create') }}" >Enviar Mensagem</a>
        </p>

        <div align="center">
            {!! $messages->links() !!}
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Usuário</th>
                    <th>Mensagem</th>
                    <th>Detalhes extras</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <th><a href="{{ route('message.show', $message) }}" >{{ $message->id }}</a></th>
                        <td><a href="{{ route('phone.index', $message->user) }}">
                            {{ $message->user->name }} - {{ $message->user->email }}
                            </a>
                        </td>
                        <td>{{ $message->text }}</td>
                        <td><a href="{{ route('message.detalhesExtras', $message) }}"> Detalhes </a></td>
                        <td>
                            @if($message->user_id == \Auth::user()->id)

                            <form  method="POST" action=" {{ route('message.destroy', $message) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger"  onclick="return confirm('Deseja mesmo excluir?');" >
                                    Apagar
                                </button>
                            </form>

                            <form  method="POST" action=" {{ route('message.edit', $message) }}">

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="GET">
                                <button class="btn btn-info">
                                    Editar
                                </button>
                            </form>

                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div align="center">
            {!! $messages->links() !!}
        </div>
    </div>
@endsection
