<?php

namespace App\Http\Controllers;
use App\ClientsToConsulting;
use Illuminate\Http\Request;

class ClientsToConsultingController extends Controller
{

     // function triggered from consultings/show View
    public function attach(Request $request) 
    {
        ClientsToConsulting::create([          
            'FK_client' => $request['FK_client'],
            'FK_consulting' => $request['FK_consulting'],
        ]);
        return redirect('../consultings/'.$request['FK_consulting']);
    }
    /*
        find relation row id from foreign keys
    */
    public function detach(Request $request)
    {
        $client = $request['FK_client'];
        $consult = $request['FK_consulting'];
        $piv_id = ClientsToConsulting::where('FK_client', '=', $client)
                  ->where('FK_consulting', '=', $consult)->first()->id;
        return view('../consultings/confirm', compact('piv_id','consult'));
    }
    /*
        destroy
    */
        public function delete($id)
    {

        if(ClientsToConsulting::destroy($id)) {
           return redirect('../consultings');
         } else {
           return redirect('../consultings');
         }

    }
}
