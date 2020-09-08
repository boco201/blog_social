<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Article, Comment, Category };

class ArticleController extends Controller  
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articles = Article::take(3)->latest()->get();
        $articles = Article::where('premiums', 1)->take(5)->latest()->get();
   
        return view('site.products.index', compact('articles'));
        //
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Article()
    {
        $articles = Article::where('premiums', 1)->orderBy('id', 'DESC')->paginate(7); 

        return view('site.products.articles.article', compact('articles'));
        //
    }
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Dessert()
    { 
        $articles = Category::find(1)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     

        return view('site.products.categories.dessert', compact('articles')); 
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Entree()
    { 
        $articles = Category::find(2)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     

        return view('site.products.categories.entree', compact('articles')); 
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Aperitif()
    { 
        $articles = Category::find(3)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     

        return view('site.products.categories.aperitif', compact('articles')); 
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Boisson()
    { 
        $articles = Category::find(4)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     

        return view('site.products.categories.boisson', compact('articles')); 
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Plat()
    { 
        $articles = Category::find(5)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     
        return view('site.products.categories.plat', compact('articles')); 
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Petitdejeuner()
    { 
        
        $articles = Category::find(6)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     

        return view('site.products.categories.petitdejeuner', compact('articles')); 
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Dejeuner()
    { 
        $articles = Category::find(7)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     

        return view('site.products.categories.dejeuner', compact('articles')); 
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Diner()
    { 
        $articles = Category::find(8)
        ->articles()->where('premiums', 1)
        ->orderBy('id', 'DESC')->paginate(12);
     
        return view('site.products.categories.diner', compact('articles')); 
    }








    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, $slug)
    {
        $comments =  Article::with('comments')->orderBy('id', 'DESC')->get(); 
    return view('site.products.articles.show', compact('article', 'comments'));
        //
    }
}
