<?php

namespace App\Http\Controllers;
use App\ClientsToCourse;
use App\Course;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $res= ClientsToCourse::where('FK_client', '=', Auth::id())
        ->where('FK_payments', '=', null)->get();
        $paid= ClientsToCourse::where('FK_client', '=', Auth::id())
        ->where('FK_payments', '!=', null)->get();
    return view('reservations.index', compact('res', 'paid'));
     
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

        $FK_course = $request['FK_course'];
        Payment::create([          
            'pay_method' => $request['pay_method'],
            'FK_course' => $request['FK_course'],
            'FK_client' => $request['FK_client'],
            'price' => $request['price'],
            'paid' => $request['paid'],
        ]);
        $newRow = Payment::latest('created_at')->first();
        $FK_payments = $newRow->id;
        ClientsToCourse::where('FK_client', Auth::id())
        ->where('FK_course', $FK_course)
        ->update(['FK_payments' => $FK_payments, ]); 
        return redirect('reservations/'.$FK_course);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientsToCourse  $clientsToCourse
     * @return \Illuminate\Http\Response
     */
    public function show($number)
    {
        $check = null;
       
       $check = Payment::where('FK_client', '=', Auth::id())
        ->where('FK_course', '=', $number)->first();


        $res = Course::find($number);

        return view('reservations.show', compact('res', 'check'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientsToCourse  $clientsToCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientsToCourse $clientsToCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientsToCourse  $clientsToCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientsToCourse $clientsToCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientsToCourse  $clientsToCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientsToCourse $clientsToCourse)
    {
        //
    }
}
