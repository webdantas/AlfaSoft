@extends('layouts.app')

@section('content')
    <h1>Contact Details</h1>

    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Contact:</strong> {{ $contact->contact }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>

    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>

    <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
