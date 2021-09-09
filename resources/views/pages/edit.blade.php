@extends('template.index')

@section('content')
<form action="{{route('videos.update', $video->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container d-flex flex-column align-items-center">
        URL:<input type="file" name="url" value="{{$video->url}}">
        IMG:<input type="file" name="img"value="{{$video->img}}" >
        Duration:<input type="text" name="duration"value="{{$video->duration}}" >
        Titre:<input type="text" name="titre"value="{{$video->title}}" >
        Description:<textarea type="text" name="description" value="{{$video->description}}"></textarea>
        <button type="submit" class="btn btn-primary">Validate</button>
    </div>
    </form>
@endsection