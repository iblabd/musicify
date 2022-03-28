@extends('layouts.appnav')
@section('content')
        <a href="/playlist/create">Create Playlist</a>

        <ul>
          @foreach ($playlists as $playlist)
          <li><a href="/playlist/detail/{{ $playlist->id }}"> {{ $playlist->playlist_name }} </a><a href="/playlist/edit/{{ $playlist->id }}">Edit</a><form method="POST" action="{{ url('playlist', $playlist->id ) }}">
            @csrf
            @method('DELETE')
            <button>delete</button>
        </form></li>
          
          @endforeach
        <ul>
@endsection