<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Form;
use App\Air;
use App\Battery;
use App\Gen;
use App\Image;
use App\Mdb;
use App\Meter;
use App\Rectifier;
use App\Transformer;
use App\Ups;
use Illuminate\Http\Request;


class AddDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
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
        if($request->has('acbtn'))
        {
            $air = new Air();
            $data = $this->validate($request, [
                'acRadio'=>'required|in:yes,no',
                'airQty'=>'required', 
                'acRoom'=>'required',
                'acFl'=>'required',
                'acRadio2'=>'required|in:split,freeblow,precision',
                'acCode'=>'required',
                'acSup'=>'required',
                'fcuName'=>'required',
                'fcuMod'=>'required',
                'fcuSer'=>'required',
                'fcuSize'=>'required',
                'acuName'=>'required',
                'acuMod'=>'required',
                'acuSer'=>'required',
                'acuYear'=>'required',
                'acRadio3'=>'required|in:pass,fail',
                'acuEtc'=>'required',
                'locationid'=>'required'
            ]);
            $air->saveData($data);
                
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
                ->where('locid',$locateid)
                ->update(array('mby'=>$username));
            
                return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('upsbtn'))
        {
            $ups = new Ups();
            $data = $this->validate($request, [
                'invRadio'=>'required|in:yes,no',
                'invQty'=>'required',
                'invRoom'=>'required',
                'invFl'=>'required',
                'invCode'=>'required',
                'invBrand'=>'required',
                'invSno'=>'required',
                'invMod'=>'required',
                'invSize'=>'required',
                'invYear'=>'required',
                'invRadio2'=>'required|in:pass,fail',
                'invEtc'=>'required',
                'locationid'=>'required'
            ]);
            $ups->saveData($data);
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('tranbtn'))
        {
            $transf = new Transformer();
            $checkavailable = $request->input('tranRadio');
            
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'tranRadio'=>'required|in:yes,no',
                'tranQty'=>'required',
                'tranCode'=>'required',
                'tranBrand'=>'required',
                'tranPhrase'=>'required',
                'tranSize'=>'required',
                'tranYear'=>'required',
                'tranTRadio'=>'required|in:passT1,failT1',
                'tranEtc' => 'nullable',
                'tranTRadio2'=>'required|in:passT2,failT2',
                'tranEtc2' => 'nullable',
                'tranRadio2'=>'required|in:pass,fail',
                'tranEtc3' => 'nullable',
                'locationid'=>'required'
            ]);            
                    $transf->saveData($data);
            }
            else if($checkavailable == "no")
            {
                $data = $this->validate($request, [
                    'tranRadio'=>'required|in:yes,no',
                    'locationid'=>'required'
            ]);
                    $transf->savenonData($data);
            }
                                           
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('metbtn'))
        {
            $meter = new Meter();
            $data = $this->validate($request, [
                'metRadio'=>'required|in:yes,no',
                'metQty'=>'required',
                'metCode'=>'required',
                'metSerial'=>'required',
                'metCon'=>'required',
                'metSize'=>'required',
                'metRadio2'=>'required|in:pass,fail',
                'metEtc'=>'required',
                'locationid'=>'required'
            ]);
            $meter->saveData($data);
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('mdbbtn'))
        {
            $mdb = new Mdb();
            $data = $this->validate($request, [
                'mdbRadio'=>'required|in:yes,no',
                'mdbQty'=>'required',
                'mdbRadio2'=>'required|in:LP,MDB',
                'mdbCode'=>'required',
                'mdbBrand'=>'required',
                'mdbPhrase'=>'required',
                'mdbSize'=>'required',
                'mdbYear'=>'required',
                'mdbMBreaker'=>'required',
                'mdbFXBreaker'=>'required',
                'mdbRLoad'=>'required',
                'mdbSLoad'=>'required',
                'mdbTLoad'=>'required',
                'mdbTRadio'=>'required',
                'mdbTRadio2'=>'required',
                'metTRadio3'=>'required',
                'mdbTRadio4'=>'required',
                'mdbRadio3'=>'required|in:pass,fail',
                'mdbEtc5'=>'required',
                'locationid'=>'required'
            ]);
            $mdb->saveData($data);
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('genbtn'))
        {
            $gen = new Gen();
            $data = $this->validate($request, [
                'genRadio'=>'required|in:yes,no',
                'genQty'=>'required',
                'genCode'=>'required',
                'EnBrand'=>'required',
                'EnSno'=>'required',
                'genYear'=>'required',
                'genBrand'=>'required',
                'genSno'=>'required',
                'genPhrase'=>'required',
                'genSize'=>'required',
                'genTRadio'=>'required',
                'genTRadio2'=>'required',
                'genTRadio3'=>'required',
                'genTRadio4'=>'required',
                'genRadio2'=>'required|in:pass,fail',
                'genEtc5'=>'required',
                'locationid'=>'required'
            ]);
            $gen->saveData($data);
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('recbtn'))
        {
            $rec = new Rectifier();
            $data = $this->validate($request, [
                'recRadio'=>'required|in:yes,no',
                'recCode'=>'required',
                'recBrand'=>'required',
                'recSno'=>'required',
                'recYear'=>'required',
                'recVolt'=>'required',
                'recLoad'=>'required',
                'recMod'=>'required',
                'recQty'=>'required',
                'recTRadio'=>'required',
                'recTRadio2'=>'required',
                'recTRadio3'=>'required',
                'recTRadio4'=>'required',
                'recRadio2'=>'required|in:pass,fail',
                'recEtc5'=>'required',
                'locationid'=>'required'
            ]);
            $rec->saveData($data);
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('battbtn'))
        {
            $batt = new Battery();
            $data = $this->validate($request, [
                'battRadio'=>'required|in:yes,no',
                'battRoom'=>'required',
                'battFl'=>'required',
                'battBrand'=>'required',
                'battMod'=>'required',
                'battSize'=>'required',
                'battType'=>'required',
                'battYear'=>'required',
                'battQty'=>'required',
                'battTRadio'=>'required',
                'battTRadio2'=>'required',
                'battTRadio3'=>'required',
                'battTRadio4'=>'required',
                'battTRadio5'=>'required',
                'battRadio2'=>'required|in:pass,fail',
                'battEtc6'=>'required',
                'locationid'=>'required'
            ]);
            $batt->saveData($data);
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
        elseif ($request->has('invbtn'))
        {
            return "Inverter";
        }
    }
      
    public function storeImage(Request $request)
    {        
        $this->validate($request, [
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);  
        
        /* if($request->hasfile('photo'))
        {
            
            foreach($request->file('photo') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $photoname[] = $name;
            }
            
            $form= new Form();
            $form->photo=json_encode($photoname);
            $form->save();
            
            return back()->with('success', 'Your images has been successfully'); 
        }*/
    }
  
    public function storePDF(Request $request)
    {
        /*      this is for images
        $file = $request->file('pdffile');
        $filename = $file->getClientOriginalName();
        $locid = $request->id;
        $file->move(public_path('files'),$locid.'_'.$filename);    
        return redirect()->back()->with('success','Save Successful !!'); */
        
        
        if($request->File('pdffile'))
        {
        $locid = $request->id;
        $file = $request->file('pdffile');
        $username = Auth::user()->name;
        $filename = $file->getClientOriginalExtension();
        Storage::disk('local')->put($locid.'_'.$username.'.'.$filename,file_get_contents($file->getRealPath()));
        return redirect()->back()->with('success','Save Successful !!');
        }
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
        $locname = DB::table('location')->where('locid',$id)->value('name');
        return view('adddata',compact('locname','id')); 
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
