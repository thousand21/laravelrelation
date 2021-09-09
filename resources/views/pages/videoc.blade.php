@extends('template.index')
@section('content')

<h1> MeTube</h1>
<a href="{{route('commentaires.create')}}" class="btn btn-success">Add Commentaires</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">nom</th>
        <th scope="col">prenom</th>
        <th scope="col">dateDePublication</th>
        <th scope="col">contenu</th>
        <th scope="col">video_id</th>
        <th scope="col">boutons</th>
      </tr>
    </thead>
    
  
  <tbody>
@foreach ($commentaire as $item)

<tr>
    
        <th scope="row">{{$item->id}}</th>
      
    
      <th scope="row">{{$item->nom}}</th>
    
    
      <th scope="row">{{$item->prenom}}</th>
    
    
      <th scope="row">{{$item->dateDePublication}}</th>
    
    
      <th scope="row">{{$item->contenu}}</th>
    
    
      <th scope="row">{{$item->video_id}}</th>

      <td>
        <div class="d-flex">
            <form action="{{route('videos.destroy', $item->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class=" btn rounded m-3 bg-danger" type="submit">Delete</button>
            </form>

            <button class="btn rounded m-3 bg-warning"><a class="text-decoration-none" href="{{route('videos.show', $item->id)}}">Show Video</a></button>

            <button class=" btn rounded m-3 bg-success"><a class="text-decoration-none" href="{{route('videos.edit',$item->id)}}">Edit Video</a></button>
        </div>
    </td>
</tr>  
   
  
@endforeach
</tbody>
</table>
@endsection