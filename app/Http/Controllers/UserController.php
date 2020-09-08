<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Article;
use App\Notifications\AdMessage;
use App\Http\Requests\MessageAd;
use App\Repositories\ { AdRepository, MessageRepository };

class UserController extends Controller
{
    /**
     * Ad repository.
     *
     * @var App\Repositories\AdRepository
     */
    protected $adRepository;

    /**
     * Message repository.
     *
     * @var App\Repositories\Messagerepository
     */
    protected $messagerepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdRepository $adRepository, Messagerepository $messagerepository)
    {
        $this->adRepository = $adRepository;
        $this->messagerepository = $messagerepository;
    }

    /**
     * Send message.
     *
     * @param  App\Http\Requests\MessageAd  $request
     * @return \Illuminate\Http\Response
     */
    public function message(MessageAd $request)
    {
        $article = $this->adRepository->getById($request->id);

        if(auth()->check()) {
            $article->notify(new AdMessage($article, $request->message, auth()->user()->email));
            return redirect()->route('site.products.index')->withSuccess('votre message est reçu avec succès!'); 
        }

        $this->messagerepository->create([
            'texte' => $request->message,
            'email' => $request->email,
            'article_id' => $article->id,
        ]);

        return ('message envoyé'); 
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function messageSelect()
    {
        $messages = Message::all();

        return view('admin.products.messageselect', compact('messages'));
    }

}
