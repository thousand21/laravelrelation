@extends('template.index')
 
@section('content')
<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text">{{$video->url}}</p>
            <p class="card-text"><img style="width: 80px" src="{{asset('img/'.$video->img)}}" alt=""></p>
            <p class="card-text">{{$video->description}}</p>
        <a class="btn btn-warning" href="{{route('videos.edit', $video->id)}}">Edit Video</a>
        <form action="{{route('videos.destroy', $video->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
</div>
@endsection