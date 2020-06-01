@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Mensagens</h1>
        <div class="table-responsive">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('message.index') }}">Mensagens</a></li>
                <li class="breadcrumb-item active">Relatório</li>
            </ol>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuário</th>
                    <th>Quantidade de Mensagens</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->count }}</td>
                    </tr>
                @endforeach
                </tbody>
                <div align="center">
                    {!! $rows->links() !!}
                </div>
            </table>
        </div>
    </div>

@endsection
