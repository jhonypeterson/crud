@extends('layouts.app')

<h1>Showing {{ $customer->name }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $customer->name }}</h2>
    <p>
        <strong>Email:</strong> {{ $customer->birthdate }}<br>
        <strong>Level:</strong> {{ $customer->gender }}
    </p>
</div>