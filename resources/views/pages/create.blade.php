@extends('template.index')

@section('content')
<section class="back-port-form">
    <h1>Creation Video</h1>
    <h3 class="container ">Ajoutez une vidéo : </h3>
    <form class="container " action="{{route('videos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column justify-content-center">
        <label for="url">Url  :</label>
        <input type="text" name="url" id="">

        <label for="img">Image  :</label>
        <input type="file" name="img" id="">

        <label for="duration">Duration  :</label>
        <input type="text" name="duration" id="">

        <label for="title">Titre : </label>
        <input type="text" name="title" id="">

        <label for="description">Description : </label>
        <input type="text" name="description" id="">
        <button type="submit">Ajouter</button>
    </div>
    </form>
</section>

@endsection