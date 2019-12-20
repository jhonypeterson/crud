@extends('layouts.app')

@section('content')

<a href="{{ URL::to('customers') }}" class="btn btn-primary">Listar Clientes</a>

<h1>Criar Cliente</h1>

{{ Form::open(array('url' => 'customers')) }}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('birthdate') ? ' has-error' : '' }}">
        {{ Form::label('birthdate', 'Data de Nascimento') }}
        {{ Form::text('birthdate', Request::old('birthdate'), array('class' => 'form-control')) }}
        @if ($errors->has('birthdate'))
            <span class="text-danger">{{ $errors->first('birthdate') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
        {{ Form::label('gender', 'Gênero') }}
        {{ Form::select('gender', array('' => 'Selecione', 'm' => 'Masculino', 'f' => 'Feminino'), Request::old('gender'), array('class' => 'form-control')) }}
        @if ($errors->has('gender'))
            <span class="text-danger">{{ $errors->first('gender') }}</span>
        @endif
    </div>
    
    <h2>Endereço do Cliente</h2>
    
    <div class="form-group">
        {{ Form::label('postcode', 'CEP') }}
        {{ Form::text('postcode', Request::old('postcode'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Rua') }}
        {{ Form::text('address', Request::old('address'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('number', 'Número') }}
        {{ Form::text('number', Request::old('number'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('complement', 'Complemento') }}
        {{ Form::text('complement', Request::old('complement'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('district', 'Bairro') }}
        {{ Form::text('district', Request::old('district'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('city', 'Cidade') }}
        {{ Form::text('city', Request::old('city'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('state', 'UF') }}
        {{ Form::text('state', Request::old('state'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Salvar Cliente', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('js/customers.js') }}"></script>
@endsection