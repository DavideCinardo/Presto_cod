<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevaisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevaisorController extends Controller
{
    public $whyWork;

    public function index(){

        //prendere gli articoli da revisionare
        $articles_unchecked = Article::where('is_accepted', null)->first();
        //prendere gli articoli revisionati dal revisore loggato
        $articles_checked = Article::where('revisioned_from', Auth::user()->id)->first();
        //torna alla vista con questa variabile
        return view('revaisor.index', compact('articles_unchecked', 'articles_checked'));
    }

    public function show($article_unchecked){

        $articles = Article::where('id', $article_unchecked)->get();
        return view('revaisor.show', compact('articles'));
    }

    //funzione per accettare l'rticolo
    public function acceptArticle(Article $article){
        $article->revisioned_from = Auth::user()->id;
        $article->setAccepted(true);
        return redirect(route('revaisor.index'))->with('message', 'Complimenti hai accettato l\'articolo');
    }

    //funzione per rifiutare l'articolo
    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        return redirect(route('revaisor.index'))->with('message', 'Complimenti hai rifiutato l\'articolo');
    }

    //funzione per annullare ultima revisione
    public function nullRevision(Article $article_checked){
        $article_checked->setAccepted(null);
        $article_checked->revisioned_from = 1;
        $article_checked->save();
        return redirect(route('revaisor.index'))->with('message', 'Hai annullato la tua ultima modifica con successo');
    }

    //invio mail richiesta per diventare revisore
    public function becomeRevaisor(Request $request){
        
        Mail::to('admin@presto.it')->send(new BecomeRevaisor(Auth::user(), $request->whyWork));
        return redirect()->back()->with('message', 'La tua richiesta è stata inoltrata all\'admin, ti risponderemo entro 24h');
    }

    //funzione per rendere l'utente un revisore attraverso la mail
    public function makeRevaisor(User $user){
        Artisan::call('presto:makeUserRevaisor', ['email'=>$user->email]);
        return redirect(route('homepage'))->with('message', 'L\'utente ora è revisore');
    }
}
