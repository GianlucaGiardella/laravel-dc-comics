@extends('layouts.base')

@section('content')
    <h1>Tabella Fumetti</h1>
    <hr>
    <a class="btn btn-primary" href="{{ route('comics.create') }}">Aggiungi</a>
    <a class="btn btn-secondary" href="{{ route('comics.trashed') }}">Cestino</a>

    @if (session('trash_success'))
        @php $comic = session('trash_success') @endphp
        <div class="alert alert-light mt-3">
            Il fumetto "{{ $comic->title }}" è stato spostato nel Cestino.
        </div>
    @endif

    <table class="table table-striped mt-4">
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
                <tr class="align-middle">
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->price / 100 }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ \Carbon\Carbon::parse($comic->date)->format('d/m/Y') }}</td>
                    <td>{{ $comic->type }}</td>
                    <td>
                        <a class="btn btn-outline-info"
                            href="{{ route('comics.show', ['comic' => $comic->id]) }}">&#8505;</a>
                        <a class="btn btn-outline-light" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">✏️</a>
                        <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-warning">&#128465;</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
