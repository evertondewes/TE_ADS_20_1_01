@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-header">Mensagens</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('message.index') }}">Mensagens</a></li>
        <li class="breadcrumb-item active">Enviar</li>
    </ol>

    <div class="table-responsive">
        <form method="post" action="{{ route('message.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="text">Mensagem</label>
                <input type="text" name="text" class="form-control  {{ $errors->has('text') ? 'is-invalid' : '' }}" placeholder="Texto" required>
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
