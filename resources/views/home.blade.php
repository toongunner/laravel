@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    	<ul class="list-group">
                            <li class="list-group-item" id="first"><a href="/search">ตรวจสอบคุณภาพอุปกรณ์บริษัททรู</a></li>
                            <li class="list-group-item" id="second"></li>
                            <li class="list-group-item" id="third"></li>
                      	</ul>                   	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

