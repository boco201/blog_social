@extends('site.app_')
@section('title') Dashboard @endsection
@section('content')
<div class="container mt-4">
    <div class="row">

    <div class="col-md-8" >
        <ul class="list-group">
              <li class="list-group-item"><img src="{{asset('image/articles/'.$article->image )}}" width="700" height="400"></li>
          </ul>
         
         </div>  
         <div class="col-md-4">
          <ul class="list-group">
              <li class="list-group-item"><h3><a href="{{ route('site.profils.index') }}">{{ $article->title }}</a></h3></li>
              <li class="list-group-item">Category: </li>
              <li class="list-group-item"><span style="color:red;font-weight:bold;">Annonce publié il y a {{ $article->created_at->diffForHumans() }}</span></li>
              <li class="list-group-item"></li>
          </ul><br>

     </div>
        <div class="col-md-12"><br>
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action ">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1" class="mb-1" style="color:red;"> Description</h5>
              <small style="color:red;font-weight:bold;">{{ $article->created_at->diffForHumans() }}</small>
            </div>
            <p >{{ $article->description }}.</p>
            <small>Donec id elit non mi porta.</small>
          </a>
        </div>
        </div>
    </div>
</div><br>

@endsection
