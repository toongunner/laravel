@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/adddata.css') }}">
<script type="text/javascript" src="{!! asset('js/test.js') !!}"></script>
<meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">
@section('content')

<div class="container">
          <h2>สรุปผลการตรวจสอบคุณภาพอุปกรณ์ Rectifier</h2>		
          <div class="well">
			<table class="table">
                <thead>
                  <tr>
                    <th>LocationID</th>
                    <th>ชื่อชุมสาย</th>
                    <th>จำนวน (Set)</th>
                    <th>ผลการตรวจสอบ</th>
                    <th>หมายเหตุ</th>
                  </tr>
                </thead>
                <tbody>
                	  @foreach ($rec as $r)
                      <tr>
                      	<td>{{$r->locid}}</td>
                      	<td>{{$r->name}}</td>
                      	<td>{{$r->loccount}}</td>
                      	<td>{{$r->result}}</td>
                      	<td>{{$r->note5}}</td>
                      </tr>  
                      @endforeach
                </tbody>               
  			</table>
		  </div>		  
          </div>  
	
	<div class="container">
		<button type="button" onclick="exportTableToCSV('รายงาน rectifier.csv')" class="btn btn-success">ออกรายงาน</button>
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
