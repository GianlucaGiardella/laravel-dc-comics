@extends('layouts.base')

@section('content')
    <h1>FUMETTO N.{{ $comic->id }}</h1>
    <hr>
    <a class="btn btn-primary mb-4" href="{{ route('comics.index') }}">Torna Indietro</a>

    <div class="card">
        <img src="{{ $comic->thumb }}" style="max-height: 1000px; object-fit: cover;" class="card-img-top"
            alt="{{ $comic->title }}">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>TITOLO:</strong> {{ $comic->title }}</li>
            <li class="list-group-item"><strong>DESCRIZIONE:</strong> {{ $comic->description }}</li>
            <li class="list-group-item"><strong>SERIE:</strong> {{ $comic->series }}</li>
            <li class="list-group-item"><strong>TIPOLOGIA:</strong> {{ $comic->type }}</li>
            <li class="list-group-item"><strong>DATA DI USCITA:</strong>
                {{ \Carbon\Carbon::parse($comic->date)->format('d/m/Y') }}</li>
            <li class="list-group-item"><strong>PREZZO(€):</strong> {{ $comic->price / 100 }}</li>
            <li class="list-group-item"><strong>ARTISTI:</strong>
                @foreach ($comic->artists as $artist)
                    <span>{{ $artist }}, </span>
                @endforeach
            </li>
            <li class="list-group-item"><strong>SCRITTORI:</strong>
                @foreach ($comic->writers as $writer)
                    <span>{{ $writer }}, </span>
                @endforeach
            </li>
        </ul>
    </div>
@endsection
