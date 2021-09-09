@extends('template.index')

@section('content')
<form action="{{route('commentaires.update', $commentaire->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container d-flex flex-column align-items-center">
        URL:<input type="file" name="url" value="{{$commentaire->url}}">
        IMG:<input type="file" name="img"value="{{$commentaire->img}}" >
        Duration:<input type="text" name="duration"value="{{$commentaire->duration}}" >
        Titre:<input type="text" name="titre"value="{{$commentaire->title}}" >
        Description:<textarea type="text" name="description" value="{{$commentaire->description}}"></textarea>
        <button type="submit" class="btn btn-primary">Validate</button>
    </div>
    </form>
@endsection