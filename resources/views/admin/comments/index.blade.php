@extends('admin.app')

@section('title', 'AdminPanelComments')

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

       @foreach($comments as $comment)

          <div class="col-md-12">
            <form method="post" action="{{ route('admin.comments.update', $comment->id) }}">
                @csrf
                 @method('PATCH')
                 <label for="premiums" class="checkbox">
                  
                 <h2 style="color: tomato;"><input type="checkbox" name="premiums" onChange="this.form.submit()"> <a href=""> {{ Str::limit($comment->comments, 100)  }}</a>&nbsp&nbsp&nbsp <a href="{{ route('admin.articles.index') }}">AdminPanel</a></h2>

                </label>
                <p><img src="{{ asset('image/articles/'.$comment->article->image )}}" width="100" height="100" alt="" /></p>
                  <p>{{ Str::limit( $comment->article->body, 100) }}</p>
                <p class="date_publication">L'article est publié, {{ $comment->created_at->diffForHumans() }}</p>
                <h5 style="color: blue;">Aricle_id: {{ $comment->article->id }}</h5>
                <h5 style="color: blue;">Aricle_id: {{ $comment->user->email }}</h5>
              </form><br>
         <form method="post" action="{{ route('admin.comments.destroy', $comment->id) }}">
         @method('DELETE')
        @csrf
        <div>
          <button type="submit" class="btn btn-danger">Supprimer un commentaire</button>
        </div>

              </form>
            </div>
      
    @endforeach

  </div>
  
  <div class="container">
  <p>{{ $comments->links() }}</p>
  </div>   
@endsection

