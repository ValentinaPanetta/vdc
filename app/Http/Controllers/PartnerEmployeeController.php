<?php

namespace App\Http\Controllers;

use App\User;
use App\PartnerCompanie;
use App\PartnerEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return redirect('/employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {   
        $company = DB::table('partner_employees')
        ->select('company_name')
        ->join('partner_companies', 'partner_companies.id', 'FK_company')
        ->where('FK_user', $user)
        ->get();

        $resUser = User::where('role', '=' , 'trainer' )->find($user);
        

        if(!$resUser){
            $resUser = User::where('role', '=' , 'course_provider')->find($user);         
        }

        if(!$resUser){
            echo 'not a trainer or c provider , we need a redirect here';
        }else{ 
            $res = $resUser->userEmployee;
            if($res ->isEmpty()){
                PartnerEmployee::create(['FK_user' => $user]);
                return redirect('employee/'.$user);
            }else{
           
               /*
                resUser = User Table
                res = PartnerEmployee Table
               */

            // echo $company;
           
           return view('employee.show', compact('resUser', 'res', 'company'));
            }
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $resUser = User::where('role', '=' , 'trainer')->find($user);
        if(!$resUser){
            $resUser = User::where('role', '=' , 'course_provider')->find($user);         
        }
        if(!$resUser){
            echo 'not a trainer, we need a redirect here';
        }else{ 
            $res = $resUser->userEmployee;
            if($res ->isEmpty()){
                PartnerEmployee::create(['FK_user' => $user]);
                return redirect('employee/'.$user.'/edit');
            }else{
        $companies = PartnerCompanie::all(['id', 'company_name']);
        $res = User::where('role', '=' , 'trainer')->find($user);
        if(!$res){
            $res=User::where('role', '=' , 'course_provider')->find($user);
        }
        $res = $res ->userEmployee;
        return view('employee/edit', compact('res', 'companies', 'resUser'));
        }
    }
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
        PartnerEmployee::where('id', $id)->update($request->except(['_token','_method']));
                $fk = PartnerEmployee::where('id','=', $id)->find($id)->FK_user;
        return redirect('/employee/'.$fk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        return redirect('/employee');
    }
}
