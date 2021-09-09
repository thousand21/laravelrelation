@extends('template.index')
@section('content')

<h1> MeTube</h1>
<a href="{{route('videos.create')}}" class="btn btn-success">Create Video</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">url</th>
        <th scope="col">img</th>
        <th scope="col">duration</th>
        <th scope="col">title</th>
        <th scope="col">description</th>
        <th scope="col">boutons</th>
      </tr>
    </thead>
    
  
  <tbody>
@foreach ($video as $item)

<tr>
    
        <th scope="row">{{$item->id}}</th>
      
    
      <th scope="row">{{$item->url}}</th>
    
    
      <th scope="row"><img style="width: 40px" src="{{asset('img/'.$item->img)}}" alt=""></th>
    
    
      <th scope="row">{{$item->duration}}</th>
    
    
      <th scope="row">{{$item->title}}</th>
    
    
      <th scope="row">{{$item->description}}</th>

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