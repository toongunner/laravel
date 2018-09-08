<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Transformer;

class UpdateController extends Controller
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
        if($request->has('tranbtn'))
        {
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $avail = $request->get('tranRadio');
            $brand = $request->get('tranBrand');
            $phrase = $request->get('tranPhrase');
            $size = $request->get('tranSize');
            $year = $request->get('tranYear');
            $check1 = $request->get('tranTRadio');
            $note1 = $request->get('tranEtc');
            $check2 = $request->get('tranTRadio2');
            $note2 = $request->get('tranEtc2');
            $result = $request->get('tranRadio2');
            $note3 = $request->get('tranEtc3');
            $mby =  Auth::user()->name;

            DB::table('transformers')->where('id',$id)->update(array('locid'=>$locid,'available'=>$avail,'brand'=>$brand,'phrase'=>$phrase,'size'=>$size,'year'=>$year,'check1'=>$check1,'note1'=>$note1,'check2'=>$check2,'note2'=>$note2,'result'=>$result,'note3'=>$note3,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');

        }
        else if($request->has('trandelbtn'))
        {
            $id = $request->get('id');
            DB::table('transformers')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if($request->has('acbtn'))
        {
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $available = $request->get('acRadio');
            $room = $request->get('acRoom');
            $floor = $request->get('acFl');
            $temp = $request->get('acTmp');
            $type = $request->get('acRadio2');
            $code = $request->get('acCode');
            $powersup = $request->get('acSup');
            $fcubrand = $request->get('fcuName');
            $fcumodel = $request->get('fcuMod');
            $fcuserial = $request->get('fcuSer');
            $size = $request->get('fcuSize');
            $acubrand = $request->get('acuName');
            $acumodel = $request->get('acuMod');
            $acuserial = $request->get('acuSer');
            $year = $request->get('acuYear');
            $result = $request->get('acRadio3');
            $note1 = $request->get('acuEtc');
            $mby = Auth::user()->name;
            
            DB::table('airstest')->where('id',$id)->update(array('locid'=>$locid,'available'=>$available,'room'=>$room,'floor'=>$floor,'temp'=>$temp,'type'=>$type
                ,'code'=>$code,'powersup'=>$powersup,'fcubrand'=>$fcubrand,'fcumodel'=>$fcumodel,'fcuserial'=>$fcuserial,'size'=>$size,'acubrand'=>$acubrand
                ,'acumodel'=>$acumodel,'acuserial'=>$acuserial,'year'=>$year,'result'=>$result,'note1'=>$note1,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
            
        }
        else if ($request->has('acdelbtn'))
        {
            $id = $request->get('id');
            DB::table('airstest')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if($request->has('battbtn'))
        {
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $available = $request->get('battRadio');
            $room = $request->get('battRoom');
            $floor = $request->get('battFl');
            $brand = $request->get('battBrand');
            $model = $request->get('battMod');
            $size = $request->get('battSize');
            $year = $request->get('battYear');
            $qty = $request->get('battQty');
            $cellqty = $request->get('battCellQty');
            $check1 = $request->get('battTRadio');
            $note1 = $request->get('battEtc');
            $check2 = $request->get('battTRadio2');
            $note2 = $request->get('battEtc2');
            $check3 = $request->get('battTRadio3');
            $note3 = $request->get('battEtc3');
            $check4 = $request->get('battTRadio4');
            $note4 = $request->get('battEtc4');
            $check5 = $request->get('battTRadio5');
            $note5 = $request->get('battEtc5');
            $result = $request->get('battRadio2');
            $note6 = $request->get('battEtc6');
            $mby = Auth::user()->name;
            
            DB::table('batttest')->where('id',$id)->update(array('locid'=>$locid,'available'=>$available,'qty'=>$qty,'room'=>$room,'floor'=>$floor,'brand'=>$brand,'model'=>$model
                ,'year'=>$year,'cellqty'=>$cellqty,'size'=>$size,'check1'=>$check1,'note1'=>$note1,'check2'=>$check2,'note2'=>$note2
                ,'check3'=>$check3,'note3'=>$note3,'check4'=>$check4,'note4'=>$note4,'check5'=>$check5,'note5'=>$note5,'result'=>$result,'note6'=>$note6,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
        }
        else if ($request->has('battdelbtn'))
        {
            $id = $request->get('id');
            DB::table('batttest')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if ($request->has('metbtn'))
        {
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $available = $request->get('metRadio');
            $serial = $request->get('metSerial');
            $Objcondition = $request->get('metCon');
            $size = $request->get('metSize');
            $result = $request->get('metRadio2');
            $note = $request->get('metEtc');
            $mby = Auth::user()->name;
            
            DB::table('meters')->where('id',$id)->update(array('locid'=>$locid,'available'=>$available,'size'=>$size,'serial'=>$serial,'Objcondition'=>$Objcondition,'result'=>$result,'note'=>$note,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
        }
        else if($request->has('metdelbtn'))
        {
            $id = $request->get('id');
            DB::table('meters')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if($request->has('recbtn'))
        {
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $available = $request->get('recRadio');
            $brand = $request->get('recBrand');
            $ctrlserial = $request->get('recSno');
            $year = $request->get('recYear');
            $rectvolt = $request->get('recVolt');
            $currload = $request->get('recLoad');
            $rectmodule = $request->get('recMod');
            $qty = $request->get('recQty');
            $check1 = $request->get('recTRadio');
            $note1 = $request->get('recEtc');
            $check2 = $request->get('recTRadio2');
            $note2 = $request->get('recEtc2');
            $check3 = $request->get('recTRadio3');
            $note3 = $request->get('recEtc3');
            $check4 = $request->get('recTRadio4');
            $note4 = $request->get('recEtc4');
            $result = $request->get('recRadio2');
            $note5 = $request->get('recEtc5');
            $mby = Auth::user()->name;
            
            DB::table('rectifytest')->where('id',$id)->update(array('locid'=>$locid,'available'=>$available,'brand'=>$brand,'ctrlserial'=>$ctrlserial,'year'=>$year,'rectvolt'=>$rectvolt
                ,'currload'=>$currload,'rectmodule'=>$rectmodule,'qty'=>$qty,'check1'=>$check1,'note1'=>$note1,'check2'=>$check2,'note2'=>$note2
                ,'check3'=>$check3,'note3'=>$note3,'check4'=>$check4,'note4'=>$note4,'result'=>$result,'note5'=>$note5,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
        }
        else if($request->has('recdelbtn'))
        {
            $id = $request->get('id');
            DB::table('rectifytest')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if($request->has('mdbbtn'))
        {
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $available = $request->get('mdbRadio');
            $type = $request->get('mdbRadio2');
            $brand = $request->get('mdbBrand');
            $phrase = $request->get('mdbPhrase');
            $year = $request->get('mdbYear');
            $mcb = $request->get('mdbMBreaker');
            $fx = $request->get('mdbFXBreaker');
            $r = $request->get('mdbRLoad');
            $s = $request->get('mdbSLoad');
            $t = $request->get('mdbTLoad');
            $check1 = $request->get('mdbTRadio');
            $note1 = $request->get('mdbEtc');
            $check2 = $request->get('mdbTRadio2');
            $note2 = $request->get('mdbEtc2');
            $check3 = $request->get('mdbTRadio3');
            $note3 = $request->get('mdbEtc3');
            $check4 = $request->get('mdbTRadio4');
            $note4 = $request->get('mdbEtc4');
            $result = $request->get('mdbRadio3');
            $note5 = $request->get('mdbEtc5');
            $mby = Auth::user()->name;
            
            DB::table('mdbtest')->where('id',$id)->update(array('locid'=>$locid,'available'=>$available,'type'=>$type,'brand'=>$brand,'phrase'=>$phrase,'year'=>$year
                ,'mcb'=>$mcb,'fx'=>$fx,'r'=>$r,'s'=>$s,'t'=>$t,'check1'=>$check1,'note1'=>$note1,'check2'=>$check2,'note2'=>$note2
                ,'check3'=>$check3,'note3'=>$note3,'check4'=>$check4,'note4'=>$note4,'result'=>$result,'note5'=>$note5,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
        }
        else if($request->has('mdbdelbtn'))
        {
            $id = $request->get('id');
            DB::table('mdbtest')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if($request->has('upsbtn'))
        {
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $available = $request->get('upsRadio');
            $room = $request->get('upsRoom');
            $floor = $request->get('upsFl');
            $code = $request->get('upsCode');
            $brand = $request->get('upsBrand');
            $serial = $request->get('upsSno');
            $model = $request->get('upsMod');
            $size = $request->get('upsSize');
            $year = $request->get('upsYear');
            $check1 = $request->get('upsRadio2');
            $note1 = $request->get('upsEtc');
            $mby = Auth::user()->name;
            
            DB::table('ups')->where('id',$id)->update(array('locid'=>$locid,'available'=>$available,'room'=>$room,'floor'=>$floor,'code'=>$code,'brand'=>$brand
            ,'serial'=>$serial,'model'=>$model,'size'=>$size,'year'=>$year,'check1'=>$check1,'note1'=>$note1,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
        }
        else if($request->has('upsdelbtn'))
        {
            $id = $request->get('id');
            DB::table('ups')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if($request->has('genbtn'))
        {   
            $id = $request->get('id');
            $locid = $request->get('locationid');
            $available = $request->get('genRadio');
            $code = $request->get('genCode');
            $enbrand = $request->get('EnBrand');
            $enserial = $request->get('EnSno');
            $year = $request->get('genYear');
            $genbrand = $request->get('genBrand');
            $genserial = $request->get('genSno');
            $phrase = $request->get('genPhrase');
            $check1 = $request->get('genTRadio');
            $note1 = $request->get('genEtc');
            $check2 = $request->get('genTRadio2');
            $note2 = $request->get('genEtc2');
            $check3 = $request->get('genTRadio3');
            $note3 = $request->get('genEtc3');
            $check4 = $request->get('genTRadio4');
            $note4 = $request->get('genEtc4');
            $result = $request->get('genRadio2');
            $note5 = $request->get('genEtc5');
            $mby = Auth::user()->name;
            
            DB::table('gens')->where('id',$id)->update(array('locid'=>$locid,'available'=>$available,'code'=>$code,'enbrand'=>$enbrand,'enserial'=>$enserial,'year'=>$year
                ,'genbrand'=>$genbrand,'genserial'=>$genserial,'phrase'=>$phrase,'year'=>$year,'check1'=>$check1,'check2'=>$check2,'check3'=>$check3,'check4'=>$check4,
                'note4'=>$note4,'result'=>$result,'note5'=>$note5,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
        }
        else if($request->has('gendelbtn'))
        {
            $id = $request->get('id');
            DB::table('gens')->where('id',$id)->delete();
            return redirect()->back()->with('success','ลบข้อมููลสำเร็จ !!');
        }
        
        else if($request->has('invbtn'))
        {
            $locid = $request->get('locationid');
            $available = $request->get('invRadio');
            $room = $request->get('invRoom');
            $floor = $request->get('invFl');
            $code = $request->get('invCode');
            $brand = $request->get('invBrand');
            $serial = $request->get('invSno');
            $model = $request->get('invMod');
            $size = $request->get('invSize');
            $year = $request->get('invYear');
            $check1 = $request->get('invRadio2');
            $note1 = $request->get('invEtc');
            $mby = Auth::user()->name;
            
            DB::table('inverters')->where('id',$id)->update(array('locid'=>$locid,'available'=>$avail,'$room'=>$room,'floor'=>$floor,'code'=>$code,'brand'=>$brand
                ,'serial'=>$serial,'model'=>model,'size'=>$size,'year'=>$year,'result'=>$result,'note3'=>$note3,'mby'=>$mby));
            return redirect()->back()->with('success','แก้ไขข้อมููลสำเร็จ !!');
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
        return "pdf";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return "im here";
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
}
