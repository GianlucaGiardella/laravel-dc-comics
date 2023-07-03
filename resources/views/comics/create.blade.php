@extends('layouts.base')

@section('content')
    <h1>Inserisci Nuovo Fumetto</h1>
    <hr>
    <a class="btn btn-primary mb-4" href="{{ route('comics.index') }}">Torna Indietro</a>

    <form method="POST" action="{{ route('comics.store') }}">
        @csrf

        <div class="mb-4">
            <label for="title" class="form-label">TITOLO</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}">
            <div class="invalid-feedback">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">DESCRIZIONE</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5"
                name="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="thumb" class="form-label">INDIRIZZO IMMAGINE</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb"
                value="{{ old('thumb') }}">
            <div class="invalid-feedback">
                @error('thumb')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="price" class="form-label">PREZZO (IN CENTESIMI)</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price') }}">
            <div class="invalid-feedback">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="series" class="form-label">SERIE</label>
            <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series"
                value="{{ old('series') }}">
            <div class="invalid-feedback">
                @error('series')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="sale_date" class="form-label">DATA DI USCITA</label>
            <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date "
                value="{{ old('sale_date') }}" name="sale_date">
            <div class="invalid-feedback">
                @error('sale_date')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="type" class="form-label">TIPOLOGIA</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                value="{{ old('type') }}">
            <div class="invalid-feedback">
                @error('type')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="artists" class="form-label">ARTISTI</label>
            <input type="text" class="form-control @error('artists.0') is-invalid @enderror mb-2" name="artists[]"
                value="{{ old('artists.0') }}">
            <div class="invalid-feedback">
                @error('artists.0')
                    {{ $message }}
                @enderror
            </div>
            <input type="text" class="form-control @error('artists.1') is-invalid @enderror mb-2" name="artists[]"
                value="{{ old('artists.1') }}">
            <div class="invalid-feedback">
                @error('artists.1')
                    {{ $message }}
                @enderror
            </div>
            <input type="text" class="form-control @error('artists.2') is-invalid @enderror mb-2" name="artists[]"
                value="{{ old('artists.2') }}">
            <div class="invalid-feedback">
                @error('artists.2')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="writers" class="form-label">SCRITTORI</label>
            <input type="text" class="form-control @error('writers.0') is-invalid @enderror mb-2" name="writers[]"
                value="{{ old('writers.0') }}">
            <div class="invalid-feedback">
                @error('writers.0')
                    {{ $message }}
                @enderror
            </div>
            <input type="text" class="form-control @error('writers.1') is-invalid @enderror mb-2" name="writers[]"
                value="{{ old('writers.1') }}">
            <div class="invalid-feedback">
                @error('writers.1')
                    {{ $message }}
                @enderror
            </div>
            <input type="text" class="form-control @error('writers.2') is-invalid @enderror mb-2" name="writers[]"
                value="{{ old('writers.2') }}">
            <div class="invalid-feedback">
                @error('writers.2')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi</button>
        <button type="reset" class="btn btn-danger">Resetta</button>
    </form>
@endsection
