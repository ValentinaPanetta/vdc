<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Traits\UploadTrait;
class BlogController extends Controller
{
     use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Post::all();

        return view('blog.index', compact('res'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $author = $request['FK_author'];
        /*     'image' => $request['image'],*/
        Post::create([
                    'title' => $request['title'],
                    'video' => $request['video'],
                    'content' => $request['content'],
                    'FK_author' => $request['FK_author'],
                    
                ]);

        $thisPostId = Post::all()->last()->id;
        $this_post = Post::where('FK_author','=', $author)->find($thisPostId);/*return 'lsls';*/

        $request->validate([
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->has('image')) {

            $image = $request->file('image');

            // Make a image name based on user name and current timestamp
            $name ='postimg';
            // Define folder path
            $folder = '/blog_imgs/'.$thisPostId.'_post_id/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
           
            // Upload image
            $this->upgradeOne($image, $folder, 'images', $name);
            // Set user profile image path in database to filePath
            $this_post->image = $filePath;
            Post::where('id', $thisPostId)->update($request->except(['_token','_method']));
            // Persist user record to database
            $this_post->save();

        }
        
           return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Post::find($id);
        return view('blog.show', compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit( $post)
    {
        $res = Post::find($post);
        return view('blog/edit', compact('res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Post::where('id', $id)->update($request->except(['_token','_method']));
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $folder = '/blog_imgs/'.$id.'_post_id/';
        $this->folderDestroyer('images', $folder);
        Post::destroy($id);
        return redirect()->route('blog.index');
       
    }
}
