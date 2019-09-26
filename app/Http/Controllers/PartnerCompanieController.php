<?php

namespace App\Http\Controllers;

use App\PartnerCompanie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PartnerCompanieController extends Controller
{
    /**
     * Display a listing of the resource for Admin Pannel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = PartnerCompanie::all();
        return view('companies/index', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PartnerCompanie::create([
            'company_name' => $request['company_name'],
            'company_email' => $request['company_email'],
            'company_phone' => $request['company_phone'],
            'description' => $request['description'],
            'zipCode' => $request['zipCode'],
            'street' => $request['street'],
            'city' => $request['city'],
            'website' => $request['website'],
            'country' => $request['country'],
        ]);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($companie)
    {
        $res = PartnerCompanie::find($companie);
        return view('companies/show', compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($companie)
    {
        $res = PartnerCompanie::find($companie);

        return view('companies/edit', compact('res'));
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
        PartnerCompanie::where('id', $id)->update($request->except(['_token','_method']));

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(PartnerCompanie::destroy($id)) {
            return redirect('companies');
        } else {
            return redirect('companies');
        }
    }
}
