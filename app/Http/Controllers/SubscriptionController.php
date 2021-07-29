<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

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

         dd($subs);
    }
}
