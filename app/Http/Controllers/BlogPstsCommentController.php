<?php

namespace App\Http\Controllers;

use App\PostsComment;
use Illuminate\Http\Request;

class BlogPstsCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        PostsComment::create([
            'content' => $request['content'],
            'FK_post' => $request['FK_post'],
            'FK_author' => $request['FK_author'],
            
        ]);
            return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PostsComment  $postsComment
     * @return \Illuminate\Http\Response
     */
    public function show(PostsComment $postsComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostsComment  $postsComment
     * @return \Illuminate\Http\Response
     */
    public function edit(PostsComment $postsComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostsComment  $postsComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostsComment $postsComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostsComment  $postsComment
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        if(PostsComment::destroy($id)) {
            return redirect()->route('blog.index');
        } else {
            return redirect()->route('blog.index');
        }
    }
}
