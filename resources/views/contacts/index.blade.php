@extends('layouts.app')

@section('content')
    <h1>Contact List</h1>

    <ul>
        @foreach($contacts as $contact)
            <li>
                <a href="{{ route('contacts.show', $contact->id) }}">{{ $contact->name }}</a>

                <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir este contato?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('contacts.create') }}">Create New Contact</a>
@endsection
