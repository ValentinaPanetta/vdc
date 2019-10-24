<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = Post::orderBy('id', 'desc')->take(3)->get();
        return view('welcome_logged', compact('post'));
    }
    public function indexguest()
    {

        $post = Post::orderBy('id', 'desc')->take(3)->get();
        return view('welcome_guest', compact('post'));
    }

   
}
