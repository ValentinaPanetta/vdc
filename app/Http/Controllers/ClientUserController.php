<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use Illuminate\Http\Request;

class ClientUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'your profile has been updated @ADD REDIRECT';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {     
        $resUser = User::where('role', '=' , 'client')->find($user);

        if(!$resUser){
            echo 'is not a Client '; //redirect
           // return redirect(' somewhere !!');
        }else{ 
            $res = $resUser->userClient;
            if($res ->isEmpty()){
                //it has Client role but does not have a row in clients table';
                //Create row and then refresh the page
                Client::create(['FK_user' => $user]);
                return redirect('client/'.$user);
            }else{
                //is a Client with row in clients table
               /*
                resUser = User Table
                res = Client Table
               */
               return view('client.show', compact('resUser', 'res'));
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
        $ur = User::where('role', '=' , 'client')->find($user);
        $res = User::where('role', '=' , 'client')->find($user)->userClient;
        return view('client/edit', compact('res','ur'));
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
        Client::where('id', $id)->update($request->except(['_token','_method']));
        $fk = Client::where('id','=', $id)->find($id)->FK_user;
        return redirect('/client/'.$fk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         return redirect('/client');
    }
}


