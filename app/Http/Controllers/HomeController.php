<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class HomeController extends Controller
{
    public function kegiatan_warga(){
        return view('kegiatan');
    }

    public function create(){
        $history = post::all();
        return view('welcome', compact('history'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'kategori' =>'required',
            'title'     => 'required',
            'content'   => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png',
            'status'    => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'kategori'  => $request->kategori,
            'title'     => $request->title,
            'content'   => $request->content,
            'image'     => $image->hashName(),
            'status'    => $request->status,
        ]);

        //redirect to index
        return redirect()->away(url('/'))->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
