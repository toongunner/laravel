@extends('layouts.app')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="{!! asset('js/adddata.js') !!}"></script>
<link rel="stylesheet" href="{{ asset('css/adddata.css') }}">


@section('content')
<div class="container">
   <strong><ul class="nav nav-tabs nav-justified" >
    	<li class="nav-item" id="transf">
    	<a class="nav-link active">Transformer</a>
    	</li>
    	<li class="nav-item" id="meter">
    	<a class="nav-link">Meter</a>
    	</li>
    	<li class="nav-item" id="mdp">
    	<a class="nav-link">MDB</a>
    	</li>
    	<li class="nav-item" id="gen">
    	<a class="nav-link">Generetor Set</a>
    	</li>
    	<li class="nav-item" id="rec">
    	<a class="nav-link">Rectifier</a>
    	</li>
    	<li class="nav-item" id="batt">
    	<a class="nav-link">Battery</a>
    	</li>
    	<li class="nav-item" id="ac">
    	<a class="nav-link">Air Con.</a>
    	</li>
    	<li class="nav-item" id="up">
    	<a class="nav-link">UPS</a>
    	</li>
    	<li class="nav-item" id="inv">
    	<a class="nav-link">Inverter</a>
    	</li>
    	<li class="nav-item" id="img">
    	<a class="nav-link">Images/PDF</a>
    	</li>
    </ul></strong>
</div>

<div class="container">
<div class="alert alert-info">
	ชุมสาย
    <strong> 
    	{{$locname}}
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
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Transformer</b></label></div>
		<form method="post" action="{{url('adddata')}}">
		{{csrf_field()}}					
    		<div class="form-group"> 
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="tranRadio" id="tranRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="tranRadio" id="tranRadioN" value="no">ไม่มี</label></div>
        		<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="tranQty" name="tranQty" placeholder="จำนวน"></div>
        		</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="tranCode" name="tranCode" placeholder="รหัสสินทรัพย์"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="tranBrand" name="tranBrand" placeholder="ยี่ห้อ"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="tranPhrase" name="tranPhrase" placeholder="Phrase (PH)"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="tranSize" name="tranSize" placeholder="ขนาด(KVA.)"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="tranYear" name="tranYear" placeholder="ปีที่ติดตั้ง"></div>
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
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio" id="tranTRadioP" value="passT1"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio" id="tranTRadioF" value="failT1"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="tranEtc" name="tranEtc"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Transformer อยู่ในสภาพที่มั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio2" id="tranTRadioP2" value="passT2"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="tranTRadio2" id="tranTRadioF2" value="failT2"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="tranEtc2" name="tranEtc2"></div></td>
					</tr>     			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    	
    		<div class="form-group">			   		
    			<div class="row">	
    			<label class="col-sm-0">ผลการตรวจสอบ</label>
    			<div class="radio-inline"><label><input type="radio" name="tranRadio2" id="tranRadioP3" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="tranRadio2" id="tranRadioF3" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="tranEtc3" name="tranEtc3" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="tranAdd" name="tranbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>
	
	<div class="container" id="met" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล  Meter</b></label></div>
		<form method="post" action="{{url('adddata')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="metRadio" id="metRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="metRadio" id="metRadioN" value="no">ไม่มี</label></div>
        		<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="metQty" name="metQty" placeholder="จำนวน"></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="metCode" name="metCode" placeholder="รหัสสินทรัพย์"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="metSerial" name="metSerial" placeholder="เลขที่"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="metCon" name="metCon" placeholder="สภาพ"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="metSize" name="metSize" placeholder="ขนาด"></div>
			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<label class="col-sm-0">ผลการตรวจสอบ</label>
    			<div class="radio-inline"><label><input type="radio" name="metRadio2" id="metRadioP" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="metRadio2" id="metRadioN" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="metEtc" name="metEtc" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="metAdd" name="metbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>

<div class="container" id="mdb" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล MDB</b></label></div>
		<form method="post" action="{{url('adddata')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="mdbRadio" id="mdbRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="mdbRadio" id="mdbRadioN" value="no">ไม่มี</label></div>
        		<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbQty" name="mdbQty" placeholder="จำนวน"></div>
        	</div> 
        	</div>
        	<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline"><label><input type="radio" name="mdbRadio2" id="mdbLP" value="LP">Load Center Panel (LP)</label></div>
        		<div class="radio-inline"><label><input type="radio" name="mdbRadio2" id="mdbMDP" value="MDB">Main Distribution Panel (MDB)</label></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbCode" name="mdbCode" placeholder="รหัสสินทรัพย์"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbBrand" name="mdbBrand" placeholder="ยี่ห้อ"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbPhrase" name="mdbPhrase" placeholder="Phrase (PH)"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbSize" name="mdbSize" placeholder="ขนาด(KVA.)"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbYear" name="mdbYear" placeholder="ปีที่ติดตั้ง"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-3"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbMBreaker" name="mdbMBreaker" placeholder="Main Circuit Breaker (AT)"></div>	
    			<div class="col-sm-3"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbFXBreaker" name="mdbFXBreaker" placeholder="FX Circuit Breaker/ATS (AT)"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<label class="col-sm-1">LOAD</label>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbRLoad" name="mdbRLoad" placeholder="R (A.)"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbSLoad" name="mdbSLoad" placeholder="S (A.)"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbTLoad" name="mdbTLoad" placeholder="T (A.)"></div>
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
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio" id="metTRadioP" value="passT1"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio" id="metTRadioF" value="failT1"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbEtc" name="mdbEtc"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง MDP อยู่ในสภาพที่มั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio2" id="metTRadioP2" value="passT2"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio2" id="metTRadioF2" value="failT2"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbEtc2" name="mdbEtc2"></div></td>
					</tr>     			
    				<tr>
					<td>3</td>
					<td>ตรวจสอบการติดตั้ง Circuit Breaker อยู่ในสภาพปกติเรียบร้อย</td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio3" id="metTRadioP3" value="passT3"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio3" id="metTRadioF3" value="failT3"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbEtc3" name="mdbEtc3"></div></td>
					</tr> 
    				<tr>
					<td>4</td>
					<td>ตรวจสอบการจัดระเบียบสายไฟอยู่ในเกณฑ์ดี</td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio4" id="metTRadioP4" value="passT4"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="mdbTRadio4" id="metTRadioF4" value="failT4"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbEtc4" name="mdbEtc4"></div></td>
					</tr> 
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    	
    		<div class="form-group">			   		
    			<div class="row">	
    			<label class="col-sm-0">ผลการตรวจสอบ</label>
    			<div class="radio-inline"><label><input type="radio" name="mdbRadio3" id="mdbRadioP" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="mdbRadio3" id="mdbRadioF" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="mdbEtc5" name="mdbEtc5" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="mdbAdd" name="mdbbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>

<div class="container" id="generator" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Generator Set</b></label></div>
		<form method="post" action="{{url('adddata')}}">	
		{{csrf_field()}}				
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="genRadio" id="genRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="genRadio" id="genRadioN" value="no">ไม่มี</label></div>
        		<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="genQty" name="genQty" placeholder="จำนวน"></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="genCode" name="genCode" placeholder="รหัสสินทรัพย์"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="EnBrand" name="EnBrand" placeholder="Engine Brand Name"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="EnSno" name="EnSno" placeholder="Engine Serial No"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="genYear" name="genYear" placeholder="ปีที่ติดตั้ง"></div>    				
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="genBrand" name="genBrand" placeholder="Gen Brand Name"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="genSno" name="genSno" placeholder="Gen Serial No"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="genPhrase" name="genPhrase" placeholder="Phrase (PH)"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="genSize" name="genSize" placeholder="ขนาด (KVA.)"></div>
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
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio" id="genTRadioP" value="passT1"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio" id="genTRadioF" value="failT1"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="genEtc" name="genEtc"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Generator Set อยู่ในสภาพที่มั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio2" id="genTRadioP2" value="passT2"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio2" id="genTRadioF2" value="failT2"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="genEtc2" name="genEtc2"></div></td>
					</tr>
					<tr>
					<td>3</td>
					<td>ตรวจสอบอุปกรณ์ Control Generator อยู่ในสภาพใช้งานได้ปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio3" id="genTRadioP3" value="passT3"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio3" id="genTRadioF3" value="failT3"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="genEtc3" name="genEtc3"></div></td>
					</tr>
					<tr>
					<td>4</td>
					<td>ตรวจสอบถังน้ำมันสำรอง อยู่ในสภาพใช้งานได้ปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio4" id="genTRadioP4" value="passT14"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="genTRadio4" id="genTRadioF4" value="failT4"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="genEtc4" name="genEtc4"></div></td>
					</tr>     			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    	
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="genRadio2" id="genRadioP" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="genRadio2" id="genRadioF" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="genEtc5" name="genEtc5" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="genAdd" name="genbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>

<div class="container" id="rectifier" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Rectifier</b></label></div>
		<form method="post" action="{{url('adddata')}}">	
		{{csrf_field()}}				
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="recRadio" id="recRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="recRadio" id="recRadioF" value="no">ไม่มี</label></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="recCode" name="recCode" placeholder="รหัสสินทรัพย์"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="recName" name="recBrand" placeholder="ยี่ห้อ"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="recPhrase" name="recSno" placeholder="Control Serial"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="recYear" name="recYear" placeholder="ปีที่ติดตั้ง"></div>    				
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="recVolt" name="recVolt" placeholder="Rec. Display>Batt System Voltage (Volt)"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="recLoad" name="recLoad" placeholder="Current Load (A.)"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-3"><input class="form-control form-control-sm" type="text" class="form-control" id="recMod" name="recMod" placeholder="Rec. Module ขนาด (Watt หรือ Amp)"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="recQty" name="recQty" placeholder="จำนวน(Unit)"></div>
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
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio" id="recTRadioP" value="passT1"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio" id="recTRadioF" value="failT1"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="recEtc" name="recEtc"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Rack Rectifier อยู่ในสภาพมั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio2" id="recTRadioP2" value="passT2"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio2" id="recTRadioF2" value="failT2"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="recEtc2" name="recEtc2"></div></td>
					</tr>
					<tr>
					<td>3</td>
					<td>ตรวจสอบ Rectifier Module ถูกล็อคและเสียบอยู่ใน slot อย่างมั่นคง</td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio3" id="recTRadioP3" value="passT3"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio3" id="recTRadioF3" value="failT3"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="recEtc3" name="recEtc3"></div></td>
					</tr>
					<tr>
					<td>4</td>
					<td>ตรวจสอบ Rectifier Display Status ทำงานได้ปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio4" id="recTRadioP4" value="passT4"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="recTRadio4" id="recTRadioF4" value="failT4"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="recEtc4" name="recEtc4"></div></td>
					</tr>     			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    	
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="recRadio2" id="recRadioP" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="recRadio2" id="recRadioF" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="recEtc5" name="recEtc5" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="recAdd" name="recbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>
	
<div class="container" id="battery" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Battery</b></label></div>
		<form method="post" action="{{url('adddata')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="battRadio" id="battRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="battRadio" id="battRadioN" value="no">ไม่มี</label></div>        		
        	</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">	
    			<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="battRoom" name="battRoom" placeholder="ห้อง"></div>	
    			<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="battFl" name="battFl" placeholder="ชั้น"></div>
    			</div>
    		</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="battName" name="battBrand" placeholder="ยี่ห้อ"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="battMod" name="battMod" placeholder="Model"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="battSize" name="battSize" placeholder="ขนาด (Ah)"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="battType" name="battType" placeholder="ชนิด"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="battYear" name="battYear" placeholder="ปีที่ติดตั้ง"></div>    				
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="battQty" name="battQty" placeholder="จำนวน (เซลล์/กอง)"></div>
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
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio" id="battTRadioP" value="passT1"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio" id="battTRadioF" value="failT1"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="battEtc" name="battEtc"></div></td>
					</tr>
					<tr>
					<td>2</td>
					<td>ตรวจสอบการติดตั้ง Battery และ  Battery Rack อยู่ในสภาพมั่นคงแข็งแรง</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio2" id="battTRadioP2" value="passT2"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio2" id="battTRadioF2" value="failT2"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="battEtc2" name="battEtc2"></div></td>
					</tr>
					<tr>
					<td>3</td>
					<td>ตรวจสอบสายไฟจุดเชื่อมต่อระหว่าง Battery ถูกไขยึดติดอย่างแน่นหนา</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio3" id="battTRadioP3" value="passT3"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio3" id="battTRadioF3" value="failT3"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="battEtc3" name="battEtc3"></div></td>
					</tr>
					<tr>
					<td>4</td>
					<td>มี Label หรือ Code สีบอกที่ขั้วสายไฟชัดเจน</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio4" id="battTRadioP4" value="passT4"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio4" id="battTRadioF4" value="failT4"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="battEtc4" name="battEtc4"></div></td>
					</tr>
					<tr>
					<td>5</td>
					<td>ตรวจสอบ Case ของแบตเตอรี่อยู่ในสภาพปกติ</td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio5" id="battTRadioP5" value="passT5"></label></div></td>
					<td><div class="radio-inline"><label><input type="radio" name="battTRadio5" id="battTRadioF5" value="failT5"></label></div></td>
					<td><div class="col-sm"><input class="form-control form-control-sm" type="text" class="form-control" id="battEtc5" name="battEtc5"></div></td>
					</tr>      			
    			</tbody>    						
    			</table>
    			</div>
    		</div>
    	
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ visual test และ การวัดค่าจาก Analyst</label>	
    			<div class="radio-inline"><label><input type="radio" name="battRadio2" id="battRadioP2" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="battRadio2" id="battRadioF2" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="battEtc6" name="battEtc6" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="battAdd" name="battbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>

<div class="container" id="air" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Air Conditioner</b></label></div>
		<form method="post" action="{{url('adddata')}}">
		{{csrf_field()}}						
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="acRadio" id="acRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="acRadio" id="acRadioN" value="no">ไม่มี</label></div>
        		<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="airQty" name="airQty" placeholder="จำนวน" value="{{ old('airQty') }}"></div>
        	</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="acRoom" name="acRoom" placeholder="ห้อง" value="{{ old('acRoom') }}"></div>	
    			<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="acFl" name="acFl" placeholder="ชั้น" value="{{ old('acFl') }}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<label class="col-sm-1">Type</label>		
        		<div class="radio-inline"><label><input type="radio" name="acRadio2" id="acRadioSP" value="split">Split</label></div>
        		<div class="radio-inline"><label><input type="radio" name="acRadio2" id="acRadioFB" value="freeblow">Free Blow</label></div>
        		<div class="radio-inline"><label><input type="radio" name="acRadio2" id="acRadioPre" value="precision">Precision</label></div>
        	</div> 
        	</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="acCode" name="acCode" placeholder="รหัสสินทรัพย์" value="{{ old('acCode') }}"></div>
    			<div class="col-sm-3"><input class="form-control form-control-sm" type="text" class="form-control" id="acSup" name="acSup" placeholder="Power Supply(V-Ph-Hz)" value="{{ old('acSup') }}"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="fcuName" name="fcuName" placeholder="FCU Brand Name" value="{{ old('fcuName') }}"></div>    			
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="fcuMod" name="fcuMod" placeholder="Model" value="{{ old('fcuMod') }}"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="fcuSer" name="fcuSer" placeholder="Serial No" value="{{ old('fcuSer') }}"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="fcuSize" name="fcuSize" placeholder="ขนาด (BTU/Watt/Hp)" value="{{ old('fcuSize') }}"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="acuName" name="acuName" placeholder="ACU Brand Name" value="{{ old('acuName') }}"></div>    			
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="acuMod" name="acuMod" placeholder="Model" value="{{ old('acuMod') }}"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="acuSer" name="acuSer" placeholder="Serial No" value="{{ old('acuSer') }}"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="acuYear" name="acuYear" placeholder="ปีที่ติดตั้ง" value="{{ old('acuYear') }}"></div>
    			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="acRadio3" id="acuRadioP" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="acRadio3" id="acuRadioP" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="acuEtc" name="acuEtc" placeholder="หมายเหตุ" value="{{ old('acuEtc') }}"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="acuAdd" name="acbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>

<div class="container" id="ups" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล UPS</b></label></div>
		<form method="post" action="{{url('adddata')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="upsRadio" id="upsRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="upsRadio" id="upsRadioN" value="no">ไม่มี</label></div>
        		<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="upsQty" name="upsQty" placeholder="จำนวน"></div>
        	</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">
    			<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="upsRoom" name="upsRoom" placeholder="ห้อง"></div>	
    			<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="upsFl" name="upsFl" placeholder="ชั้น"></div>
    			</div>
    		</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="upsCode" name="upsCode" placeholder="รหัสสินทรัพย์"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="upsBrand" name="upsBrand" placeholder="ยี่ห้อ"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="upsSno" name="upsSno" placeholder="Serial"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="upsMod" name="upsMod" placeholder="Model"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="upsSize" name="upsSize" placeholder="ขนาด(VA)"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="upsYear" name="upsYear" placeholder="ปีที่ติดตั้ง"></div>
			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="upsRadio2" id="upsRadioP" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="upsRadio2" id="upsRadioF" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="upsEtc" name="upsEtc" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="upsAdd" name="upsbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>
	
	<div class="container" id="invert" style="display:none">		
		<div class="form-group col-sm-4"><label for="header"><b>การตรวจสอบข้อมูล Inverter</b></label></div>
		<form method="post" action="{{url('adddata')}}">
		{{csrf_field()}}					
    		<div class="form-group">
    			<div class="row">	
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="invRadio" id="invRadioY" value="yes">มี</label></div>
        		<div class="radio-inline col-sm-1"><label><input type="radio" name="invRadio" id="invRadioN" value="no">ไม่มี</label></div>
        		<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="invQty" name="invQty" placeholder="จำนวน"></div>
        	</div> 
        	</div>
        	<div class="form-group"> 
    			<div class="row">
    			<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="invRoom" name="invRoom" placeholder="ห้อง"></div>	
    			<div class="col-sm-1"><input class="form-control form-control-sm" type="text" class="form-control" id="invFl" name="invFl" placeholder="ชั้น"></div>
    			</div>
    		</div>
        	<div class="form-group">			   		
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="invCode" name="invCode" placeholder="รหัสสินทรัพย์"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="invBrand" name="invBrand" placeholder="ยี่ห้อ"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="invSno" name="invSno" placeholder="Serial"></div>
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="invMod" name="invMod" placeholder="Model"></div>
    			</div>
    		</div>
    		<div class="form-group">
    			<div class="row">
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="invSize" name="invSize" placeholder="ขนาด(VA)"></div>	
    			<div class="col-sm-2"><input class="form-control form-control-sm" type="text" class="form-control" id="invYear" name="invYear" placeholder="ปีที่ติดตั้ง"></div>
			</div>
    		</div>
    		<div class="form-group">			   		
    			<div class="row">
    			<label class="col-sm-0">ผลการตรวจสอบ</label>	
    			<div class="radio-inline"><label><input type="radio" name="invRadio2" id="invRadioP" value="pass">ผ่าน</label></div>
        		<div class="radio-inline"><label><input type="radio" name="invRadio2" id="invRadioF" value="fail">ไม่ผ่าน</label></div>
    			<div class="col-sm-4"><input class="form-control form-control-sm" type="text" class="form-control" id="invEtc" name="invEtc" placeholder="หมายเหตุ"></div>    			
    			<input name="locationid" value="{{$id}}" type="hidden">
    			</div>
    		</div>	
    		<div class="form-group">			   		
    			<div class="row">
    			<button type="submit" class="btn btn-outline-success" id="invAdd" name="invbtn">ADD</button>
    			</div>
    		</div>			
		</form>			
	</div>
	
	
	<div class="container" id="imgs" style="display:none">		
		<h3 class="jumbotron">Image Upload (ยังไม่เปิดใข้งาน)</h3>				
			<form method="post" action="{{url('image')}}" enctype="multipart/form-data">
  			{{csrf_field()}}
        	<div class="input-group control-group increment" >
          			<input type="file" name="photo[]" class="form-control">
                  	<div class="input-group-btn"> 
                    	<button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                  	</div>
        	</div>
        	<div class="clone hide">
              <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="photo[]" class="form-control">
                <div class="input-group-btn"> 
                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
              </div>
            </div>
            <input name="id" value="{{$id}}" type="hidden">
			<button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
			</form>
			
		<h3 class="jumbotron">PDF Upload</h3>
			<form method="post" action="{{url('pdf')}}" enctype="multipart/form-data">
    		{{csrf_field()}}
        	<div class="input-group control-group increment" >
          			<input type="file" name="pdffile" class="form-control">
          			<input name="id" value="{{$id}}" type="hidden">
        	</div>
          	<button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
			</form>       					
	</div>
</div>

@if($errors->any() || \Session::has('success'))
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>
@endif

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
@endsection
