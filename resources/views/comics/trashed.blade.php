@extends('layouts.base')

@section('content')
    <h1>Cestino Fumetti</h1>
    <hr>
    <a class="btn btn-primary" href="{{ route('comics.index') }}">Torna Indietro</a>

    @if (session('delete_success'))
        @php $comic = session('delete_success') @endphp
        <div class="alert alert-danger mt-3">
            Il fumetto "{{ $comic->title }}" è stato eliminato.
        </div>
    @endif

    @if (session('restore_success'))
        @php $comic = session('restore_success') @endphp
        <div class="alert alert-success mt-3">
            Il fumetto "{{ $comic->title }}" è stato ripristinato.
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
            @foreach ($trashedComics as $comic)
                <tr>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->price / 100 }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ \Carbon\Carbon::parse($comic->date)->format('d/m/Y') }}</td>
                    <td>{{ $comic->type }}</td>
                    <td>
                        <form action="{{ route('comics.restore', ['comic' => $comic->id]) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            <button class="btn btn-success">Ripristina</button>
                        </form>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $comic->id }}">
                            Elimina
                        </button>

                        <div class="modal fade" id="modal{{ $comic->id }}" tabindex="-1"
                            aria-labelledby="modal{{ $comic->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal{{ $comic->id }}Label">Sicuro di voler
                                            eliminare il fumetto ?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('comics.hard_delete', ['comic' => $comic->id]) }}"
                                            method="POST" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
