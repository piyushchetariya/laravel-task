<?php

namespace App\Http\Controllers;

use App\Models\data;
use Illuminate\Http\Request;
use App\Models\{Country, State, City};
use Illuminate\Support\Facades\Validator;
use DB;
use Brian2694\Toastr\Facades\Toastr;





class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cus = data::join('Country')->get();

        $cus=DB::table('data')
        ->join('countries', 'countries.id', '=', 'data.country')
        ->join('cities', 'cities.id', '=', 'data.city')
        ->select('data.*', 'countries.name as c', 'cities.name as d')
        ->get();
        return view('new', compact('cus'));
    }
    public function search(Request $request)
    {
        $input = $request['filter'];

       $cus = data::where('username', 'LIKE', '%' . $input . '%')
       ->orWhere('email', 'LIKE', '%' . $input . '%')
       ->orWhere('mobile', 'LIKE', '%' . $input . '%')
       ->join('countries', 'countries.id', '=', 'data.country')
        ->join('cities', 'cities.id', '=', 'data.city')
        ->select('data.*', 'countries.name as c', 'cities.name as d')
       ->get();
        return view('new', compact('cus'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'file' => 'required',
            'country' => 'required',
            'city' => 'required'
        ]);
        try {
         if($request->hasfile('file'))
         {
            foreach($request->file('file') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }
            $user= new data();
            $user->username= $request['name'];
            $user->email= $request['email'];
            $user->mobile= $request['phone'];
            $user->document= json_encode($data);
            $user->country= $request['country'];
            $user->city= $request['city'];
            $user->save();
            return redirect()->route('getuser');
        }
        catch (\Exception $e) {
            return redirect()->back();
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = data::find($id);
       
        $countries = Country::get(["name", "id"]);

        return view('home',compact('data','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = data::where('id',$id)->first();

            
            
            $data->username= $request['name'];
            $data->email= $request['email'];
            $data->mobile= $request['phone'];
            if($request->hasfile('file'))
         {
            foreach($request->file('file') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/files/', $name);  
                $d[] = $name; 
                $data->document= json_encode($d);
 
            }
         }
            $data->country= $request['country'];
            $data->city= $request['city'];
            $result = $data->save();

            return redirect()->route('getuser');
        }
        catch (Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\data  $data
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = data::find($id);

        $data->delete();

        return Redirect()->route('getuser');
    }
}
