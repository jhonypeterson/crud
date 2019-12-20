@extends('layouts.app')

@section('content')

<a href="{{ URL::to('customers') }}" class="btn btn-primary">Listar Clientes</a>

<h1>Editar Cliente</h1>

{{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PUT')) }}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', $customer->name, array('class' => 'form-control')) }}
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('birthdate') ? ' has-error' : '' }}">
        {{ Form::label('birthdate', 'Data de Nascimento') }}
        {{ Form::text('birthdate', \Carbon\Carbon::parse($customer->birthdate)->format('d/m/Y'), array('class' => 'form-control')) }}
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('birthdate') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
        {{ Form::label('gender', 'Gênero') }}
        {{ Form::select('gender', array('' => 'Selecione', 'm' => 'Masculino', 'f' => 'Feminino'), $customer->gender, array('class' => 'form-control')) }}
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('gender') }}</span>
        @endif
    </div>
    
    <h2>Endereço do Cliente</h2>
    
    <div class="form-group">
        {{ Form::label('postcode', 'CEP') }}
        {{ Form::text('postcode', $customer->postcode, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Rua') }}
        {{ Form::text('address', $customer->address, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('number', 'Número') }}
        {{ Form::text('number', $customer->number, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('complement', 'Complemento') }}
        {{ Form::text('complement', $customer->complement, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('district', 'Bairro') }}
        {{ Form::text('district', $customer->district, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('city', 'Cidade') }}
        {{ Form::text('city', $customer->city, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('state', 'UF') }}
        {{ Form::text('state', $customer->state, array('class' => 'form-control', 'maxlength' => 2)) }}
    </div>

    {{ Form::submit('Salvar Cliente', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ URL::asset('js/customers.js') }}"></script>
@endsection