@extends('layouts.base')

@section('content')
    <h1>Tabella Fumetti</h1>
    <hr>
    <a class="btn btn-primary mb-4" href="{{ route('comics.create') }}">Aggiungi</a>

    @if (session('delete_success'))
        @php $comic = session('delete_success') @endphp
        <div class="alert alert-danger">
            Il fumetto "{{ $comic->title }}" è stato eliminato.
        </div>
    @endif

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
                        <a class="btn btn-warning" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica</a>
                        <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
