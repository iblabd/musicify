@extends('layouts.appnav')
@section('content')

        <form action="{{ url('music/add') }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        <table class="form">
          <tr><input name="title" type="text" placeholder="Title"></tr>
            <tr><input name="artist" type="text" placeholder="Artist"></tr>
            <tr><label for="url_music">Music</label>
              <input id="url_music" name="url_music" type="file" placeholder="Music Url"></tr>
            <tr>
              <label for="url_image">Image</label>
              <input id="url_image" name="url_image" type="file" placeholder="Choose Image"></tr>
            </tr>
            <tr>
              <textarea name="lyric" placeholder="Input lyrics in here..."></textarea>
            </tr>
        </table>
            <button type="submit">Submit</button>
        </form>
@endsection