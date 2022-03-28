@extends('layouts.appnav')
@section('content')
    <h1>{{ $playlist->playlist_name }}</h1>

    <ul>
        @foreach ($musics as $music)
        <li>{{ $music->title }}<form method="POST" action="{{ url('playlist/detail', $music->id ) }}">
            @csrf
            @method('DELETE')
            <button>delete</button>
        </form></li>
        @endforeach
    </ul>
@endsection