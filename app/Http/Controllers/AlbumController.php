<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $album = Auth::user()->album()->create();
        $album->deleteExcess();
        $album->uploadImage($request->file('photo'), 'photos');
        return redirect()->back();
    }


    public function show(Album $album)
    {
        //
    }


    public function edit(Album $album)
    {
        //
    }

    public function update(Request $request, Album $album)
    {
        //
    }


    public function destroy(Album $album)
    {
        //
    }
}
