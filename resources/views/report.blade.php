@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/adddata.css') }}">
<script type="text/javascript" src="{!! asset('js/test.js') !!}"></script>
<meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
@section('content')

<div class="container">
          <h2>สรุปผลการตรวจสอบคุณภาพอุปกรณ์การกำลังและเครื่องปรับอากาศ</h2>		
          <div class="well">
			<table class="table">
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>อุปกรณ์</th>
                    <th>จำนวน (Set)</th>
                    <th>ผ่าน</th>
                    <th>ไม่ผ่าน</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Transformer</td>
                    <td>{{$trancount}}</td>
                    <td>{{$tranpass}}</td>
                    <td>{{$tranfail}}</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Meter</td>
                    <td>{{$mecount}}</td>
                    <td>{{$mepass}}</td>
                    <td>{{$mefail}}</td>
                  </tr> 
                  <tr>
                    <td>3</td>
                    <td>MDB</td>
                    <td>{{$mdbcount}}</td>
                    <td>{{$mdbpass}}</td>
                    <td>{{$mdbfail}}</td>
                  </tr> 
                  <tr>
                    <td>4</td>
                    <td>Generator</td>
                    <td>{{$gencount}}</td>
                    <td>{{$genpass}}</td>
                    <td>{{$genfail}}</td>
                  </tr> 
                  <tr>
                    <td>5</td>
                    <td>Rectifier</td>
                    <td>{{$reccount}}</td>
                    <td>{{$recpass}}</td>
                    <td>{{$recfail}}</td>
                  </tr> 
                  <tr>
                    <td>6</td>
                    <td>Battery</td>
                    <td>{{$battcount}}</td>
                    <td>{{$battpass}}</td>
                    <td>{{$battfail}}</td>
                  </tr> 
                  <tr>
                    <td>7</td>
                    <td>AirCondition</td>
                    <td>{{$aircount}}</td>
                    <td>{{$airpass}}</td>
                    <td>{{$airfail}}</td>
                  </tr> 
                  <tr>
                    <td>8</td>
                    <td>Inverter</td>
                    <td>{{$invcount}}</td>
                    <td>{{$invpass}}</td>
                    <td>{{$invfail}}</td>
                  </tr> 
                  <tr>
                    <td>9</td>
                    <td>UPS</td>
                    <td>{{$upscount}}</td>
                    <td>{{$upspass}}</td>
                    <td>{{$upsfail}}</td>
                  </tr>
                  <tr>
                    <td>รวม</td>
                    <td></td>
                    <td>{{$all}}</td>
                    <td>{{$allpass}}</td>
                    <td>{{$allfail}}</td>
                  </tr>
                  <tr>
                    <td>จำนวนไซต์ทั้งหมดที่ได้ทำการกรอกข้อมูล</td>
                    <td></td>
                    <td>50</td>
                  </tr>       
                </tbody>               
  			</table>
		  </div>		  
          </div>  
	
	<div class="container">
		<button type="button" onclick="exportTableToCSV('จำนวนอุปกรณ์ทั้งหมด .csv')" class="btn btn-success">ออกรายงาน</button>
		<a href="{{ url('/home') }}" class="btn btn-ls btn-basic pull-right">กลับสู่เมนูหลัก</a>		
	</div>

<script type="text/javascript">
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob(["\ufeff",csv], {type: "text/csv;charset=utf-8"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}

</script>
	
	
@endsection
