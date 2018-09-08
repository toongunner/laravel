<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'acRadio'=>'required|in:มี,ไม่มี',
                'airQty'=>'nullable', 
                'acRoom'=>'nullable',
                'acFl'=>'nullable',
                'acTmp'=>'nullable',
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
                'acRadio3'=>'required|in:ผ่าน,ไม่ผ่าน',
                'acuEtc'=>'nullable',
                'locationid'=>'required'
            ]);
            $air->saveData($data);
            }
            
           else if($checkavailable == "ไม่มี")
            {
                $data = $this->validate($request, [
                    'acRadio'=>'required|in:มี,ไม่มี',
                    'locationid'=>'required'
                ]);
                $air->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
                ->where('locid',$locateid)
                ->update(array('mby'=>$username));
            
                return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
        elseif ($request->has('upsbtn'))
        {
            $ups = new Ups();
            $checkavailable = $request->input('upsRadio');
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'upsRadio'=>'required|in:มี,ไม่มี',
                'upsQty'=>'nullable',
                'upsRoom'=>'nullable',
                'upsFl'=>'nullable',
                'upsCode'=>'nullable',
                'upsBrand'=>'nullable',
                'upsSno'=>'nullable',
                'upsMod'=>'nullable',
                'upsSize'=>'nullable',
                'upsYear'=>'max:4',
                'upsRadio2'=>'required|in:ผ่าน,ไม่ผ่าน',
                'upsEtc'=>'nullable',
                'locationid'=>'required'
            ]);
            $ups->saveData($data);
            }
            else if($checkavailable == "ไม่มี")
            {
                $data = $this->validate($request, [
                    'upsRadio'=>'required|in:มี,ไม่มี',
                    'locationid'=>'required'
                ]);
                $ups->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
            elseif ($request->has('invbtn'))
            {
                $inv = new Inverters();
                $checkavailable = $request->input('invRadio');
                if($checkavailable == "มี")
                {
                    $data = $this->validate($request, [
                        'invRadio'=>'required|in:มี,ไม่มี',
                        'invRoom'=>'nullable',
                        'invFl'=>'nullable',
                        'invCode'=>'nullable',
                        'invBrand'=>'nullable',
                        'invSno'=>'nullable',
                        'invMod'=>'nullable',
                        'invSize'=>'nullable',
                        'invYear'=>'max:4',
                        'invRadio2'=>'required|in:ผ่าน,ไม่ผ่าน',
                        'invEtc'=>'nullable',
                        'locationid'=>'required'
                    ]);
                    $inv->saveData($data);
                }            
               else if($checkavailable == "ไม่มี")
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
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
        elseif ($request->has('tranbtn'))
        {
            $transf = new Transformer();
            $checkavailable = $request->input('tranRadio');
            
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'tranRadio'=>'required|in:มี,ไม่มี',
                'tranBrand'=>'nullable',
                'tranPhrase'=>'nullable',
                'tranSize'=>'nullable',
                'tranYear'=>'nullable',
                'tranTRadio'=>'required|in:passT1,failT1',
                'tranEtc' => 'nullable',
                'tranTRadio2'=>'required|in:passT2,failT2',
                'tranEtc2' => 'nullable',
                'tranRadio2'=>'required|in:ผ่าน,ไม่ผ่าน',
                'tranEtc3' => 'nullable',
                'locationid'=>'required'
            ]);            
                    $transf->saveData($data);
            }
            else if($checkavailable == "ไม่มี")
            {
                $data = $this->validate($request, [
                    'tranRadio'=>'required|in:มี,ไม่มี',
                    'locationid'=>'required'
            ]);
                    $transf->savenonData($data);
            }
                                           
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
        elseif ($request->has('metbtn'))
        {
            $meter = new Meter();
            $checkavailable = $request->input('metRadio');
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'metRadio'=>'required|in:มี,ไม่มี',
                'metQty'=>'nullable',
                'metCode'=>'nullable',
                'metSerial'=>'nullable',
                'metCon'=>'nullable',
                'metSize'=>'nullable',
                'metRadio2'=>'required|in:ผ่าน,ไม่ผ่าน',
                'metEtc'=>'nullable',
                'locationid'=>'required'
            ]);
                $meter->saveData($data);
            }
            else if($checkavailable == "ไม่มี")
            {
                $data = $this->validate($request, [
                'metRadio'=>'required|in:มี,ไม่มี',
                'locationid'=>'required'
            ]);
                $meter->savenonData($data);
            }
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
        elseif ($request->has('mdbbtn'))
        {
            $mdb = new Mdb();
            $checkavailable = $request->input('mdbRadio');
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'mdbRadio'=>'required|in:มี,ไม่มี',
                'mdbRadio2'=>'required|in:LP,MDP',
                'mdbBrand'=>'nullable',
                'mdbPhrase'=>'nullable',
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
                'mdbRadio3'=>'required|in:ผ่าน,ไม่ผ่าน',
                'mdbEtc5'=>'nullable',
                'locationid'=>'required'
            ]);
                $mdb->saveData($data);
            }
            else if($checkavailable == "ไม่มี")
            {
            $data = $this->validate($request, [
                'mdbRadio'=>'required|in:มี,ไม่มี',
                'locationid'=>'required'
            ]);
                $mdb->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
        elseif ($request->has('genbtn'))
        {
            $gen = new Gen();
            $checkavailable = $request->input('genRadio');
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'genRadio'=>'required|in:มี,ไม่มี',
                'genCode'=>'nullable',
                'EnBrand'=>'nullable',
                'EnSno'=>'nullable',
                'genYear'=>'nullable',
                'genBrand'=>'nullable',
                'genSno'=>'nullable',
                'genPhrase'=>'nullable',
                'genTRadio'=>'required',
                'genEtc'=>'nullable',
                'genTRadio2'=>'required',
                'genEtc2'=>'nullable',
                'genTRadio3'=>'required',
                'genEtc3'=>'nullable',
                'genTRadio4'=>'required',
                'genEtc4'=>'nullable',
                'genRadio2'=>'required|in:ผ่าน,ไม่ผ่าน',
                'genEtc5'=>'nullable',
                'locationid'=>'required'
            ]);
            $gen->saveData($data);
            }
            
            else if($checkavailable == "ไม่มี")
            {
                $data = $this->validate($request, [
                    'genRadio'=>'required|in:มี,ไม่มี',                    
                    'locationid'=>'required'
                ]);
                $gen->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
        elseif ($request->has('recbtn'))
        {
            $rec = new Rectifier();
            $checkavailable = $request->input('recRadio');
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'recRadio'=>'required|in:มี,ไม่มี',
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
                'recRadio2'=>'required|in:ผ่าน,ไม่ผ่าน',
                'recEtc5'=>'nullable',
                'locationid'=>'required'
            ]);
            $rec->saveData($data);
            }
            
            else if($checkavailable == "ไม่มี")
            {
                $data = $this->validate($request, [
                    'recRadio'=>'required|in:มี,ไม่มี',
                    'locationid'=>'required'
                ]);
                $rec->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
        }
        elseif ($request->has('battbtn'))
        {
            $batt = new Battery();
            $checkavailable = $request->input('battRadio');
            if($checkavailable == "มี")
            {
            $data = $this->validate($request, [
                'battRadio'=>'required|in:มี,ไม่มี',
                'battRoom'=>'nullable',
                'battFl'=>'nullable',
                'battBrand'=>'nullable',
                'battMod'=>'nullable',
                'battSize'=>'nullable',
                'battYear'=>'nullable',
                'battQty'=>'nullable',
                'battCellQty'=>'nullable',
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
                'battRadio2'=>'required|in:ผ่าน,ไม่ผ่าน',
                'battEtc6'=>'nullable',
                'locationid'=>'required'
            ]);
            $batt->saveData($data);
            }
            
          else if($checkavailable == "ไม่มี")
            {
                $data = $this->validate($request, [
                    'battRadio'=>'required|in:มี,ไม่มี',
                    'locationid'=>'required'
                ]);
                $batt->savenonData($data);
            }
            
            $locateid = $request->locationid;
            $username = Auth::user()->name;
            DB::table('location')
            ->where('locid',$locateid)
            ->update(array('mby'=>$username));
            
            return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จ !!');
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
    }
    public function deleteImage(Request $request)
    {
        $imgname = $request->get('imgname');
        $id = $request->get('id');
        $locid = $request->get('locid');
        $imgpath = public_path($locid.'/'.$imgname);        
        if(File::exists($imgpath)) {
            File::delete($imgpath);
            DB::table('images')->where('id',$id)->delete();
        }
        return redirect()->back()->with('success','ลบรูปภาพแล้ว !!'); 
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
        
        return redirect()->back()->with('success','อัพโหลดไฟล์สำเร็จ !!');
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
        $air = DB::table('airstest')->where('locid',$id)->orderBy('id')->get();
        $batt = DB::table('batttest')->where('locid',$id)->orderBy('id')->get();
        $gen = DB::table('gens')->where('locid',$id)->orderBy('id')->get();
        $image = DB::table('images')->where('locid',$id)->orderBy('id')->get();
        $inver = DB::table('inverters')->where('locid',$id)->orderBy('id')->get();
        $mdb = DB::table('mdbtest')->where('locid',$id)->orderBy('id')->get();
        $meter = DB::table('meters')->where('locid',$id)->orderBy('id')->get();
        $rectifier = DB::table('rectifytest')->where('locid',$id)->orderBy('id')->get();
        $transformer = DB::table('transformers')->where('locid',$id)->orderBy('id')->get();
        $ups = DB::table('ups')->where('locid',$id)->orderBy('id')->get();
        $chumsai = DB::table('location')->where('locid',$id)->value('name');
        return view('editdata',compact('air','meter','chumsai','transformer','mdb','gen','rectifier','batt','ups','inver','image','id'));
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
