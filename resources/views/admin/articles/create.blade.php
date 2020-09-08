@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<div class="container mt-4">
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

	<h1>Ajouter une Annonce</h1>
	<form method="post" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
   @csrf
 
<div class="row">

<div class="col-md-6">
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

<div class="form-group">
   <label>Email Address</label>
    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="title">Titre: </label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Ajouter un Titre" value="{{old('title')}}">
    </diV>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="kichen">Type de Cuisine: </label>
        <input type="text" name="kichen" id="kichen" class="form-control" placeholder="Ex: Cuisine Française, Americaine, Africaine etc... " value="{{old('kichen')}}">
    </diV>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="titre">Titre: </label>
        <input type="text" name="titre" id="titre" class="form-control" placeholder="Ajouter un Titre de niveu 2" value="{{old('titre')}}">
    </diV>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="niveau">Titre: </label>
        <input type="text" name="niveau" id="niveau" class="form-control" placeholder="Ajouter un Titre de niveu 3" value="{{old('niveau')}}">
    </diV>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="body">Description1: </label>
        <textarea name="body" class="form-control" rows="7" cols="2" placeholder="Description facultatif" value="{{old('body')}}"></textarea>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="excerpt">Description2: </label>
        <textarea name="excerpt" class="form-control" rows="7" cols="2" placeholder="Description facultatif" value="{{old('excerpt')}}"></textarea>
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        <label for="description">Description3: </label>
        <textarea name="description" class="form-control" rows="7" cols="2" placeholder="Description facultatif" value="{{old('description')}}"></textarea>
    </div>
</div>


<div class="col-md-4">
    <div class="form-group">
        <label for="image">Upload une image 1 </label><br>
        <input type="file" name="image" id="image" class="btn btn-primary" placeholder="Ajouter une image" value="{{old('image')}}" >
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label for="photo">Upload une image 2 </label><br>
        <input type="file" name="photo" id="photo" class="btn btn-primary" placeholder="Ajouter une image" value="{{old('photo')}}" >
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label for="media">Upload une image 3 </label><br>
        <input type="file" name="media" id="media" class="btn btn-primary" placeholder="Ajouter une image" value="{{old('media')}}" >
    </div>
</div>

<div class="col-md-4">
<div class="form-group">
 <label for="upload">Upload une image 4 </label><br>
 <input type="file" name="upload" id="upload" class="btn btn-primary" placeholder="Ajouter une image" value="{{old('upload')}}" >
</div>
</div>

</div>

<div class="form-group">
 <button type="submit" class="btn btn-success">Ajouter une annonce</button>

</div>
</form>
</div>
</div>

@endsection

