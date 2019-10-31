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
            $name =$file_name;
            // Define folder path
            $folder = $user_id.'/files/';
            // Make a file path where doc will be stored [ folder path + file name + file extension]
           $filePath = '/file/'.$name.'.'.$doc->getClientOriginalExtension().'/'.$user_id; 
            // Upload  /file/{filename}/{id}/
            $this->uploadOne($doc, $folder, 'public', $name);
        }

        $file_name_and_extension = $file_name.'.'.$doc->getClientOriginalExtension();
        Document::create([
            'name'=>$file_name_and_extension,
            'FK_user'=>$request['FK_user'],
            'path'=>$filePath,
        ]);

      return redirect('/documents/'.$user_id);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {


        $res = Document::find($id);         
        $filename =  $res->name;  
        $folder = '/'.$res->FK_user.'/files/';  
        $this->deleteOne($folder, 'public', $filename);
        Document::destroy($id);
        return back();

    }
}
