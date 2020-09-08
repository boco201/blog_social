@extends('site.app_')
@section('title') Dashboard @endsection
@section('content')
<div class="container mt-4">
@if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}        
        </div>
@endif

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

	<h1>Ajouter une Annonce</h1>
	<form method="post" action="{{ route('site.profils.update', $article->id) }}" enctype="multipart/form-data">
   @csrf
   @method('PATCH')

 <div class="row">

 <div class="col-md-12">
<div class="form-group">
   <h5 style="font-weight: bold;color: #000;font-style: italic;"><label for="category_id">Category * : </label></h5>
   <select name="category_id" id="category_id" class="form-control">
   <option value=""><-----------------------------------------Select Catégory-------------------------------------></option>
       @foreach($categories as $key => $category)
        <option value="{{ $key }}">{{ $category }}</option>
        @endforeach
     </select>
  </div>
</div>

<div class="col-md-12">
    <div class="form-group">
    <label>Email Address</label>
        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
</div>

 <div class="col-md-12">
    <div class="form-group">
        <label for="title">Titre: </label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Ajouter un Titre" value="{{ $article->title }}">
    </diV>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="kichen">Type de Cuisine: </label>
        <input type="text" name="kichen" id="kichen" class="form-control" placeholder="Ex: Cuisine Française, Americaine, Africaine etc... " value="{{ $article->kichen }}">
    </diV>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="titre">Titre: </label>
        <input type="text" name="titre" id="titre" class="form-control" placeholder="Ajouter un Titre de niveu 2" value="{{ $article->titre }}">
    </diV>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="niveau">Titre: </label>
        <input type="text" name="niveau" id="niveau" class="form-control" placeholder="Ajouter un Titre de niveu 3" value="{{ $article->niveau }}">
    </diV>
</div>


 <div class="col-md-12">
    <div class="form-group">
        <label for="body">Description1: </label>
        <textarea name="body" class="form-control" rows="7" cols="2" placeholder="Description facultatif">{{ $article->body }}</textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="description">Description2: </label>
        <textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif">{{ $article->description }}</textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="excerpt">Description3: </label>
        <textarea name="excerpt" class="form-control" rows="7" cols="2" placeholder="Description facultatif">{{ $article->excerpt }}</textarea>
    </div>
</div>

<div class="col-md-3">
   <div class="form-group">
   <label for="image">Upload une image1 </label><br>
   <img src="{{asset('image/articles/'.$article->image )}}" class="img-thumbnail" width="100" />
   <input type="file" name="image" value="{{ $article->image }}" />
   </div>
</div>

<div class="col-md-3">
<div class="form-group">
 <label for="photo">Upload une image2 </label><br>
 <img src="{{asset('image/photos/'.$article->photo )}}" class="img-thumbnail" width="100" />
 <input type="file" name="photo" value="{{ $article->photo }}" />
</div>
</div>

<div class="col-md-3">
<div class="form-group">
 <label for="media">Upload une image3 </label><br>
 <img src="{{asset('image/medias/'.$article->media )}}" class="img-thumbnail" width="100" />
 <input type="file" name="media" value="{{ $article->media }}" />
</div>
</div>

<div class="col-md-3">
<div class="form-group">
 <label for="upload">Upload une image4 </label><br>
 <img src="{{asset('image/uploads/'.$article->upload )}}" class="img-thumbnail" width="100" />
 <input type="file" name="upload" value="{{ $article->upload }}" />
</div>
</div>

</div>

<div class="form-group">
 <button type="submit" class="btn btn-success">Editer un article</button>

</div>
</form>
</div>
</div>

@endsection
