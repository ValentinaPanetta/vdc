<?php

namespace App\Http\Controllers;

use App\User;
use App\Consultant;
use Illuminate\Http\Request;

class ConsultantUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'This is Index,  @ADD REDIRECT';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/consultant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/consultant');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
         $resUser = User::where('role', '=' , 'consultant')->find($user);

        if(!$resUser){
            echo 'is not a Consultant, we need a redirect here';
        }else{ 
            $res = $resUser->userConsultant;
            if($res ->isEmpty()){
                Consultant::create(['FK_user' => $user]);
                return redirect('consultant/'.$user);
            }else{
              
               /*
                resUser = User Table
                res = Consultant Table
               */
               return view('consultant.show', compact('resUser', 'res'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
         $res = User::where('role', '=' , 'consultant')->find($user)->userConsultant;
        return view('consultant/edit', compact('res'));
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
        Consultant::where('id', $id)->update($request->except(['_token','_method']));
        return redirect('consultant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return redirect('/consultant');
    }
}
