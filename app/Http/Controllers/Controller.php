<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


public function checkRole()


    	{
	        $role = Auth::user()->role;
	      
	        switch ($role) {
			    case "client":
			        $res = 'client';
			        break;
			    case "trainer":
			        $res = 'trainer';
			        break;
			    case "consultant":
			        $res = 'consultant';
			        break;
			    case "course_provider":
			        $res = 'course_provider';
			        break;
			    case "employer":
			        $res = 'employer';
			        break;
			    case "off_admin":
			        $res = 'off_admin';
			        break;
			    case "sys_admin":
			        $res = 'sys_admin';
			        break;
			    default:
			        $res = 'guest';
			}

	        return $res;
	    }
	

}
