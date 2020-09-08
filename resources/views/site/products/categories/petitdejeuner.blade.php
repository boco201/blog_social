@extends('layouts.app')

@section('title' | 'Petitdéjeuner')

@section('content')

<div class="container-fluid mt-4">
<h1 class="titre_principale" style="background-image: linear-gradient(red,black,teal); font-style:italic; height:100px; font-size:4em; line-height:100px; text-align:center; color:#fff;font-weight:bold;">Bénéficiez de ces bonnes recettes venant partout.</h1>
	<div class="row">
		<div class="col-md-10">
		<div class="row">
		@foreach($articles as $article)
			<div class="col-md-3"><br>
				<div class="card" style="width: 18rem;">
					<img src="{{asset('image/articles/'.$article->image )}}" class="card-img-top" alt="..." width="300" height="300">
					<div class="card-body">
					    <p style="color:red;font-size:2em;font-style:italic;">{{ $article->kichen }}.</p>
						<h2 class="card-title" style="font-family: 'Tangerine', cursive;font-size:4em;line-height:40px;"><a href="{{ $article->path() }}">{{ $article->title }}</a></h2>
						<p class="card-text" style="font-family: 'Tangerine', cursive;font-size:35px;line-height:40px;">{{ Str::limit($article->body, 100) }}.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		</div>
		<div class="col-md-2">	
					<h2 style="font-family: 'Tangerine', cursive;font-size:4em;line-height:40px;color:red;margin-top:20px;">Pub</h2>
					<p style="font-family: 'Tangerine', cursive;font-size:35px;line-height:40px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eaque sint magnam fuga molestias. Facilis modi aut iste, ipsa earum, explicabo animi dolores odit quis nihil perferendis quae excepturi sunt!
					Qui libero incidunt fugiat vero praesentium, rerum sequi. Tenetur minima illum facere deleniti dolorem quidem fuga itaque? Consectetur fugiat aperiam tempora, quas cum incidunt ab veniam magnam nisi blanditiis debitis.
					Atque fuga, similique a ullam id dicta autem nihil asperiores cupiditate iusto reprehenderit aperiam assumenda temporibus. Praesentium laudantium deserunt corrupti molestias quaerat distinctio obcaecati ad nam. Quo cum ipsa esse!</p>
		</div>
	</div>
</div>
<div class="contanier mt-4">
  {{ $articles->links() }}
</div>

@endsection 