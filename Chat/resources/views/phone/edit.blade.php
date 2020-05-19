@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Telefone</h1>
        <div class="table-responsive">
            <form method="post" action="{{ route('phone.update', $phone) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="text">Telefone</label>
                    <input type="text" name="number" class="form-control" placeholder="Número"
                           value="{{ $phone->number }}">
                </div>
                <button class="btn btn-info">Enviar</button>
            </form>
        </div>
    </div>
@endsection
