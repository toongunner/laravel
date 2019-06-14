@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">                  
                    	<ul class="list-group">                           
                            <li class="list-group-item" id="reportall"><a href="report/">รายงานตรวจนับอุปกรณ์ทั้งหมด</a></li>
                            <li class="list-group-item" id="reportbatt" ><a href="report/battery">รายงานแบตเตอรี่</a></li>
                            <li class="list-group-item" id="reportair" ><a href="report/air">รายงานเครื่องปรับอากาศ</a></li>
                            <li class="list-group-item" id="reportgen" ><a href="report/gen">รายงานเครื่องปั่นไฟฟ้า</a></li>
                            <li class="list-group-item" id="reportinver" ><a href="report/inverter">รายงาน Inverter</a></li>
                            <li class="list-group-item" id="reportmdb" ><a href="report/mdb">รายงาน MDB</a></li>
                            <li class="list-group-item" id="reportmeter" ><a href="report/meter">รายงานมิเตอร์</a></li>
                            <li class="list-group-item" id="reportrectify" ><a href="report/rectifier">รายงาน Rectifier</a></li>
                            <li class="list-group-item" id="reporttrans" ><a href="report/transformer">รายงาน Transformer</a></li>
                            <li class="list-group-item" id="reportups" ><a href="report/ups">รายงาน UPS</a></li>
                      	</ul>                       	                 	
                </div>
            </div>
        </div>
    </div>
</div>

ssss
@endsection
