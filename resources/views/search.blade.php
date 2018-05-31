@extends('layouts.app')


@section('content')
	
		<div class="container">
		<div class="well">
    		<form class="form-inline" action="{{action('SearchController@index')}}" method="get">
          	<input type="text" class="form-control" id="search" name="chumsai" placeholder="ค้นหาด้วยชื่อชุมสาย">
          	<button type="submit" class="btn btn-primary">ค้นหา</button>
        	</form><br/>
        	<form class="form-inline" action="{{action('SearchController@index')}}" method="get">
          	<input type="text" class="form-control" id="searchloc" name="locate" placeholder="ค้นหาด้วย location id">
          	<button type="submit" class="btn btn-primary">ค้นหา</button>
        	</form>
         </div>
         </div> 
        
          <div class="container">
          <div class="well">		
			<table class="table">
                <thead>
                  <tr>
                    <th>Location ID</th>
                    <th>ชื่อชุมสาย</th>
                    <th>ประเภทชุมสาย</th>
                    <th>ที่อยู่</th>
                    <th>ละติจูด</th>
                    <th>ลองติจูด</th>
                    <th>เพิ่ม</th>
                    <th>ดู/แก้ไข</th>
                    <th>PDF</th>
                  </tr>
                </thead>
                <tbody>
			@foreach($location as $data)
                  <tr>
                    <td>{{$data->locid}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->loctype}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->lat}}</td>
                    <td>{{$data->longt}}</td>
                    <td><a href="{{ 'adddata/'.$data->locid.'/edit' }}"><button type="submit" class="btn btn-warning">ADD</button></a></td>
                    <td><button type="submit" class="btn btn-warning" href="">View</button></td>
					<td><a href="{{ 'pdf/'.$data->pdf }}" target="_blank">{{$data->pdf}}</a></td>
                  </tr>
  			@endforeach        
                </tbody>               
  			</table>
  			{{ $location->links() }}
		  </div>		  
          </div>  
          
          
          
          
@endsection


	
