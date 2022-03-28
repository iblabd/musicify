@extends('layouts.appnav')
@section('content')

<div class="info-container">
    <div class="cover center">
        <img src="{{ asset('img/cover/' . $music->url_image) }}">
    </div>
    <div class="info">
        <ul>
            <li><a class="btn" href="/music/edit/{{ $music->id }}">Edit</a></li>
            <li><form method="POST" action="{{ url('music/detail', $music->id ) }}">
                @csrf
                @method('DELETE')
                <button class="btn">delete</button>
            </form></li>
            <li><h3>Title</h3>{{ $music->title }}</li>
            <li><h3>Artist</h3>{{ $music->artist }}</li>
        </ul>
    </div>
    <div class="music center">
        <audio controls>
            <source src="{{ asset('music/' . $music->url_music) }}" type="audio/mp3">
            Your browser does not support the audio tag.
        </audio>
    </div>
    <div class="lyric">
        <h3>Lyrics</h3>
        <p>{{ $music->lyric }}</p>
    </div>
</div>
@endsection