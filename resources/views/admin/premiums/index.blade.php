@extends('admin.app')

@section('title', 'AdminPanel')

@section('content')


  <div class="container mt-4">
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
     <div class="row">

       @foreach($articles as $article)

          <div class="col-md-12">
            <form method="post" action="{{ route('admin.premiums.update', $article->id) }}">
                @csrf
                 @method('PATCH')
                 <label for="premiums" class="checkbox">
                  <h1 style="color: blue;">Category: {{ $article->category->category_name }}</h1>
                 <h2 style="color: tomato;"><input type="checkbox" name="premiums" onChange="this.form.submit()"> <a href="{{ route('admin.articles.show', $article->id )}}"> {{ $article->title }}</a>&nbsp&nbsp&nbsp <a href="{{ route('admin.articles.index') }}">AdminPanel</a></h2>

                </label>
                <p><img src="{{ asset('image/articles/'.$article->image )}}" width="100" height="100" alt="" /></p>
                  <p>{{ Str::limit( $article->body, 100) }}</p>
                <p class="date_publication">L'article est publié, {{ $article->created_at->diffForHumans() }}</p>
                 
              </form><br>
         <form method="post" action="{{ route('admin.premiums.destroy', $article->id) }}">
         @method('DELETE')
        @csrf
        <div>
          <button type="submit" class="btn btn-danger">Supprimer annonce</button>
        </div>

              </form>
            </div>
      
    @endforeach

  </div>
  
  <div class="container">
  <p>{{ $articles->links() }}</p>
  </div>   
@endsection