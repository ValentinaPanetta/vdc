<?php

namespace App\Http\Controllers;

use App\Consulting;
use App\User;
use App\Payment;
use App\ClientsToCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
    $authId = Auth::user()->id;
    $res = DB::table('consultings')  // Get All the consultings where i am subscribed
        ->select('title', 'FK_consulting', 'consult_date', 'duration','consultings.id as con_ID')
        ->join('clients_to_consultings', 'FK_consulting', 'consultings.id')
        ->join('users', 'users.id', 'FK_client')
        ->where('users.id', $authId)
        ->get();      
    $courses = Payment::where('FK_client', Auth::id())->get();   

    
    return view('calendar_page', compact('res','courses'));
       /**/
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       /* $conUser = User::where('role', '=', 'consultant')->get();
        $trnUser = User::where('role', '=', 'trainer')->get();
        return view('consultings.create', compact('conUser','trnUser'));*/

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*        Consulting::create([
            'title' => $request['title'],
            'type' => $request['type'],
            'duration' => $request['duration'],
            'consult_date' => $request['consult_date'],
            'country' => $request['country'],
            'zipCode' => $request['zipCode'],
            'street' => $request['street'],
            'city' => $request['city'],          
            'FK_trainer' => $request['FK_trainer'],
            'FK_consultant' => $request['FK_consultant'],
            'consult_limit' => $request['consult_limit'],
        ]);*/

        return redirect()->route('consultings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulting  $consulting
     * @return \Illuminate\Http\Response
     */
    public function show($consulting)
    {
        $res = Consulting::find($consulting);
/*        $p = Consulting::with('consultingClient')->find($consulting);*/
        return view('consultings.show', compact('res'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulting  $consulting
     * @return \Illuminate\Http\Response
     */
    public function edit( $consulting)
    {   
    /*    $conUser = User::where('role', '=', 'consultant')->get();
        $trnUser = User::where('role', '=', 'trainer')->get();
        $res = Consulting::find($consulting);
        return view('consultings.edit', compact('res','conUser','trnUser'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulting  $consulting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
/*        Consulting::where('id', $id)->update($request->except(['_token','_method']));
        return redirect('consultings/'.$id);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulting  $consulting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
/*
        Consulting::destroy($id);
        return redirect()->route('consultings.index');*/
    }


    

}