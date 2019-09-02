@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Add new gateway: </div>

					 <div class="container">
					 			<br>
            			   <a class="btn btn-primary" href="{{url()->previous()}}"> Go back </a>
        			 </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($errors->any())
    					  <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <form method="post" action="/gateway/inserted">
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="app_id">App ID:</label>
                          <input type="text" class="form-control" id="app_id" placeholder="Enter App ID" name="app_id">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="mqtt_server">MQTTAddress:</label>
                          <input type="text" class="form-control" id="mqtt_server" placeholder="Enter Address" name="mqtt_server">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="mqtt_port">MQTT port:</label>
                          <input type="text" class="form-control" id="mqtt_port" placeholder="Enter Port" name="mqtt_port">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="mqtt_username">MQTT username:</label>
                          <input type="username" class="form-control" id="mqtt_username" placeholder="Enter Username" name="mqtt_username">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="mqtt_password">MQTT password:</label>
                          <input type="password" class="form-control" id="mqtt_password" placeholder="Enter Password" name="mqtt_password">
                    </div>
                    
   					  <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
