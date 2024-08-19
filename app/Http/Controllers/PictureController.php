<?php

namespace App\Http\Controllers;

use App\Models\PictureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PDO;

class PictureController extends Controller
{
    //
    public function create()
    {
        return view('create_picture');
    }

    public function save(Request $request)
    {

        $file = $request->file('file');
        $nama = $request->nama;

        $path = time() . '_' . $nama . '_'  . $file->getClientOriginalExtension();

        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        PictureModel::create(
            [
                'nama' => $nama,
                'path' => $path,
            ]
        );

        return Redirect::route('picture.create');
    }

    public function show(PictureModel $picture)
    {

        $url = Storage::url($picture->path);

        return view('show_picture', compact('url', 'picture'));
    }

    public function delete(PictureModel $picture)
    {

        Storage::delete('public/' . $picture->path);

        $picture->delete();

        return Redirect::route('picture.create');
    }

    public function copy(PictureModel $picture)
    {

        Storage::copy('public/' . $picture->path, 'copy/' . $picture->path);

        return Redirect::route('picture.create');

    }
    public function move(PictureModel $picture)
    {

        Storage::move('public/' . $picture->path, 'move/' . $picture->path);

        return Redirect::route('picture.create');

    }
}
