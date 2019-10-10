<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\UploadTrait;

class UserAccountController extends Controller
{
    use UploadTrait;
/*    use Filesystem;*/
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $res = User::find($user);
       

        return view('account/edit', compact('res'));
            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', $id)->update($request->except(['_token','_method']));
        $account = User::where('id','=', $id)->find($id);
        $request->validate([
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // Check if a profile image has been uploaded
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name =$account->name.'_'.'userID'.'-'.$account->id;
            // Define folder path
            $folder = '/profile_imgs/'.$account->id.'/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
           $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
           
            // Upload image
            $this->upgradeOne($image, $folder, 'images', $name);
            // Set user profile image path in database to filePath
           $account->image = $filePath;
        }
        // Persist user record to database
        $account->save();



       switch ($account->role) {
            case "client":
                return redirect('/client/'.$account->id);
                break;
            case "trainer":
                return redirect('/employee/'.$account->id);
                break;
            case "consultant":
                return redirect('/consultant/'.$account->id);
                break;
            case "course_provider":
                return redirect('/employee/'.$account->id);
                break;
            case "off_admin":
                return redirect('/officeadmin/'.$account->id);
                break;
            case "employer":
                return redirect('/employer/'.$account->id);
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
