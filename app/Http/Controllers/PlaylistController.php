<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;
use App\Models\PlaylistData;
use App\Models\Music;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $playlists = Playlist::where('playlist.user_id', ['user_id'=>$user_id])->get();
        return view('playlist.index', ['playlists'=>$playlists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['playlist_name' => 'required']);
        $user_id = Auth::id();
        $playlist = Playlist::create([
            'playlist_name'=>$request['playlist_name'],
            'user_id'=>$user_id
        ]);
        return back()->with('success', 'Playlist has been created.');
    }

    public function add($id)
    {
        $music = Music::findorFail($id);
        $user_id = Auth::id();
        $playlists = Playlist::where('playlist.user_id', ['user_id'=>$user_id])->get();
        return view('playlist.add', ['music'=>$music, 'playlists'=>$playlists]);
    }

    public function added(Request $request, $id)
    {
        $request->validate(['playlist_id' => 'required']);
        $music = Music::find($id);
        $playlist = PlaylistData::create([
            'playlist_id'=>$request['playlist_id'],
            'music_id'=>$music['id']
        ]);
        return back()->with('success', 'Song added to playlist.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist = Playlist::findorFail($id);
        $musics = PlaylistData::where('playlistdata.playlist_id', ['playlist_id'=>$id])
                                    ->join('playlist as playlist', 'playlist.id', '=', 'playlistdata.playlist_id')
                                    ->join('musics as musics', 'musics.id', '=', 'playlistdata.music_id')
                                    ->get();

        return view('playlist.show', ['playlist'=>$playlist, 'musics'=>$musics]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlist = Playlist::findorFail($id);
        return view('playlist.edit', ['playlist'=>$playlist]);
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
        $request->validate(['playlist_name' => 'required']);
        $user_id = Auth::id();
        $playlist = Playlist::find($id)->update([
            'playlist_name'=>$request['playlist_name'],
            'user_id'=>$user_id
        ]);

        return redirect('/playlist')->with('success', 'playlist has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();
        return back()->with('success', 'Playlist has been deleted.');
    }

    public function remove($id)
    {
        // $playlist = PlaylistData::find($id)->delete();
        $playlist = PlaylistData::where('playlistdata.music_id', ['music_id'=>$id])->delete();
        return back()->with('success', 'Music has been removed from playlist.');
    }
}
