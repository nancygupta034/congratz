<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
   

public $viewPath ='admin.modules.';


#-----------------------------------------------------------------------------------------
#  admin dashboard
#----------------------------------------------------------------------------------------


public function index()
{
	 //return view('admin.layouts.layout'); 
	 return view($this->viewPath.'dashboard'); 
}










}
