@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit your gateway: </div>

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
                    
                    @foreach($gateway as $g)
                    <form method="post" action="{{route('gatewayUpdate', $g->id)}}">
                    <div class="form-group">
                          <label for="app_id">App ID:</label> 
                          <input type="text" class="form-control" id="app_id" placeholder="Enter App ID" value="{{$g->app_id}}" name="app_id">
                    </div>
                    <div class="form-group">
                          <label for="mqtt_server">MQTTAddress:</label>
                          <input type="text" class="form-control" id="mqtt_server" placeholder="Enter MQTTAddress" value="{{$g->mqtt_server}}" name="mqtt_server">
                    </div>
                    <div class="form-group">
                          <label for="mqtt_port">MQTTPort:</label>
                          <input type="text" class="form-control" id="mqtt_port" placeholder="Enter MQTTPort" value="{{$g->mqtt_port}}" name="mqtt_port">
                    </div>
                    <div class="form-group">
                          <label for="mqtt_username">MQTTusername:</label>
                          <input type="username" class="form-control" id="mqtt_username" placeholder="Enter MQTTUsername" value="{{$g->mqtt_username}}" name="mqtt_username">
                    </div>
                    <div class="form-group">
                          <label for="mqtt_password">MQTTpassword:</label>
                          <input type="password" class="form-control" id="mqtt_password" placeholder="Enter Password" value="{{$g->mqtt_password}}" name="mqtt_password">
                    </div>

   					  <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
                    </form>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection