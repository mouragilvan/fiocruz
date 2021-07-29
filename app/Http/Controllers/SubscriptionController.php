<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function index(){
      return Inertia::render('Subscription');
    }

    public function store(SubscriptionRequest $request){
         $data = $request->all();
         $data['name'] = strtoupper($data['name']);
         dd($data);
    }
}
