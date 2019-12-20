@extends('layouts.app')

@section('content')

<a href="{{ URL::to('customers') }}" class="btn btn-primary">Listar Clientes</a>
<a href="{{ URL::to('customers/create') }}" class="btn btn-success">Adicionar Cliente</a>

<h1>Listagem de Clientes</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <td>Código</td>
            <td>Nome</td>
            <td>Gênero</td>
            <td>Data de Nascimento</td>
            <td>Cidade</td>
            <td>UF</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->gender == 'm' ? 'Masculino' : 'Feminino' }}</td>
            <td>{{ \Carbon\Carbon::parse($customer->birthdate)->format('d/m/Y') }}</td>
            <td>{{ $customer->city }}</td>
            <td>{{ $customer->state }}</td>
            <td>
                <a class="btn btn-success pull-left" href="{{ URL::to('customers/' . $customer->id . '/edit') }}">Editar Cliente</a>
                    
                {{ Form::open(array('url' => 'customers/' . $customer->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Remover Cliente', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection