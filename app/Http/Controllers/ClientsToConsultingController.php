<?php

namespace App\Http\Controllers;
use App\Consulting;
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

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    // function triggered from consultings/show View
    {
        ClientsToConsulting::create([          
            'FK_client' => $request['FK_client'],
            'FK_consulting' => $request['FK_consulting'],
        ]);
        return redirect('../consultings/'.$request['FK_consulting']);
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
    public function destroy($id)
    {
       /* $con = Consulting::find($id);

        $con->consultingClient()->detach($roleId);



        $detach = ClientsToConsulting::where('FK_client', '=', $request['FK_client'])
        ->where('FK_consulting', '=', $request['FK_consulting'])
        ->firstOrFail();
        $detach->destroy();

        return redirect('../consultings/'.$request['FK_consulting']);*/

    }
    public function detach($fx, $fy)
    {
       echo $fx. ' '.$fy;

    }
}
