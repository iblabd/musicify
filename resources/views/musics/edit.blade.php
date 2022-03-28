@extends('layouts.appnav')
@section('content')

        <form action="{{ url('music/edit', $music->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
            <input name="title" type="text" placeholder="Title" value="{{$music->title}}">
            <input name="artist" type="text" placeholder="Artist" value="{{$music->artist}}">
            <input name="url_music" type="text" placeholder="Music Url" value="{{$music->url_music}}">
            <input name="url_image" type="file" placeholder="Choose Image">
            <textarea name="lyric" placeholder="Input lyrics in here...">{{$music->title}}</textarea>
            <button type="submit">Submit</button>
        </form>
@endsection