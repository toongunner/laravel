<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if(request()->has('chumsai'))
        {
            $chumsai =  request('chumsai');
            $location = DB::table('location')->where('name','LIKE',"%".$chumsai."%")->paginate(20);
            return view('search',['location'=>$location]);
        }
        else if(request()->has('locate'))
        {
            $locid = request('locate');
            $location = DB::table('location')->where('locid','LIKE',"%".$locid."%")->paginate(1);
            return view('search',['location'=>$location]);
        }
        $location = DB::table('location')->paginate(10); 
        return view('search',['location'=>$location]);
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
    
    
    public function showPDF($id)
    {
         $path = storage_path('app/'.$id);
         return response()->file($path);
//        return response()->file('./storage/app/'.$id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /*  $locname = DB::table('location')->where('locid',$id)->value('name');
        Session::put('locname', $locname);
        return view('adddata'); */
        
        //return view('adddata',['location'=>$locname]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
