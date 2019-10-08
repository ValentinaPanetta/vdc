<?php

namespace App\Http\Controllers;

use App\User;
use App\Document;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

class DocumentController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*  $res = User::where('role', 'client')->get();*/
       /* return view('documents.index', compact('res'));*/
     /*  return $res;*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = User::where('role', 'client')->get();
        return view('documents.create', compact('res'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file_name = $request['name'];
        $user_id = $request['FK_user'];

        

/*        $request->validate([
            'doc'     =>  'doc|mimes:jpeg,png,jpg,gif|max:2048'
        ]);*/


        // Check if a profile doc has been uploaded
        if ($request->has('path')) {
            // Get doc file
            $doc = $request->file('path');
            // Make a doc name based on user name and current timestamp
            $name =$file_name.'_'.'userID'.'-'.$user_id;
            // Define folder path
            $folder = '/uploads/files/';
            // Make a file path where doc will be stored [ folder path + file name + file extension]
           $filePath = $folder . $name. '.' . $doc->getClientOriginalExtension();
            // Upload doc
            $this->uploadOne($doc, $folder, 'public', $name);
        }

        Document::create([
            'name'=>$request['name'],
            'FK_user'=>$request['FK_user'],
            'path'=>$filePath,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res=Document::where('FK_user', $id)->get();
        $user=User::find($id);
        return view('documents.show', compact('res', 'user'));

      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $res = Document::find($id);        
        $filename = last(explode('/',  $res->path));       
        $folder = '/uploads/files/';
        $this->deleteOne($folder, 'public', $filename);
        Document::destroy($id);
        return back();
    }
}
