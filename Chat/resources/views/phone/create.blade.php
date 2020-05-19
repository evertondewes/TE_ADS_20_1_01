@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-header">Telefones</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('phone.index', ['userId' => $userId]) }}">Telefones</a></li>
        <li class="breadcrumb-item active">Enviar</li>
    </ol>

    <div class="table-responsive">
        <form method="post" action="{{ route('phone.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="text">Telefone</label>
                <input type="hidden" name="user_id" value="{{ $userId }}">
                <input type="text" name="number" class="form-control  {{ $errors->has('text') ? 'is-invalid' : '' }}"
                       placeholder="Telefone" required>
                @if($errors->has('text'))
                    <span class="help-block">
                        <strong>{{ $errors->first('text') }}</strong>
                    </span>
                @endif
            </div>
            <button class="btn btn-info">Enviar</button>
        </form>
    </div>
</div>
@endsection
