<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ReportExcelController extends Controller
{
   public function index()
   {
       $trancount = DB::table('transformers')->count('locid');
       $tranpass = DB::table('transformers')->where('result','=','ผ่าน')->count('result');
       $tranfail = DB::table('transformers')->where('result','=','ไม่ผ่าน')->count('result');
       
       $mecount = DB::table('meters')->count('locid');
       $mepass = DB::table('meters')->where('result','=','ผ่าน')->count('result');
       $mefail = DB::table('meters')->where('result','=','ไม่ผ่าน')->count('result');
       
       $mdbcount = DB::table('mdbtest')->count('locid');
       $mdbpass = DB::table('mdbtest')->where('result','=','ผ่าน')->count('result');
       $mdbfail = DB::table('mdbtest')->where('result','=','ไม่ผ่าน')->count('result');
       
       $gencount = DB::table('gens')->count('locid');
       $genpass = DB::table('gens')->where('result','=','ผ่าน')->count('result');
       $genfail = DB::table('gens')->where('result','=','ไม่ผ่าน')->count('result');
       
       $reccount = DB::table('rectifytest')->count('locid');
       $recpass = DB::table('rectifytest')->where('result','=','ผ่าน')->count('result');
       $recfail = DB::table('rectifytest')->where('result','=','ไม่ผ่าน')->count('result');
       
       $battcount = DB::table('batttest')->count('locid');
       $battpass = DB::table('batttest')->where('result','=','ผ่าน')->count('result');
       $battfail = DB::table('batttest')->where('result','=','ไม่ผ่าน')->count('result');
       
       $aircount = DB::table('airstest')->count('locid');
       $airpass = DB::table('airstest')->where('result','=','ผ่าน')->count('result');
       $airfail = DB::table('airstest')->where('result','=','ไม่ผ่าน')->count('result');
       
       $invcount = DB::table('inverters')->count('locid');
       $invpass = DB::table('inverters')->where('result','=','ผ่าน')->count('result');
       $invfail = DB::table('inverters')->where('result','=','ไม่ผ่าน')->count('result');
       
       $upscount = DB::table('ups')->count('locid');
       $upspass = DB::table('ups')->where('result','=','ผ่าน')->count('result');
       $upsfail = DB::table('ups')->where('result','=','ไม่ผ่าน')->count('result');
       
       $all = $trancount + $mecount + $mdbcount + $gencount + $reccount + $battcount + $aircount + $invcount + $upscount;
       $allpass = $tranpass + $mepass + $mdbpass + $genpass + $recpass + $battpass + $airpass + $invpass + $upspass;
       $allfail = $tranfail + $mefail + $mdbfail + $genfail + $recfail + $battfail + $airfail + $invfail + $upsfail;
       
       return view('report',compact('trancount','tranpass','tranfail','mecount','mepass','mefail','mdbcount','mdbpass','mdbfail','gencount','all',
           'genpass','genfail','reccount','recpass','recfail','battcount','battpass','battfail','aircount','airpass','airfail','invcount',
           'invpass','invfail','upscount','upspass','upsfail','allpass','allfail'));
   }
    
   public function battIndex()
   {
       $batt = DB::table('batttest')
       ->select(DB::raw("count(batttest.locid) as loccount"),'batttest.locid','batttest.result','note6','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','batttest.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note6')
       ->groupBy('location.name')
       ->get();
           return view('report2',compact('batt'));
   }
   
   public function airIndex()
   {
       $air = DB::table('airstest')
       ->select(DB::raw("count(airstest.locid) as loccount"),'airstest.locid','airstest.result','note1','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','airstest.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note1')
       ->groupBy('location.name')
       ->get();
       return view('reportair',compact('air'));
   }
   
   public function mdbIndex()
   {
       $mdb = DB::table('mdbtest')
       ->select(DB::raw("count(mdbtest.locid) as loccount"),'mdbtest.locid','mdbtest.result','note5','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','mdbtest.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note5')
       ->groupBy('location.name')
       ->get();
       return view('reportmdb',compact('mdb'));
   }
   
   public function meterIndex()
   {
       $meter = DB::table('meters')
       ->select(DB::raw("count(meters.locid) as loccount"),'meters.locid','meters.result','note','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','meters.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note')
       ->groupBy('location.name')
       ->get();
       return view('reportmeter',compact('meter'));
   }
   
   public function rectifyIndex()
   {
       $rec = DB::table('rectifytest')
       ->select(DB::raw("count(rectifytest.locid) as loccount"),'rectifytest.locid','rectifytest.result','note5','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','rectifytest.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note5')
       ->groupBy('location.name')
       ->get();
       return view('reportrectify',compact('rec'));
   }
   
   public function transformerIndex()
   {
       $tran = DB::table('transformers')
       ->select(DB::raw("count(transformers.locid) as loccount"),'transformers.locid','transformers.result','note3','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','transformers.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note3')
       ->groupBy('location.name')
       ->get();
       return view('reporttransformer',compact('tran'));
   }
   
   public function genIndex()
   {
       $gen = DB::table('gens')
       ->select(DB::raw("count(gens.locid) as loccount"),'gens.locid','gens.result','note5','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','gens.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note5')
       ->groupBy('location.name')
       ->get();
       return view('reportgen',compact('gen'));
   }
   
   public function upsIndex()
   {
       $ups = DB::table('ups')
       ->select(DB::raw("count(ups.locid) as loccount"),'ups.locid','ups.result','note1','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','ups.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note1')
       ->groupBy('location.name')
       ->get();
       return view('reportups',compact('ups'));
   }
   
   public function inverterIndex()
   {
       $inv = DB::table('inverters')
       ->select(DB::raw("count(inverters.locid) as loccount"),'inverters.locid','inverters.result','note1','location.name',DB::raw("sum(CASE WHEN result = 'ผ่าน' THEN 1 ELSE 0 END) AS pass"),DB::raw("sum(CASE WHEN result = 'ไม่ผ่าน' THEN 1 ELSE 0 END) AS fail"))
       ->join('location','inverters.locid','=','location.locid')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note1')
       ->groupBy('location.name')
       ->get();
       return view('reportinver',compact('inv'));
   }
   
   public function equpAll()
   {
      $batt = DB::table('batttest')
       ->select(DB::raw("count(batttest.locid) as loccount"),'batttest.locid','batttest.result','note6','location.name')
       ->join('location','batttest.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note6')
       ->groupBy('location.name');
       
       $air = DB::table('airstest')
       ->select(DB::raw("count(airstest.locid) as loccount"),'airstest.locid','airstest.result','note1','location.name')
       ->join('location','airstest.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note1')
       ->groupBy('location.name');
       
       $mdb = DB::table('mdbtest')
       ->select(DB::raw("count(mdbtest.locid) as loccount"),'mdbtest.locid','mdbtest.result','note5','location.name')
       ->join('location','mdbtest.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note5')
       ->groupBy('location.name');
       
       $meter = DB::table('meters')
       ->select(DB::raw("count(meters.locid) as loccount"),'meters.locid','meters.result','note','location.name')
       ->join('location','meters.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note')
       ->groupBy('location.name');
       
       $rec = DB::table('rectifytest')
       ->select(DB::raw("count(rectifytest.locid) as loccount"),'rectifytest.locid','rectifytest.result','note5','location.name')
       ->join('location','rectifytest.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note5')
       ->groupBy('location.name');
       
       $tran = DB::table('transformers')
       ->select(DB::raw("count(transformers.locid) as loccount"),'transformers.locid','transformers.result','note3','location.name')
       ->join('location','transformers.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note3')
       ->groupBy('location.name');
       
       $gen = DB::table('gens')
       ->select(DB::raw("count(gens.locid) as loccount"),'gens.locid','gens.result','note5','location.name')
       ->join('location','gens.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note5')
       ->groupBy('location.name');
       
       $ups = DB::table('ups')
       ->select(DB::raw("count(ups.locid) as loccount"),'ups.locid','ups.result','note1','location.name')
       ->join('location','ups.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note1')
       ->groupBy('location.name');
       
       $all = DB::table('inverters')
       ->select(DB::raw("count(inverters.locid) as loccount"),'inverters.locid','inverters.result','note1','location.name')
       ->join('location','inverters.locid','=','location.locid')
       ->where('result','ไม่ผ่าน')
       ->groupBy('locid')
       ->groupBy('result')
       ->groupBy('note1')
       ->groupBy('location.name')
       ->union($batt)
       ->union($air)
       ->get();
       
       $test = DB::table('location')->take(5)->get();
       
       return view('reportallEqp',compact('test'));
   }
}
