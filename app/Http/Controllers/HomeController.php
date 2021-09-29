<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\fw_list;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\{Country, State, City};


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // main dashboard
    public function index()
    {
        $new['countries'] = Country::get(["name", "id"]);
        return view('Home',$new);
    }
    // employee dashboard
    
}
