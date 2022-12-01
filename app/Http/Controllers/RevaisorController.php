<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevaisor;
use App\Mail\YouAreRevaisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevaisorController extends Controller
{
    public $whyWork;

    public function index(){
        //torna alla vista con questa variabile
        return view('revaisor.index');
    }

    //invio mail richiesta per diventare revisore
    public function becomeRevaisor(Request $request){
        
        Mail::to('admin@presto.it')->send(new BecomeRevaisor(Auth::user(), $request->whyWork));
        return redirect()->back()->with('message', 'La tua richiesta è stata inoltrata all\'admin, ti risponderemo entro 24h');
    }

    //funzione per rendere l'utente un revisore attraverso la mail
    public function makeRevaisor(User $user){
        Artisan::call('presto:makeUserRevaisor', ['email'=>$user->email]);
        Mail::to($user->email)->send(new YouAreRevaisor($user));
        return redirect(route('homepage'))->with('message', 'L\'utente ora è revisore');
    }
}
