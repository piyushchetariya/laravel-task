<?php

namespace App\Http\Controllers;

use App\Models\data;
use Illuminate\Http\Request;
use App\Models\{Country, State, City};
use Illuminate\Support\Facades\Validator;


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

       $cus = data::whaere('all_columns', 'LIKE', '%' . $input . '%')->get();
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
    /*$validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->route('home')->withErrors($validator)->withInput();
        }*/

        try {

           /* if($request->hasfile('file'))
         {
            foreach($request->file('file') as $f)
            {
               $destinationPath = 'document/';
                $filename=$f->getClientOriginalName();
                $uploadSuccess = $request->file('f')->move($destinationPath, $filename);
                $file->move(public_path('/uploads'), $filename);
                $data[] = $filename;  
            }
         }*/

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
            Toastr::success('Saved successfully :)','Success');

            
        }
        catch (\Exception $e) {
            Toastr::error('not :)','error');

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
    public function update($id)
    {
        try {
            $class_room = data::where('id', $request->id)->first();
            
            $user->username= $request['name'];
            $user->email= $request['email'];
            $user->mobile= $request['phone'];
            $user->document= $request['file'];
            $user->country= $request['country'];
            $user->city= $request['city'];
            $result = $class_room->save();
    
            return redirect()->route('getuser');
            
        }
        catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
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
