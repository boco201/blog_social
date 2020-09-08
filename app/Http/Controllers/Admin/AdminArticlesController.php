<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{ Article, Category, User };

class AdminArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('category')->orderBy('id', 'DESC')->paginate(4);

        return view('admin.articles.index', compact('articles'));
        //
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category_name', 'id');

        return view('admin.articles.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:12|max:255',
            'titre' => 'required|min:12|max:255',
            'niveau' => 'required|min:12|max:255',
            'description' => 'required|min:12|max:2555',
            'body' => 'required|min:12|max:2555',
            'excerpt' => 'required|min:12|max:2555',
            'kichen' => 'required|min:12|max:255'
        ]);
         // dd(request()->all());
         $article = new Article();
         $article->title = $request->title;
         $article->email = Auth()->user()->email;
         $article->kichen = $request->kichen;
         $article->category_id = $request->category_id;
         $article->titre = $request->titre;
         $article->niveau = $request->niveau;
         $article->description = $request->description;
         $article->excerpt = $request->excerpt;
         $article->body = $request->body;
         $article->image('image', $article);
         $article->photo('photo', $article);
         $article->media('media', $article);
         $article->upload('upload', $article);
         $article->user_id = Auth()->user()->id;
 
         if ($article->save()) {
             return redirect()->route('admin.articles.index')->withSuccess('Votre article est ajouté avec succès! dit le développeur boco!');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::pluck('category_name', 'id');

        return view('admin.articles.edit', compact('article', 'categories'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:12|max:255',
            'titre' => 'required|min:12|max:255',
            'niveau' => 'required|min:12|max:255',
            'description' => 'required|min:12|max:2555',
            'body' => 'required|min:12|max:2555',
            'kichen' => 'required|min:12|max:255',
            'excerpt' => 'required|min:12|max:2555'
        ]);
         // dd(request()->all());
         $article->category_id = $request->category_id;
         $article->title = $request->title;
         $article->email = Auth()->user()->email;
         $article->kichen = $request->kichen;
         $article->titre = $request->titre;
         $article->niveau = $request->niveau;
         $article->description = $request->description;
         $article->excerpt = $request->excerpt;
         $article->body = $request->body;
         $article->image('image', $article);
         $article->photo('photo', $article);
         $article->media('media', $article);
         $article->upload('upload', $article);
         $article->user_id = Auth()->user()->id;
 
         if ($article->save()) {
             return redirect()->route('admin.articles.index')->withSuccess('Votre article est édité avec succès! dit le développeur boco!');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->delete()) {
            return redirect()->route('admin.articles.index')->withDanger('Votre article estsupprimé avec succès! dit le développeur boco!');
        }

    }
}
