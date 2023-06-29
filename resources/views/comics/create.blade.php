@extends('layouts.base')

@section('content')
    <h1>Inserisci Nuovo Fumetto</h1>
    <hr>
    <a class="btn btn-primary mb-4" href="{{ route('comics.index') }}">Torna Indietro</a>

    <form method="POST" action="{{ route('comics.store') }}">
        @csrf

        <div class="mb-4">
            <label for="title" class="form-label">TITOLO</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">DESCRIZIONE</label>
            <textarea class="form-control" id="description" rows="5" name="description"></textarea>
        </div>

        <div class="mb-4">
            <label for="thumb" class="form-label">INDIRIZZO IMMAGINE</label>
            <input type="text" class="form-control" id="thumb" name="thumb">
        </div>

        <div class="mb-4">
            <label for="price" class="form-label">PREZZO (IN CENTESIMI)</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>

        <div class="mb-4">
            <label for="series" class="form-label">SERIE</label>
            <input type="text" class="form-control" id="series" name="series">
        </div>

        <div class="mb-4">
            <label for="sale_date" class="form-label">DATA DI USCITA</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date">
        </div>

        <div class="mb-4">
            <label for="type" class="form-label">TIPOLOGIA</label>
            <input type="text" class="form-control" id="type" name="type">
        </div>

        <div class="mb-4">
            <label for="artists" class="form-label">ARTISTI</label>
            <input type="text" class="form-control mb-2" name="artists[]">
            <input type="text" class="form-control mb-2" name="artists[]">
            <input type="text" class="form-control mb-2" name="artists[]">
            <input type="text" class="form-control mb-2" name="artists[]">
            <input type="text" class="form-control mb-2" name="artists[]">
            <input type="text" class="form-control mb-2" name="artists[]">
        </div>

        <div class="mb-4">
            <label for="writers" class="form-label">SCRITTORI</label>
            <input type="text" class="form-control mb-2" name="writers[]">
            <input type="text" class="form-control mb-2" name="writers[]">
            <input type="text" class="form-control mb-2" name="writers[]">
            <input type="text" class="form-control mb-2" name="writers[]">
            <input type="text" class="form-control mb-2" name="writers[]">
            <input type="text" class="form-control mb-2" name="writers[]">
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
        <button type="reset" class="btn btn-danger">Resetta</button>
    </form>
@endsection
