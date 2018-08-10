@extends('layouts.app')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/adddata.css') }}">
<script type="text/javascript" src="{!! asset('js/test.js') !!}"></script>



@section('content')

<div class="container">
   <strong><ul class="nav nav-tabs nav-justified" >
    	<li class="nav-item" id="transf" tabindex="1">
    	<a class="nav-link active" rel="transformer">Transformer</a>
    	</li>
    	<li class="nav-item" id="meter" tabindex="2">
    	<a class="nav-link" rel="met">Meter</a>
    	</li>
    	<li class="nav-item" id="mdp" tabindex="3">
    	<a class="nav-link" rel="mdb">MDB</a>
    	</li>
    	<li class="nav-item" id="gen" tabindex="4">
    	<a class="nav-link" rel="generator">Generetor Set</a>
    	</li>
    	<li class="nav-item" id="rec" tabindex="5">
    	<a class="nav-link" rel="rectifier">Rectifier</a>
    	</li>
    	<li class="nav-item" id="batt" tabindex="6">
    	<a class="nav-link" rel="battery">Battery</a>
    	</li>
    	<li class="nav-item" id="ac" tabindex="7">
    	<a class="nav-link" rel="air">Air Con.</a>
    	</li>
    	<li class="nav-item" id="up" tabindex="8">
    	<a class="nav-link" rel="ups">UPS</a>
    	</li>
    	<li class="nav-item" id="inv" tabindex="9">
    	<a class="nav-link" rel="invert">Inverter</a>
    	</li>
    	<li class="nav-item" id="img" tabindex="10">
    	<a class="nav-link" rel="imgs">Images</a>
    	</li>
    </ul></strong>
</div>

<div class="container">
<div class="alert alert-info">
	ชุมสาย
    <strong> 
    	{{$chumsai}}
    </strong>
    <strong id="backtosearch"><a href="{{ url('search') }}" >กลับหน้าค้นหา</a></strong>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">System Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              @foreach ($errors->all() as $error)
    		<div class="alert alert-danger">
            <ul>
                <li>{{ $error }}</li>
            </ul>
          	</div>
              @endforeach
              
              @if(\Session::has('success'))
       			 <div class="alert alert-success">
            		{{\Session::get('success')}}
        		</div>
    		  @endif
      </div>

    </div>
  </div>
</div>
		


<div class="container" id="addbody">

	<div class="container" id="transformer">		
@foreach($transformer as $t)	
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Transformer</b></label></div>
		<form method="post" action="{{url('update')}}">
		{{csrf_field()}}					
    		<div class="form-group"> 
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="tranRadio" id="tranRadioY" value="มี" {{($t->available=="มี")? "checked" : "" }}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="tranRadio" id="tranRadioN" value="ไม่มี"  {{($t->available=="ไม่มี")? "checked" : "" }}>ไม่มี</label></div>
        		</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2">ยี่ห้อ<input class="form-control form-control-sm" type="text"  id="tranBrand" name="tranBrand" value="{{$t->brand}}"></div>
    			<div class="col-sm-2">Phrase (PH)<input class="form-control form-control-sm" type="text"  id="tranPhrase" name="tranPhrase" value="{{$t->phrase}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-2">ขนาด(KVA.)<input class="form-control form-control-sm" type="text"  id="tranSize" name="tranSize" value="{{$t->size}}"></div>
    			<div class="col-sm-2">ปีที่ติดตั้ง<input class="form-control form-control-sm" type="text"  id="tranYear" name="tranYear" value="{{$t->year}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<table class="table table-bordered">
    			<thead>
    				<tr>
    				<th>Item</th>
    				<th>รายการตรวจสอบทั่วไป</th>
    				<th>Pass</th>
    				<th>Fail</th>
    				<th>หมายเหตุ</th>
    				</tr>
    			</thead>
    			<tbody>
					<tr>
					<td>1</td>
					<td>ตรวจสอบสภาพของอุปกรณ์อยู่ในสภาพสมบูรณ์ไม่ได้รับความเสียหาย</td>
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio" id="tranTRadioP" value="ผ่าน" {{($t->check1=="ผ่าน")? "checked" : "" }}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio" id="tranTRadioF" value="ไม่ผ่าน" {{($t->check1=="ไม่ผ่าน")? "checked" : "" }}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="tranEtc" name="tranEtc" value="{{$t->note1}}"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Transformer อยู่ในสภาพที่มั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio2" id="tranTRadioP2" value="passT2" {{($t->check2=="ผ่าน")? "checked" : "" }}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio2" id="tranTRadioF2" value="failT2" {{($t->check2=="ไม่ผ่าน")? "checked" : "" }}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="tranEtc2" name="tranEtc2" value="{{$t->note2}}"></div></td>
					</tr>     			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<div class="row">
    				ผลการตรวจสอบ
    				<div class="radio-inline"><label><input type="radio" name="tranRadio2" id="tranRadioP3" value="ผ่าน" {{($t->result=="ผ่าน")? "checked" : "" }}>ผ่าน</label></div>
        			<div class="radio-inline"><label><input type="radio" name="tranRadio2" id="tranRadioF3" value="ไม่ผ่าน" {{($t->result=="ไม่ผ่าน")? "checked" : "" }}>ไม่ผ่าน</label></div>
    			</div>
    		</div>
    		
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="tranEtc3" name="tranEtc3" value="{{$t->note3}}"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			<input name="id" value="{{$t->id}}" type="hidden">
    			</div>
    		</div>
	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="tranAdd" name="tranbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="tranDel" name="trandelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>
		<div style="border: 3px solid #73AD21;"></div>			
@endforeach
	</div>
	
	<div class="container" id="met" style="display:none">		
	@foreach($meter as $m)
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล  Meter</b></label></div>
		<form method="post" action="{{url('update')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="metRadio" id="metRadioY" value="มี" {{($m->available=="มี")? "checked" : ""}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="metRadio" id="metRadioN" value="ไม่มี" {{($m->available=="ไม่มี")? "checked" : ""}}>ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">	       
    			<div class="col-sm-2">เลขที่<input class="form-control form-control-sm" type="text"  id="metSerial" name="metSerial" value="{{$m->serial}}"></div>
    			<div class="col-sm-2">สภาพ<input class="form-control form-control-sm" type="text"  id="metCon" name="metCon" value="{{$m->Objcondition}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2">ขนาด<input class="form-control form-control-sm" type="text"  id="metSize" name="metSize" value="{{$m->size}}"></div>
			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	    			
    			<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="metEtc" name="metEtc" value="{{$m->note}}"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			<input name="id" value="{{$m->id}}" type="hidden">
    			</div>
    		</div>
    		<div class="form-group">
    			ผลการตรวจสอบ
    			<div class="radio-inline col-sm-0"><input type="radio" name="metRadio2" id="metRadioP" value="ผ่าน" {{($m->result=="ผ่าน"? "checked" : "")}}>ผ่าน</div>
        		<div class="radio-inline col-sm-0"><input type="radio" name="metRadio2" id="metRadioN" value="ไม่ผ่าน" {{($m->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="metAdd" name="metbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="metDel" name="metdelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>
		<div style="border: 3px solid #73AD21;"></div>
	@endforeach		
	</div>
	
	<div class="container" id="mdb" style="display:none">
	@foreach($mdb as $md)	
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล MDB</b></label></div>
		<form method="post" action="{{url('update')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="mdbRadio" id="mdbRadioY" value="มี" {{($md->available=="มี"? "checked" : "")}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="mdbRadio" id="mdbRadioN" value="ไม่มี" {{($md->available=="ไม่มี"? "checked" : "")}}>ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline"><label><input type="radio" name="mdbRadio2" id="mdbLP" value="LP" {{($md->type=="LP"? "checked" : "")}}>Load Center Panel (LP)</label></div>
        		<div class="radio-inline"><label><input type="radio" name="mdbRadio2" id="mdbMDP" value="MDP" {{($md->type=="MDP"? "checked" : "")}}>Main Distribution Panel (MDP)</label></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2">ยี่ห้อ<input class="form-control form-control-sm" type="text"  id="mdbBrand" name="mdbBrand" value="{{$md->brand}}"></div>
    			<div class="col-sm-2">Phrase (PH)<input class="form-control form-control-sm" type="text"  id="mdbPhrase" name="mdbPhrase" value="{{$md->phrase}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-2">ปีที่ติดตั้ง<input class="form-control form-control-sm" type="text"  id="mdbYear" name="mdbYear" value="{{$md->year}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-3">Main Circuit Breaker (AT)<input class="form-control form-control-sm" type="text"  id="mdbMBreaker" name="mdbMBreaker" value="{{$md->mcb}}"></div>	
    			<div class="col-sm-3">FX Circuit Breaker/ATS (AT)<input class="form-control form-control-sm" type="text"  id="mdbFXBreaker" name="mdbFXBreaker" value="{{$md->fx}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<label class="col-sm-1">LOAD</label>
    			<div class="col-sm-2">R (A.)<input class="form-control form-control-sm" type="text"  id="mdbRLoad" name="mdbRLoad" value="{{$md->r}}"></div>	
    			<div class="col-sm-2">S (A.)<input class="form-control form-control-sm" type="text"  id="mdbSLoad" name="mdbSLoad" value="{{$md->s}}"></div>
    			<div class="col-sm-2">T (A.)<input class="form-control form-control-sm" type="text"  id="mdbTLoad" name="mdbTLoad" value="{{$md->t}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<table class="table table-bordered">
    			<thead>
    				<tr>
    				<th>Item</th>
    				<th>รายการตรวจสอบทั่วไป</th>
    				<th>Pass</th>
    				<th>Fail</th>
    				<th>หมายเหตุ</th>
    				</tr>
    			</thead>
    			<tbody>
					<tr>
					<td>1</td>
					<td>ตรวจสอบสภาพของอุปกรณ์อยู่ในสภาพสมบูรณ์ไม่ได้รับความเสียหาย</td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio" id="metTRadioP" value="ผ่าน" {{($md->check1=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio" id="metTRadioF" value="ไม่ผ่าน" {{($md->check1=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="mdbEtc" name="mdbEtc" value="{{$md->note1}}"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง MDP อยู่ในสภาพที่มั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio2" id="metTRadioP2" value="ผ่าน" {{($md->check2=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio2" id="metTRadioF2" value="ไม่ผ่าน" {{($md->check2=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="mdbEtc2" name="mdbEtc2" value="{{$md->note2}}"></div></td>
					</tr>     			
    				<tr>
					<td>3</td>
					<td>ตรวจสอบการติดตั้ง Circuit Breaker อยู่ในสภาพปกติเรียบร้อย</td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio3" id="metTRadioP3" value="ผ่าน" {{($md->check3=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio3" id="metTRadioF3" value="ไม่ผ่าน" {{($md->check3=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="mdbEtc3" name="mdbEtc3" value="{{$md->note3}}"></div></td>
					</tr> 
    				<tr>
					<td>4</td>
					<td>ตรวจสอบการจัดระเบียบสายไฟอยู่ในเกณฑ์ดี</td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio4" id="metTRadioP4" value="ผ่าน" {{($md->check4=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio4" id="metTRadioF4" value="ไม่ผ่าน" {{($md->check4=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="mdbEtc4" name="mdbEtc4" value="{{$md->note4}}"></div></td>
					</tr> 
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<div class="row">
    				<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="mdbEtc5" name="mdbEtc5" value="{{$md->note5}}"></div>    			
    				<input name="locationid" value="{{$id}}" type="hidden">
    				<input name="id" value="{{$md->id}}" type="hidden">
    			</div>
    		</div>
    		
    		<div class="form-group">			   		
    			<div class="row">	
    			<label class="col-sm-0">ผลการตรวจสอบ</label>
    			<div class="radio-inline"><label><input type="radio" name="mdbRadio3" id="mdbRadioP" value="ผ่าน" {{($md->result=="ผ่าน"? "checked" : "")}}>ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="mdbRadio3" id="mdbRadioF" value="ไม่ผ่าน" {{($md->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</label></div>   			
    			</div>
    		</div>
    			
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="mdbAdd" name="mdbbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="mdbDel" name="mdbdelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>
		<div style="border: 3px solid #73AD21;"></div>
		@endforeach		
	</div>

<div class="container" id="generator" style="display:none">		
		@foreach($gen as $g)
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Generator Set</b></label></div>
		<form method="post" action="{{url('update')}}">	
		{{csrf_field()}}				
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="genRadio" id="genRadioY" value="มี" {{($g->available=="มี"? "checked" : "")}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="genRadio" id="genRadioN" value="ไม่มี" {{($g->available=="ไม่มี"? "checked" : "")}}>ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2">รหัสสินทรัพย์<input class="form-control form-control-sm" type="text"  id="genCode" name="genCode" value="{{$g->code}}"></div>
    			<div class="col-sm-2">Engine Brand Name<input class="form-control form-control-sm" type="text"  id="EnBrand" name="EnBrand" value="{{$g->enbrand}}"></div>
    			<div class="col-sm-2">Engine Serial No<input class="form-control form-control-sm" type="text"  id="EnSno" name="EnSno" value="{{$g->enserial}}"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2">ปีที่ติดตั้ง<input class="form-control form-control-sm" type="text"  id="genYear" name="genYear" value="{{$g->year}}"></div>    				
    			<div class="col-sm-2">Gen Brand Name<input class="form-control form-control-sm" type="text"  id="genBrand" name="genBrand" value="{{$g->genbrand}}"></div>	
    			<div class="col-sm-2">Gen Serial No<input class="form-control form-control-sm" type="text"  id="genSno" name="genSno" value="{{$g->genserial}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2">Phrase (PH)<input class="form-control form-control-sm" type="text"  id="genPhrase" name="genPhrase" value="{{$g->phrase}}"></div>	
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<table class="table table-bordered">
    			<thead>
    				<tr>
    				<th>Item</th>
    				<th>รายการตรวจสอบทั่วไป</th>
    				<th>Pass</th>
    				<th>Fail</th>
    				<th>หมายเหตุ</th>
    				</tr>
    			</thead>
    			<tbody>
					<tr>
					<td>1</td>
					<td>ตรวจสอบสภาพของอุปกรณือยู่ในสภาพสมบูรณ์ไม่ได้รับความเสียหาย</td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio" id="genTRadioP" value="ผ่าน" {{($g->check1=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio" id="genTRadioF" value="ไม่ผ่าน" {{($g->check1=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="genEtc" name="genEtc" value="{{$g->note1}}"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Generator Set อยู่ในสภาพที่มั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio2" id="genTRadioP2" value="ผ่าน" {{($g->check2=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio2" id="genTRadioF2" value="ไม่ผ่าน" {{($g->check2=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="genEtc2" name="genEtc2" value="{{$g->note2}}"></div></td>
					</tr>
					<tr>
					<td>3</td>
					<td>ตรวจสอบอุปกรณ์ Control Generator อยู่ในสภาพใช้งานได้ปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio3" id="genTRadioP3" value="ผ่าน" {{($g->check3=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio3" id="genTRadioF3" value="ไม่ผ่าน" {{($g->check3=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="genEtc3" name="genEtc3" value="{{$g->note3}}"></div></td>
					</tr>
					<tr>
					<td>4</td>
					<td>ตรวจสอบถังน้ำมันสำรอง อยู่ในสภาพใช้งานได้ปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio4" id="genTRadioP4" value="ผ่าน" {{($g->check4=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio4" id="genTRadioF4" value="ไม่ผ่าน" {{($g->check4=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="genEtc4" name="genEtc4" value="{{$g->note4}}"></div></td>
					</tr>     			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    				<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="genEtc5" name="genEtc5" valuer="{{$g->note5}}"></div>    			
    				<input name="locationid" value="{{$id}}" type="hidden">
    				<input name="id" value="{{$g->id}}" type="hidden">
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="genRadio2" id="genRadioP" value="ผ่าน" {{($g->result=="ผ่าน"? "checked" : "")}}>ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="genRadio2" id="genRadioF" value="ไม่ผ่าน" {{($g->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</label></div>
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="genAdd" name="genbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="genDel" name="gendelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>	
		<div style="border: 3px solid #73AD21;"></div>
		@endforeach		
	</div>
	
<div class="container" id="rectifier" style="display:none">	
@foreach($rectifier as $rect)	
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Rectifier</b></label></div>
		<form method="post" action="{{url('update')}}">	
		{{csrf_field()}}				
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="recRadio" id="recRadioY" value="มี" {{($rect->available=="มี"? "checked" : "")}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="recRadio" id="recRadioF" value="ไม่มี" {{($rect->available=="ไม่มี"? "checked" : "")}}>ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">		
    			<div class="col-sm-2">ยี่ห้อ<input class="form-control form-control-sm" type="text"  id="recName" name="recBrand" value="{{$rect->brand}}"></div>
    			<div class="col-sm-2">Control Serial<input class="form-control form-control-sm" type="text"  id="recPhrase" name="recSno" value="{{$rect->ctrlserial}}"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2">ปีที่ติดตั้ง<input class="form-control form-control-sm" type="text"  id="recYear" name="recYear" value="{{$rect->year}}"></div>    				
    			<div class="col-sm-4">Rec. Display>Batt System Voltage (Volt)<input class="form-control form-control-sm" type="text"  id="recVolt" name="recVolt" value="{{$rect->rectvolt}}"></div>	
    			<div class="col-sm-2">Current Load (A.)<input class="form-control form-control-sm" type="text"  id="recLoad" name="recLoad" value="{{$rect->currload}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-3">Rec. Module ขนาด (Watt หรือ Amp)<input class="form-control form-control-sm" type="text"  id="recMod" name="recMod" value="{{$rect->rectmodule}}"></div>
    			<div class="col-sm-2">จำนวน(Unit)<input class="form-control form-control-sm" type="text"  id="recQty" name="recQty" value="{{$rect->qty}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<table class="table table-bordered">
    			<thead>
    				<tr>
    				<th>Item</th>
    				<th>รายการตรวจสอบทั่วไป</th>
    				<th>Pass</th>
    				<th>Fail</th>
    				<th>หมายเหตุ</th>
    				</tr>
    			</thead>
    			<tbody>
					<tr>
					<td>1</td>
					<td>ตรวจสอบสภาพของอุปกรณือยู่ในสภาพสมบูรณ์ไม่ได้รับความเสียหาย</td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio" id="recTRadioP" value="ผ่าน" {{($rect->check1=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio" id="recTRadioF" value="ไม่ผ่าน" {{($rect->check1=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="recEtc" name="recEtc" value="{{$rect->note1}}"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Rack Rectifier อยู่ในสภาพมั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio2" id="recTRadioP2" value="ผ่าน" {{($rect->check2=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio2" id="recTRadioF2" value="ไม่ผ่าน" {{($rect->check2=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="recEtc2" name="recEtc2" value="{{$rect->note2}}"></div></td>
					</tr>
					<tr>
					<td>3</td>
					<td>ตรวจสอบ Rectifier Module ถูกล็อคและเสียบอยู่ใน slot อย่างมั่นคง</td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio3" id="recTRadioP3" value="ผ่าน" {{($rect->check3=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio3" id="recTRadioF3" value="ไม่ผ่าน" {{($rect->check3=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="recEtc3" name="recEtc3" value="{{$rect->note3}}"></div></td>
					</tr>
					<tr>
					<td>4</td>
					<td>ตรวจสอบ Rectifier Display Status ทำงานได้ปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio4" id="recTRadioP4" value="ผ่าน" {{($rect->check4=="ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio4" id="recTRadioF4" value="ไม่ผ่าน" {{($rect->check4=="ไม่ผ่าน"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="recEtc4" name="recEtc4" value="{{$rect->note4}}"></div></td>
					</tr>     			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    		
    		<div class="form-group">
    			<div class="row">
    				<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="recEtc5" name="recEtc5" value="{{$rect->note5}}"></div>    			
    				<input name="locationid" value="{{$id}}" type="hidden">
    				<input name="id" value="{{$rect->id}}" type="hidden">
    			</div>
    		</div>
    		
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="recRadio2" id="recRadioP" value="ผ่าน" {{($rect->result=="ผ่าน"? "checked" : "")}}>ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="recRadio2" id="recRadioF" value="ไม่ผ่าน" {{($rect->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</label></div>    			
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="recAdd" name="recbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="recDel" name="recdelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>	
		@endforeach		
	</div>

<div class="container" id="battery" style="display:none">	
@foreach($batt as $b)	
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Battery</b></label></div>
		<form method="post" action="{{url('update')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="battRadio" id="battRadioY" value="มี" {{($b->available=="มี"? "checked" : "")}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="battRadio" id="battRadioN" value="ไม่มี" {{($b->available=="ไม่มี"? "checked" : "")}}>ไม่มี</label></div>
        		<div class="col-sm-2">จำนวน(กอง)<input class="form-control form-control-sm" type="text"  id="battQty" name="battQty" value="{{$b->qty}}"></div>      		
        		</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">	
    			<div class="col-sm-1">ห้อง<input class="form-control form-control-sm" type="text"  id="battRoom" name="battRoom" value="{{$b->room}}"></div>	
    			<div class="col-sm-1">ชั้น<input class="form-control form-control-sm" type="text"  id="battFl" name="battFl" value="{{$b->floor}}"></div>
    			</div>
    		</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2">ยี่ห้อ<input class="form-control form-control-sm" type="text"  id="battName" name="battBrand" value="{{$b->brand}}"></div>
    			<div class="col-sm-2">Model<input class="form-control form-control-sm" type="text"  id="battMod" name="battMod" value="{{$b->model}}"></div>
    			<div class="col-sm-2">ขนาด (Ah)<input class="form-control form-control-sm" type="text"  id="battSize" name="battSize" value="{{$b->size}}"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2">ปีที่ติดตั้ง<input class="form-control form-control-sm" type="text"  id="battYear" name="battYear" value="{{$b->year}}"></div>    				
    			<div class="col-sm-2">จำนวน (เซลล์/กอง)<input class="form-control form-control-sm" type="text"  id="battQty" name="battCellQty" value="{{$b->cellqty}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<table class="table table-bordered">
    			<thead>
    				<tr>
    				<th>Item</th>
    				<th>รายการตรวจสอบทั่วไป</th>
    				<th>Pass</th>
    				<th>Fail</th>
    				<th>หมายเหตุ</th>
    				</tr>
    			</thead>
    			<tbody>
					<tr>
					<td>1</td>
					<td>ตรวจสอบสภาพของอุปกรณือยู่ในสภาพสมบูรณ์ไม่ได้รับความเสียหาย</td>
					<td><div class="radio-inline "><label><input type="radio" name="battTRadio" id="battTRadioP" value="passT1" {{($b->check1=="passT1"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio" id="battTRadioF" value="failT1" {{($b->check1=="failT1"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" id="battEtc" name="battEtc" value="{{$b->note1}}"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Battery และ  Battery Rack อยู่ในสภาพมั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio2" id="battTRadioP2" value="passT2" {{($b->check2=="passT2"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio2" id="battTRadioF2" value="failT2" {{($b->check2=="failT2"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" id="battEtc2" name="battEtc2" value="{{$b->note2}}"></div></td>
					</tr>
					<tr>
					<td>3</td>
					<td>ตรวจสอบสายไฟจุดเชื่อมต่อระหว่าง Battery ถูกไขยึดติดอย่างแน่นหนา</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio3" id="battTRadioP3" value="passT3" {{($b->check3=="passT3"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio3" id="battTRadioF3" value="failT3" {{($b->check3=="failT3"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="battEtc3" name="battEtc3" value="{{$b->note3}}"></div></td>
					</tr>
					<tr>
					<td>4</td>
					<td>มี Label หรือ Code สีบอกที่ขั้วสายไฟชัดเจน</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio4" id="battTRadioP4" value="passT4" {{($b->check4=="passT4"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio4" id="battTRadioF4" value="failT4" {{($b->check4=="failT4"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text"  id="battEtc4" name="battEtc4" value="{{$b->note4}}"></div></td>
					</tr>
					<tr>
					<td>5</td>
					<td>ตรวจสอบ Case ของแบตเตอรี่อยู่ในสภาพปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio5" id="battTRadioP5" value="passT5" {{($b->check5=="passT5"? "checked" : "")}}></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio5" id="battTRadioF5" value="failT5" {{($b->check5=="failT5"? "checked" : "")}}></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" id="battEtc5" name="battEtc5" value="{{$b->note5}}"></div></td>
					</tr>      			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    	
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ visual test และ การวัดค่าจาก Analyst</label>	
    			<div class="radio-inline"><label><input type="radio" name="battRadio2" id="battRadioP2" value="ผ่าน" {{($b->result=="ผ่าน"? "checked" : "")}}>ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="battRadio2" id="battRadioF2" value="ไม่ผ่าน" {{($b->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</label></div>
    			<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="battEtc6" name="battEtc6" value="{{$b->note6}}"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			<input name="id" value="{{$b->id}}" type="hidden">   			
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="battAdd" name="battbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="battDel" name="battdelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>	
		<div style="border: 3px solid #73AD21;"></div>
		@endforeach		
	</div>	

<div class="container" id="air" style="display:none">	
@foreach($air as $a)	
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Air Conditioner</b></label></div>
		<form method="post" action="{{url('update')}}">
		{{csrf_field()}}						
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="acRadio" id="acRadioY" value="มี" {{($a->available=="มี"? "checked" : "")}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="acRadio" id="acRadioN" value="ไม่มี" {{($a->available=="ไม่มี"? "checked" : "")}}>ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">	
    			<div class="col-sm-2">ห้อง<input class="form-control form-control-sm" type="text"  id="acRoom" name="acRoom" value="{{$a->room}}"></div>	
    			<div class="col-sm-1">ชั้น<input class="form-control form-control-sm" type="text"  id="acFl" name="acFl" value="{{$a->floor}}"></div>
    			<div class="col-sm-2">อุณหภูมิ<input class="form-control form-control-sm" type="text"  id="acTmp" name="acTmp" value="{{$a->temp}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<label class="col-sm-1">Type</label>		
        		<div class="radio-inline"><label><input type="radio" name="acRadio2" id="acRadioSP" value="split" {{($a->type=="split"? "checked" : "")}}>Split</label></div>
        		<div class="radio-inline"><label><input type="radio" name="acRadio2" id="acRadioFB" value="freeblow" {{($a->type=="freeblow"? "checked" : "")}}>Free Blow</label></div>
        		<div class="radio-inline"><label><input type="radio" name="acRadio2" id="acRadioPre" value="precision" {{($a->type=="precision"? "checked" : "")}}>Precision</label></div>
        	</div>
        	</div>
        	<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2">รหัสสินทรัพย์<input class="form-control form-control-sm" type="text"  id="acCode" name="acCode" value="{{$a->code}}"></div>
    			<div class="col-sm-3">Power Supply(V-Ph-Hz)<input class="form-control form-control-sm" type="text"  id="acSup" name="acSup" value="{{$a->powersup}}"></div>
    			</div>
    		</div>
    		<div class="form-group">		
    			<div class="row">
    			<div class="col-sm-2">FCU Brand Name<input class="form-control form-control-sm" type="text"  id="fcuName" name="fcuName" value="{{$a->fcubrand}}"></div>    			
    			<div class="col-sm-2">Model<input class="form-control form-control-sm" type="text"  id="fcuMod" name="fcuMod" value="{{$a->fcumodel}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2">Serial No<input class="form-control form-control-sm" type="text"  id="fcuSer" name="fcuSer" value="{{$a->fcuserial}}"></div>
    			<div class="col-sm-2">ขนาด (BTU/Watt/Hp)<input class="form-control form-control-sm" type="text"  id="fcuSize" name="fcuSize" value="{{$a->size}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2">ACU Brand Name<input class="form-control form-control-sm" type="text"  id="acuName" name="acuName" value="{{$a->acubrand}}"></div>    			
    			<div class="col-sm-2">Model<input class="form-control form-control-sm" type="text"  id="acuMod" name="acuMod" value="{{$a->acumodel}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-2">Serial No<input class="form-control form-control-sm" type="text"  id="acuSer" name="acuSer" value="{{$a->acuserial}}"></div>
    			</div>
    		</div>
    		<div class="form-group">		   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="acRadio3" id="acuRadioP" value="ผ่าน" {{($a->result=="ผ่าน"? "checked" : "")}}>ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="acRadio3" id="acuRadioP" value="ไม่ผ่าน" {{($a->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</label></div>
    			<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="acuEtc" name="acuEtc" value="{{$a->note1}}"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			<input name="id" value="{{$a->id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="acuAdd" name="acbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="acuDel" name="acdelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>
		<div style="border: 3px solid #73AD21;"></div>
		@endforeach		
	</div>

<div class="container" id="ups" style="display:none">
@foreach($ups as $u)		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล UPS</b></label></div>
		<form method="post" action="{{url('update')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="upsRadio" id="upsRadioY" value="มี" {{($u->available=="มี"? "checked" : "")}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="upsRadio" id="upsRadioN" value="ไม่มี" {{($u->available=="ไม่มี"? "checked" : "")}}>ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">
    			<div class="col-sm-1">ห้อง<input class="form-control form-control-sm" type="text"  id="upsRoom" name="upsRoom" value="{{$u->room}}"></div>	
    			<div class="col-sm-1">ชั้น<input class="form-control form-control-sm" type="text"  id="upsFl" name="upsFl" value="{{$u->floor}}"></div>
    			</div>
    		</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2">รหัสสินทรัพย์<input class="form-control form-control-sm" type="text"  id="upsCode" name="upsCode" value="{{$u->code}}"></div>	
    			<div class="col-sm-2">ยี่ห้อ<input class="form-control form-control-sm" type="text"  id="upsBrand" name="upsBrand" value="{{$u->brand}}"></div>
    			<div class="col-sm-2">Serial<input class="form-control form-control-sm" type="text"  id="upsSno" name="upsSno" value="{{$u->serial}}"></div>
    			<div class="col-sm-2">Model<input class="form-control form-control-sm" type="text"  id="upsMod" name="upsMod" value="{{$u->model}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2">ขนาด(VA)<input class="form-control form-control-sm" type="text"  id="upsSize" name="upsSize" value="{{$u->size}}"></div>	
    			<div class="col-sm-2">ปีที่ติดตั้ง<input class="form-control form-control-sm" type="text"  id="upsYear" name="upsYear" value="{{$u->year}}"></div>
			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
        			<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="upsEtc" name="upsEtc" value="{{$u->note1}}"></div>    			
        			<input name="locationid" value="{{$id}}" type="hidden">
        			<input name="id" value="{{$u->id}}" type="hidden">
    			</div>   			
    		</div>
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="upsRadio2" id="upsRadioP" value="ผ่าน" {{($u->result=="ผ่าน"? "checked" : "")}}>ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="upsRadio2" id="upsRadioF" value="ไม่ผ่าน" {{($u->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</label></div>
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="upsAdd" name="upsbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="upsDel" name="upsdelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>
		<div style="border: 3px solid #73AD21;"></div>
		@endforeach		
	</div>


<div class="container" id="invert" style="display:none">
@foreach($inver as $in)	
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Inverter</b></label></div>
		<form method="post" action="{{url('update')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="invRadio" id="invRadioY" value="มี" {{($in->available=="มี"? "checked" : "")}}>มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="invRadio" id="invRadioN" value="ไม่มี" {{($in->available=="ไม่มี"? "checked" : "")}}>ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">
    			<div class="col-sm-1">ห้อง<input class="form-control form-control-sm" type="text"  id="invRoom" name="invRoom" value="{{$in->room}}"></div>	
    			<div class="col-sm-1">ชั้น<input class="form-control form-control-sm" type="text"  id="invFl" name="invFl" value="{{$in->floor}}"></div>
    			</div>
    		</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2">รหัสสินทรัพย์<input class="form-control form-control-sm" type="text"  id="invCode" name="invCode" value="{{$in->code}}"></div>	
    			<div class="col-sm-2">ยี่ห้อ<input class="form-control form-control-sm" type="text"  id="invBrand" name="invBrand" value="{{$in->brand}}"></div>
    			<div class="col-sm-2">Serial<input class="form-control form-control-sm" type="text"  id="invSno" name="invSno" value="{{$in->serial}}"></div>
    			<div class="col-sm-2">Model<input class="form-control form-control-sm" type="text"  id="invMod" name="invMod" value="{{$in->model}}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2">ขนาด(VA)<input class="form-control form-control-sm" type="text"  id="invSize" name="invSize" value="{{$in->size}}"></div>	
    			<div class="col-sm-2">ปีที่ติดตั้ง<input class="form-control form-control-sm" type="text"  id="invYear" name="invYear" value="{{$in->year}}"></div>
			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    				<div class="col-sm-4">หมายเหตุ<input class="form-control form-control-sm" type="text"  id="invEtc" name="invEtc" value="{{$in->note1}}"></div>    			
    				<input name="locationid" value="{{$id}}" type="hidden">
    				<input name="id" value="$in->id" type="hidden">
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="invRadio2" id="invRadioP" value="ผ่าน" {{($in->result=="ผ่าน"? "checked" : "")}}>ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="invRadio2" id="invRadioF" value="ไม่ผ่าน" {{($in->result=="ไม่ผ่าน"? "checked" : "")}}>ไม่ผ่าน</label></div>
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="invAdd" name="invbtn">แก้ไข</button>
    			<button type="submit" class="btn btn-outline-success" id="invDel" name="invdelbtn">ลบ</button>
    			</div>
    		</div>			
		</form>
		<div style="border: 3px solid #73AD21;"></div>
		@endforeach		
	</div>

<div class="container" id="imgs" style="display:none">		
		<h3 class="jumbotron">Image Upload</h3>	
		@foreach($image as $img)			
			<form method="post" action="{{url('/imgdel')}}" enctype="multipart/form-data">
  			{{csrf_field()}}
        	<div class="container">        
              <img src="{{asset('/'.$img->locid.'/'.$img->imgname) }}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
              <input name="imgname" value="{{$img->imgname}}" type="hidden">
              <input name="locid" value="{{$img->locid}}" type="hidden">
              <input name="id" value="{{$img->id}}" type="hidden">
            </div>
          	<button type="submit" class="btn btn-primary" style="margin-top:10px" name="imgdelbtn">ลบ</button>
			</form>
		@endforeach 		
	</div>	   

	
</div>	

@if($errors->any() || \Session::has('success'))
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>
@endif
	
@endsection
