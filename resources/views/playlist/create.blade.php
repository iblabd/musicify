@extends('layouts.appnav')
@section('content')
        <form action="{{ url('playlist/create') }}" method="POST">
            @csrf
            <input name="playlist_name" type="text" placeholder="Input playlist name...">
            <button type="submit">Submit</button>
        </form>
    </body>
@endsection