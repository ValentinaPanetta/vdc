<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\UploadTrait;

class AdminCrudUserController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = User::all();
        return view('admin/index', compact('res'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
       User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'registration_type' => $request['registration_type'],
            'image' => $request['image'],
            'role' => $request['role'],
            'gender' => $request['gender'],
        ]);
        $user = User::where('email', $request['email'])->first();
        $id = $user->id;
        $role = $user->role;

        switch ($role) {
            case "trainer":
                return redirect('/employee/'.$id.'/edit');
                break;
            case "consultant":
                return redirect('/consultant/'.$id.'/edit');
                break;
            case "course_provider":
                return redirect('/employee/'.$id.'/edit');
                break;
            default:
                return redirect()->route('admin.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return redirect('/admin');
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
       

        return view('admin/edit', compact('res'));
        

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
        return redirect('/admin');

   

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $profile_img = '/profile_imgs/'.$id.'/';
        $this->folderDestroyer('images', $profile_img);

        $docs = $id;
        $this->folderDestroyer('public', $docs);
        
         if(User::destroy($id)) {
           return redirect('admin');
         } else {
           return redirect('admin');
         }
    }


}
