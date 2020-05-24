@extends('layouts.app')

@section('content')


    <div class="container">
        <h1 class="page-header">Telefones do {{ $user->name }} - {{ $user->email }}</h1>

        <p>
            <a class="btn btn-info" href="{{ route('phone.create', $user) }}" >Adicionar Telefone</a>
        </p>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($phones as $phone)
                    <tr>
                        <th>{{ $phone->id }}</th>
                        <td>{{ $phone->number }}</td>
                        <td>


                            <form  method="POST" action=" {{ route('phone.destroy', $phone) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger"  onclick="return confirm('Deseja mesmo excluir?');" >
                                    Apagar
                                </button>
                            </form>

                            <form  method="POST" action=" {{ route('phone.edit', $phone) }}">

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="GET">
                                <button class="btn btn-info">
                                    Editar
                                </button>
                            </form>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
