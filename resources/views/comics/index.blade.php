@extends('layouts.base')

@section('content')
    <h1>Tabella Fumetti</h1>
    <hr>
    <a class="btn btn-primary mb-4" href="{{ route('comics.create') }}">Aggiungi</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Prezzo(€)</th>
                <th scope="col">Serie</th>
                <th scope="col">Data di uscita</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->price / 100 }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ \Carbon\Carbon::parse($comic->date)->format('d/m/Y') }}</td>
                    <td>{{ $comic->type }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('comics.show', ['comic' => $comic->id]) }}">Guarda</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
