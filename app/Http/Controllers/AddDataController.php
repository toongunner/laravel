<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Imagesize;
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
use App\Inverters;


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
            $checkavailable = $request->input('acRadio');            
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'acRadio'=>'required|in:yes,no',
                'airQty'=>'nullable', 
                'acRoom'=>'nullable',
                'acFl'=>'nullable',
                'acRadio2'=>'required|in:split,freeblow,precision',
                'acCode'=>'nullable',
                'acSup'=>'nullable',
                'fcuName'=>'nullable',
                'fcuMod'=>'nullable',
                'fcuSer'=>'nullable',
                'fcuSize'=>'nullable',
                'acuName'=>'nullable',
                'acuMod'=>'nullable',
                'acuSer'=>'nullable',
                'acuYear'=>'nullable',
                'acRadio3'=>'required|in:pass,fail',
                'acuEtc'=>'nullable',
                'locationid'=>'required'
            ]);
            $air->saveData($data);
            }
            
           else if($checkavailable == "no")
            {
                $data = $this->validate($request, [
                    'acRadio'=>'required|in:yes,no',
                    'locationid'=>'required'
                ]);
                $air->savenonData($data);
            }
            
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
            $checkavailable = $request->input('upsRadio');
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'upsRadio'=>'required|in:yes,no',
                'upsQty'=>'nullable',
                'upsRoom'=>'nullable',
                'upsFl'=>'nullable',
                'upsCode'=>'nullable',
                'upsBrand'=>'nullable',
                'upsSno'=>'nullable',
                'upsMod'=>'nullable',
                'upsSize'=>'nullable',
                'upsYear'=>'max:4',
                'upsRadio2'=>'required|in:pass,fail',
                'upsEtc'=>'nullable',
                'locationid'=>'required'
            ]);
            $ups->saveData($data);
            }
            else if($checkavailable == "no")
            {
                $data = $this->validate($request, [
                    'upsRadio'=>'required|in:yes,no',
                    'locationid'=>'required'
                ]);
                $ups->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }
            elseif ($request->has('invbtn'))
            {
                $inv = new Inverters();
                $checkavailable = $request->input('invRadio');
                if($checkavailable == "yes")
                {
                    $data = $this->validate($request, [
                        'invRadio'=>'required|in:yes,no',
                        'invQty'=>'nullable',
                        'invRoom'=>'nullable',
                        'invFl'=>'nullable',
                        'invCode'=>'nullable',
                        'invBrand'=>'nullable',
                        'invSno'=>'nullable',
                        'invMod'=>'nullable',
                        'invSize'=>'nullable',
                        'invYear'=>'max:4',
                        'invRadio2'=>'required|in:pass,fail',
                        'invEtc'=>'nullable',
                        'locationid'=>'required'
                    ]);
                    $inv->saveData($data);
                }            
               else if($checkavailable == "no")
                {
                    $data = $this->validate($request, [
                        'invRadio'=>'required|in:yes,no',
                        'locationid'=>'required'
                    ]);
                    $inv->savenonData($data);
                }
            
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
                'tranQty'=>'nullable',
                'tranCode'=>'nullable',
                'tranBrand'=>'nullable',
                'tranPhrase'=>'nullable',
                'tranSize'=>'nullable',
                'tranYear'=>'nullable',
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
            $checkavailable = $request->input('metRadio');
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'metRadio'=>'required|in:yes,no',
                'metQty'=>'nullable',
                'metCode'=>'nullable',
                'metSerial'=>'nullable',
                'metCon'=>'nullable',
                'metSize'=>'nullable',
                'metRadio2'=>'required|in:pass,fail',
                'metEtc'=>'nullable',
                'locationid'=>'required'
            ]);
                $meter->saveData($data);
            }
            else if($checkavailable == "no")
            {
                $data = $this->validate($request, [
                'metRadio'=>'required|in:yes,no',
                'locationid'=>'required'
            ]);
                $meter->savenonData($data);
            }
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
            $checkavailable = $request->input('mdbRadio');
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'mdbRadio'=>'required|in:yes,no',
                'mdbQty'=>'nullable',
                'mdbRadio2'=>'required|in:LP,MDP',
                'mdbCode'=>'nullable',
                'mdbBrand'=>'nullable',
                'mdbPhrase'=>'nullable',
                'mdbSize'=>'nullable',
                'mdbYear'=>'nullable',
                'mdbMBreaker'=>'nullable',
                'mdbFXBreaker'=>'nullable',
                'mdbRLoad'=>'nullable',
                'mdbSLoad'=>'nullable',
                'mdbTLoad'=>'nullable',
                'mdbTRadio'=>'nullable',
                'mdbEtc'=>'nullable',
                'mdbTRadio2'=>'required',
                'mdbEtc2'=>'nullable',
                'mdbTRadio3'=>'required',
                'mdbEtc3'=>'nullable',
                'mdbTRadio4'=>'required',
                'mdbEtc4'=>'nullable',
                'mdbRadio3'=>'required|in:pass,fail',
                'mdbEtc5'=>'nullable',
                'locationid'=>'required'
            ]);
                $mdb->saveData($data);
            }
            else if($checkavailable == "no")
            {
            $data = $this->validate($request, [
                'mdbRadio'=>'required|in:yes,no',
                'locationid'=>'required'
            ]);
                $mdb->savenonData($data);
            }
            
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
            $checkavailable = $request->input('genRadio');
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'genRadio'=>'required|in:yes,no',
                'genQty'=>'nullable',
                'genCode'=>'nullable',
                'EnBrand'=>'nullable',
                'EnSno'=>'nullable',
                'genYear'=>'nullable',
                'genBrand'=>'nullable',
                'genSno'=>'nullable',
                'genPhrase'=>'nullable',
                'genSize'=>'nullable',
                'genTRadio'=>'required',
                'genEtc'=>'nullable',
                'genTRadio2'=>'required',
                'genEtc2'=>'nullable',
                'genTRadio3'=>'required',
                'genEtc3'=>'nullable',
                'genTRadio4'=>'required',
                'genEtc4'=>'nullable',
                'genRadio2'=>'required|in:pass,fail',
                'genEtc5'=>'nullable',
                'locationid'=>'required'
            ]);
            $gen->saveData($data);
            }
            
            else if($checkavailable == "no")
            {
                $data = $this->validate($request, [
                    'genRadio'=>'required|in:yes,no',                    
                    'locationid'=>'required'
                ]);
                $gen->savenonData($data);
            }
            
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
            $checkavailable = $request->input('recRadio');
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'recRadio'=>'required|in:yes,no',
                'recQty'=>'nullable',
                'recCode'=>'nullable',
                'recBrand'=>'nullable',
                'recSno'=>'nullable',
                'recYear'=>'nullable',
                'recVolt'=>'nullable',
                'recLoad'=>'nullable',
                'recMod'=>'nullable',
                'recQty'=>'nullable',
                'recTRadio'=>'required',
                'recEtc'=>'nullable',
                'recTRadio2'=>'required',
                'recEtc2'=>'nullable',
                'recTRadio3'=>'required',
                'recEtc3'=>'nullable',
                'recTRadio4'=>'required',
                'recEtc4'=>'nullable',
                'recRadio2'=>'required|in:pass,fail',
                'recEtc5'=>'nullable',
                'locationid'=>'required'
            ]);
            $rec->saveData($data);
            }
            
            else if($checkavailable == "no")
            {
                $data = $this->validate($request, [
                    'recRadio'=>'required|in:yes,no',
                    'locationid'=>'required'
                ]);
                $rec->savenonData($data);
            }
            
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
            $checkavailable = $request->input('battRadio');
            if($checkavailable == "yes")
            {
            $data = $this->validate($request, [
                'battRadio'=>'required|in:yes,no',
                'battRoom'=>'nullable',
                'battFl'=>'nullable',
                'battBrand'=>'nullable',
                'battMod'=>'nullable',
                'battSize'=>'nullable',
                'battType'=>'nullable',
                'battYear'=>'nullable',
                'battQty'=>'nullable',
                'battTRadio'=>'nullable',
                'battEtc'=>'nullable',
                'battTRadio2'=>'required',
                'battEtc2'=>'nullable',
                'battTRadio3'=>'required',
                'battEtc3'=>'nullable',
                'battTRadio4'=>'required',
                'battEtc4'=>'nullable',
                'battTRadio5'=>'required',
                'battEtc5'=>'nullable',
                'battRadio2'=>'required|in:pass,fail',
                'battEtc6'=>'nullable',
                'locationid'=>'required'
            ]);
            $batt->saveData($data);
            }
            
          else if($checkavailable == "no")
            {
                $data = $this->validate($request, [
                    'battRadio'=>'required|in:yes,no',
                    'locationid'=>'required'
                ]);
                $batt->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','Save Successful !!')->withInput(Input::all());
        }        
    }
      
    public function storeImage(Request $request)
    {        
        $this->validate($request, [
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);  
        
        $file = $request->file('photo');
        foreach ($file as $photos)
        {
        $locid = $request->id;
        $filename = $locid.'_'.$photos->getClientOriginalName();
        $photos->move(public_path($locid),$filename);
        $img = Imagesize::make(public_path($locid.'/'.$filename))->resize(320, 240);
        $img->save(public_path($locid.'/'.$filename));
        $values = array('locid' => $locid,'imgname' => $filename);
        DB::table('images')->insert($values);
        }
        return redirect()->back()->with('success','บันทึกรูปภาพแล้ว !!');
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
//         $username = Auth::user()->name;
        $filename = $file->getClientOriginalExtension();
        Storage::disk('local')->put($locid.'.'.$filename,file_get_contents($file->getRealPath()));
        
        DB::table('location')
        ->where('locid',$locid)
        ->update(array('pdf'=>$locid.'.'.$filename));
        
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
        $air = DB::table('airs')->where('locid',$id);
        $batt = DB::table('batteries')->where('locid',$id);
        $gen = DB::table('gens')->where('locid',$id);
        $image = DB::table('images')->where('locid',$id);
        $inver = DB::table('inverters')->where('locid',$id);
        $mdb = DB::table('mdbs')->where('locid',$id);
        $meter = DB::table('meters')->where('locid',$id);
        $rectifier = DB::table('retifiers')->where('locid',$id);
        $transformer = DB::table('transformers')->where('locid',$id);
        $ups = DB::table('ups')->where('locid',$id);
        return view('editdata',compact('air','batt','gen','image','inver','mdb','meter','rectifier','transformer','ups'));
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
