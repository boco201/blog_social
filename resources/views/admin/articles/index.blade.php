@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container">
@if (count($errors) > 0)
      <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
                </ul>
            </div>
 @endif

 @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}        
        </div>
@endif

@if (session()->has('danger'))
        <div class="alert alert-danger">
            {{ session()->get('danger') }}        
        </div>
@endif
<div class="container">
 <h4 style="text-align:center; height:20px; line-height:20px; margin-left:900px;" ><a href="{{ route('admin.articles.create') }}" ><svg class="bi bi-plus-circle-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
</svg></a></h4>
   <table class="table table-condensed">
      <tr class="table_profils">
          <td>Id</td>
          <td class="medias_titre">Category_Name</td>
          <td>Image</td>
          <td>Titre</td>
          <td class="medias_titre">Description</td>
          <td>Editer</td>
          <td>Supprimer</td>
          <td></td>
      </tr>
      @foreach($articles as $article)
    <tr>
    <td>{{ $article->id }}</td>
    <td class="medias_titre">{{ $article->category->category_name }}</td>
    <td><img src="{{asset('image/articles/'.$article->image )}}" width="100" height="100"></td>
        <td><a href="{{ route('admin.articles.show', $article->id) }}"> {{ $article->title}} </a>&nbsp&nbsp&nbsp<a href="">AdminPremiums</a></td>
        <td class="medias_titre">{{ Str::limit($article->description, 50)}}</td>
        <td><a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-secondary"><svg class="bi bi-pencil" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
  <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
</svg></a></td>
        <td><form method="post" action="{{ route('admin.articles.destroy', $article->id) }}" enctype="multipart/form-data">
   @csrf
   @method('DELETE')

<div class="form-group">
 <button type="submit" class="btn btn-danger"><svg class="bi bi-trash-fill" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
</svg></button>

</div>
</form></td>
        </tr>
        @endforeach
  
</div>
   </table>
   </div>
</div>
<div class="container">
  <p>{{ $articles->links() }}</p>
</div>

@endsection
