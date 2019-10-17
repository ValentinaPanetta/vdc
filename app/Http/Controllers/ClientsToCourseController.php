<?php

namespace App\Http\Controllers;

use App\ClientsToCourse;
use Illuminate\Http\Request;

class ClientsToCourseController extends Controller
{
    public function attach(Request $request) 
    {
        ClientsToCourse::create([    
            'client_status' => $request['client_status'],      
            'FK_client' => $request['FK_client'],
            'FK_course' => $request['FK_course'],
        ]);
        return redirect('../courses/'.$request['FK_course']);
    }

    public function detach(Request $request)
    {
        $client = $request['FK_client'];
        $course = $request['FK_course'];
        $row = ClientsToCourse::where('FK_client', '=', $client)
                  ->where('FK_course', '=', $course)->first()->id;
        return view('../courses/confirm_unsub', compact('row','course'));
    }

        public function delete($id)
    {

        if(ClientsToCourse::destroy($id)) {
           return redirect('../reservations');
         } else {
           return redirect('../reservations');
         }

    }
}
