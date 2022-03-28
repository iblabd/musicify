@extends('layouts.app')
@section('content')


        <a href="/music/add">Add Music</a>

        <div class="container-header center">
          <h1>Listen to Popular Songs</h1>
          <p>You could find a new type of music.</p>
        </div>
<div class="music">
  <table class="track">
    <tbody>
      @foreach ($musics as $music)
      <tr class="track-row">
        <td class="track-icon"><i class="fa-solid fa-play"></i></td>
        <td class="track-image"><img class="track-image" src="{{ asset('img/cover/' . $music->url_image) }}"></td>
        <td class="track-title"><a href="/music/detail/{{ $music->id }}">{{ $music->title }}</a></td>
        <td class="track-artist">{{ $music->artist }}</td>
        <td class="track-icon"><a class="btnsize" href="/playlist/add/{{ $music->id }}"><i class="fa-solid fa-plus"></a></i></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection