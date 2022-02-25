<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('index')->with('posts', $posts);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'url_imagen' => 'required',
            'url_juego' => 'required',
        ];

        $customMessages = [
            'required' => 'Debe completar el campo :attribute.'
        ];

        $this->validate($request, $rules, $customMessages);

        $post = new Post([
            "name" => $request->nombre,
            "descrip" => $request->descripcion,
            "urlimage" => $request->url_imagen,
            "urlgame" => $request->url_juego,
        ]);
        $post->save();
        return redirect("/")->with(['success' => 'Juego creado correctamente']);
    }


    public function show(Post $post)
    {
        //
    }


    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('edit')->with('posts', $posts);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'url_imagen' => 'required',
            'url_juego' => 'required',
        ];

        $customMessages = [
            'required' => 'Debe completar el campo :attribute.'
        ];

        $this->validate($request, $rules, $customMessages);

        $post->update([
            "name" => $request->nombre,
            "descrip" => $request->descripcion,
            "urlimage" => $request->url_imagen,
            "urlgame" => $request->url_juego,
        ]);
        return redirect("/")->with(['success' => 'Juego actualizado correctamente']);

    }

    public function updateStatus(Request $request)
    {
        $post = Post::find($request->id);
        $post->status = $request->status;
        $post->save();
        return response()->json(['success' => 'Status actualizado correctamente.']);
    }


    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();
        return redirect("/")->with(['success' => 'Juego eliminado correctamente']);
    }
}

