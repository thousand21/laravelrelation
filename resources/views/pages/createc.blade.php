@extends('template.index')

@section('content')
<section class="back-port-form">
    <h1>Create Commentaire</h1>
    <h3 class="container ">Ajoutez un commentaire : </h3>
    <form class="container " action="{{route('commentaires.store')}}" method="post">
        @csrf
        <div class="d-flex flex-column justify-content-center">
        <label for="nom">nom  :</label>
        <input type="text" name="nom" id="">

        <label for="prenom">Prenom  :</label>
        <input type="text" name="prenom" id="">

        <label for="dateDePublication">Date de publication:</label>
        <input type="text" name="dateDePublication" id="">

        <label for="contenu">contenu: </label>
        <input type="textarea" name="contenu" id="">

        
        <button type="submit">Ajouter</button>
    </div>
    </form>
</section>

@endsection