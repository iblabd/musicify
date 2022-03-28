<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::all();
        return view('musics.index', ['musics'=>$musics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'url_music' => 'required',
            'url_music.*' => 'music|mimes:mp3',
            'url_image' => 'required',
            'url_image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'lyric' => 'required'
        ]);

        $coverName = time() . '.' . $request->url_image->extension();
        $request->url_image->move(public_path() . '/img/cover/', $coverName);
        $musicName = time() . '.' . $request->url_music->extension();
        $request->url_music->move(public_path() . '/music/', $musicName);
        $music = Music::create([
            'title' => $request['title'],
            'artist' => $request['artist'],
            'url_music' => $musicName,
            'url_image' => $coverName,
            'lyric' => $request['lyric']
        ]);

        return back()->with('success', 'Music has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $music = Music::findorFail($id);
        return view('musics.show', ['music'=>$music]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music = Music::findorFail($id);
        return view('musics.edit', ['music'=>$music]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'url_music' => 'required',
            'url_music.*' => 'music|mimes:mp3',
            'url_image' => 'required',
            'url_image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'lyric' => 'required'
        ]);

        $music = Music::find($id);
        $coverName = time() . '.' . $request->url_image->extension();
        $request->url_image->move(public_path() . '/img/cover/', $coverName);
        $musicName = time() . '.' . $request->url_music->extension();
        $request->url_music->move(public_path() . '/music/', $musicName);
        $music = $music->update([
            'title' => $request['title'],
            'artist' => $request['artist'],
            'url_music' => $musicName,
            'url_image' => $coverName,
            'lyric' => $request['lyric']
        ]);
        
        return redirect('/detail')->with('success', 'music has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = Music::find($id);
        $music->delete();
        return redirect('/dashboard')->with('success', 'music has been deleted.');
    }
}
