<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class SubscriptionController extends Controller
{
    public function index(){
      return Inertia::render('SubscriptionForm');
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
            
            if( auth()->user()->is_admin ){
                $subs = Subscription::query();
                return Inertia::render('ListSubscriptions',[
                    'list'=>$subs->orderBy('id','desc')->paginate(1)
                ]);
            }            
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

    public function details(Subscription $subs)
    {
         return Inertia::render('Subscription',[
             'subs'=>$subs
         ]);
    }


}
