<?php

namespace App\Http\Controllers;

use App\ClientsToConsulting;
use App\User;
use Illuminate\Http\Request;

class ClientsToConsultingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $str =  User::all();
       return view('consultings.index', compact('str'));
        
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
     * @param  \App\ClientsToConsulting  $clientsToConsulting
     * @return \Illuminate\Http\Response
     */
    public function show(ClientsToConsulting $clientsToConsulting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientsToConsulting  $clientsToConsulting
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientsToConsulting $clientsToConsulting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientsToConsulting  $clientsToConsulting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientsToConsulting $clientsToConsulting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientsToConsulting  $clientsToConsulting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientsToConsulting $clientsToConsulting)
    {
        //
    }
}
