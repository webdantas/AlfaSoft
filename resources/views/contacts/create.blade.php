@extends('layouts.app')

@section('content')
    <h1>Create Contact</h1>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf

        @include('contacts.form')

        <button type="submit">Create Contact</button>
    </form>
@endsection
