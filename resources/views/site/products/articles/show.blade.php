@extends('layouts.app')

@section('title' | 'Show')

@section('content')

<div class="container-fluid mt-4">
<h1 class="titre_principale" style="background-image: linear-gradient(red,black,teal); margin-bottom:50px; height:100px; font-size:4em; font-style:italic; line-height:100px; text-align:center; color:#fff;font-weight:bold;">Bienvenue sur le Blog Culinaire Social</h1>

	<div class="row">

		<div class="col-md-8">
		
		<p style="color:red;font-size:2em;font-style:italic;">Recette {{ $article->category->category_name }} :<span class="span" style="font-family: 'Tangerine', cursive;font-size:4em;line-height:40px;"><a href="{{ route('site.products.index') }}">{{ $article->title }}</a></span></p>
		<p style="color:red;font-size:2em;font-style:italic;">préparé(es) par Maitre <span style="color:teal;">{{ $article->user->first_name }} {{ $article->user->last_name }} </span>- Pays {{ $article->user->country }} - Mail: <span style="color:teal;">{{ $article->user->email }}</span></p>
			
			<p><img src="{{asset('image/articles/'.$article->image )}}" width="100%" height="300"> </p> 
			<p style="color:teal;font-size:2em;font-style:italic;">{{ $article->kichen }}.</p>
			<p style="color:red;font-size:2em;font-style:italic;">Ingrediens</p>  
			<p style="font-family: 'Tangerine', cursive;font-size:35px;line-height:40px;">{{ $article->body }}.</p>
	
			<hr><br>
      <p style="color:red;font-size:2em;font-style:italic;">Préparation à la cuisson si necessaire</p> 
			<p><img src="{{asset('image/photos/'.$article->image )}}" width="100%" height="200"> </p>
      <h2 style="font-family: 'Tangerine', cursive;font-size:4em;line-height:40px;"><a href="{{ route('site.products.index') }}">{{ $article->titre }}</a></h2>
			<p style="font-family: 'Tangerine', cursive;font-size:35px;line-height:40px;">{{ $article->excerpt }}.</p>
			
			<hr><br>
      <p style="color:red;font-size:2em;font-style:italic;">Astuce</p>
			<p><img src="{{asset('image/medias/'.$article->image )}}" width="100%" height="200"> </p> 
			<h2 style="font-family: 'Tangerine', cursive;font-size:4em;line-height:40px;"><a href="{{ route('site.products.index') }}">{{ $article->niveau }}</a></h2>
			<p style="font-family: 'Tangerine', cursive;font-size:35px;line-height:40px;">{{ $article->description }}.</p>
		</div>
		<div class="col-md-4">
            <div class="row">
				<div class="col-md-6">
					<h2 style="font-family: 'Tangerine', cursive;color:red;font-size:4em;line-height:40px;">Pub</h2>
					<p style="font-family: 'Tangerine', cursive;font-size:35px;line-height:40px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, repudiandae. Illo similique ratione molestiae quibusdam praesentium aperiam sed autem, tempora nulla recusandae expedita debitis accusamus sint odio ea fugiat. Laboriosam.
					Modi, atque in ex velit dolores impedit amet voluptas iste inventore, suscipit ullam. Nihil repudiandae consequatur quia. Facilis unde, necessitatibus magnam quod ullam laborum asperiores perspiciatis ipsa delectus? Nostrum, sint?
					Laudantium, error soluta rem, nam similique adipisci quos odio possimus quidem dolore obcaecati! Aliquam iure sed blanditiis corporis obcaecati ex voluptatibus, maxime excepturi aspernatur neque voluptatum asperiores temporibus. Veritatis, fugit.</p>
				</div>
				<div class="col-md-6">
					<h2 style="font-family: 'Tangerine', cursive;color:red;font-size:4em;line-height:40px;">Pub</h2>
					<p style="font-family: 'Tangerine', cursive;font-size:35px;line-height:40px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, repudiandae. Illo similique ratione molestiae quibusdam praesentium aperiam sed autem, tempora nulla recusandae expedita debitis accusamus sint odio ea fugiat. Laboriosam.
					Modi, atque in ex velit dolores impedit amet voluptas iste inventore, suscipit ullam. Nihil repudiandae consequatur quia. Facilis unde, necessitatibus magnam quod ullam laborum asperiores perspiciatis ipsa delectus? Nostrum, sint?
					Laudantium, error soluta rem, nam similique adipisci quos odio possimus quidem dolore obcaecati! Aliquam iure sed blanditiis corporis obcaecati ex voluptatibus, maxime excepturi aspernatur neque voluptatum asperiores temporibus. Veritatis, fugit.</p>
				</div>
				
		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Contacter par mail le proprietaire
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title btn btn-primary" id="exampleModalLabel">Contacter le propietaire de l'annonce</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" action="{{ route('message') }}">
      @csrf
      <input id="id" name="id" type="hidden" value="{{ isset($article) ? $article->id : '' }}">
      <div class="modal-body">
        @guest
        <div class="form-group">
          <label>Email address</label>
          <input type="email" class="form-control" name="email" placeholder="mail" required>
        </div>
        @endguest
        <div class="form-group">
          <label>Content</label>
          <textarea name="message" id="message" cols="7" rows="7" class="form-control" placeholder="ajouter ici votre contenu" required>{{ old('texte', isset($value) ? $value : '') }}</textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Envoyer votre message</button>
      </div>
      </form>
    </div>
  </div>
</div>
 </div>
 <!-- Fin du modal-->
			</div>
		</div>
	</div>
</div>

<div class="container mt-4">
    <h3 style="color: blue; font-weight: bold;font-style: italic;">Commenté la recette du maitre {{ $article->user->first_name }}!</h3>
    <form method="post" action="{{ route('articles.comments.store')}}">
		@csrf

        <div class="form-group">
           <label for="comments">Commentaires: </label>  
           <textarea name="comments" class="form-control" rows="7" cols="10"></textarea>
           <input type="hidden" name="article_id" value="{{ $article->id }}">
           <div>{{ $errors->first('comments') }}</div>
        </div>

        <div>
           <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
        </div>

    </form>
</div><br>
<!--commentaires---> 
<div class="container">
    @foreach($article->comments as $comment)
       <h5><span style="color:red">Pseudo:</span> {{ $comment->user->first_name }}. <span style="color:teal">PAYS</span> {{ $comment->user->country }}</h5>
	     <p>{{ $comment->comments }}</p>
	@endforeach
</div>

@endsection

