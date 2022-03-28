@extends('layouts.appnav')
@section('content')
        <form action="{{ url('playlist/add', $music->id ) }}" method="POST">
            @csrf
        <label for="playlist" id="playlist">Select Playlist</label>
          <select name="playlist_id" id="playlist">
              @foreach ($playlists as $playlist)
                <option value="{{$playlist->id}}">{{ $playlist->playlist_name }}</option>
            @endforeach
        </select>
        <button type="submit">Add to Playlist</button>
        </form>
@endsection