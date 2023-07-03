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

        return view("comics.index", compact("comics"));
    }

    public function create()
    {
        return view("comics.create");
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

        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    public function show(Comic $comic)
    {
        return view("comics.show", compact("comic"));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}