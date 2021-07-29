<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class SubscriptionController extends Controller
{
    public function index(){
      return Inertia::render('Subscription');
    }

    public function store(SubscriptionRequest $request){
         $data = $request->all();
         $data['name'] = strtoupper($data['name']);
         $user = User::find( auth()->user()->id  );
         $subs = $user->subscriptions()->create( $data );

        return redirect()->route('home');
    }

    public function home()
    {
         if( auth()->check() ){
             return Inertia::render('ListSubscriptions',[
                 'list'=>auth()->user()->subscriptions()->orderBy('id','desc')->paginate(1)
             ]);
         }
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }


}
