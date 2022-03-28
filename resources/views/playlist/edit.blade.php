@extends('layouts.appnav')
@section('content')
        <form action="{{ url('playlist/edit', $playlist->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input name="playlist_name" type="text" placeholder="Input playlist name in here..." value="{{ $playlist->playlist_name }}">
            <button type="submit">Submit</button>
        </form>
@endsection