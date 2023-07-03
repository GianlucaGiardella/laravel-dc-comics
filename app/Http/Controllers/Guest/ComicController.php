<?php

namespace App\Http\Controllers\Guest;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComicController extends Controller
{
    private $validations = [
        'title' => 'required|string|min:5|max:200',
        'description' => 'string',
        'thumb' => 'url|max:400',
        'price' => 'required|integer|min:3',
        'series' => 'required|string|min:5|max:80',
        'sale_date' => 'required|date',
        'type' => 'required|string|min:5|max:50',
        'artists' => 'array',
        'artists.*' => 'required|string',
        'writers' => 'array',
        'writers.*' => 'required|string',
    ];

    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    public function create()
    {
        return view('comics.create');
    }

    public function store(Request $request)
    {

        $request->validate($this->validations);

        $data = $request->all();

        $newComic = new Comic();
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        $newComic->artists = $data['artists'];
        $newComic->writers = $data['writers'];
        $newComic->save();

        return to_route('comics.show', ['comic' => $newComic->id]);
    }

    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    public function update(Request $request, Comic $comic)
    {
        $request->validate($this->validations);

        $data = $request->all();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $comic->artists = $data['artists'];
        $comic->writers = $data['writers'];
        $comic->update();

        return to_route('comics.show', ['comic' => $comic->id]);
    }

    public function destroy(Comic $comic)
    {
        $comic->delete();

        return to_route('comics.index')->with('trash_success', $comic);
    }

    public function restore($id)
    {
        Comic::withTrashed()->where('id', $id)->restore();

        $comic = Comic::find($id);

        return to_route('comics.trashed')->with('restore_success', $comic);
    }

    public function trashed()
    {
        $trashedComics = Comic::onlyTrashed()->get();

        return view('comics.trashed', compact('trashedComics'));
    }

    public function hard_delete($id)
    {
        $comic = Comic::withTrashed()->find($id);
        $comic->forceDelete();

        return to_route('comics.trashed')->with('delete_success', $comic);
    }
}