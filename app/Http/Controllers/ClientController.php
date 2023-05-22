<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function categoryPage(){
        return view('home.pages.categoryPage');
    }
    public function addToCart(){
        return view('home.pages.addToCart');
    }
    public function checkout(){
        return view('home.pages.checkout');
    }
}
