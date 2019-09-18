<?php

namespace App\Http\Controllers;

use App\User;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
       
        if(Auth::user()) {

            $res = User::where('email', '=', Auth::user()->email)->get();
            $resNL = Newsletter::where('email', '=', Auth::user()->email)->get();
            if( $resNL->isEmpty()){
                $sub = 'no';
            }else{
                $sub='yes';
            }
        }else{
            return view('newsletter/guest');
        }
        return view('newsletter/index', compact('res','resNL','sub')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsletter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Newsletter::create([
            
            'email' => $request['email'],
            
        ]);

        return redirect('../');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {      

         $res = Newsletter::find($id);       

        return view('newsletter/delete', compact('res'));

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Newsletter::destroy($id)) {
            return redirect('home');
        } else {
            return redirect('home');
        }
    }
}
