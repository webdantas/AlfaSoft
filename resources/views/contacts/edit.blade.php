<!-- resources/views/contacts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Contact</h1>

    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
        @csrf
        @method('PUT')

        @include('contacts.form')

        <button type="submit">Update Contact</button>
    </form>
@endsection
