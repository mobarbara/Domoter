<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Domoter') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!-- Bootstrap core CSS -->
  		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  		
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
  		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  		<!-- Custom styles for this template -->
  		<link href="css/simple-sidebar.css" rel="stylesheet">
		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> 

	 <style>
		.tabset > input[type="radio"] {
 		 	position: absolute;
 			 left: -200vw;
		}

		.tabset .tab-panel {
 			 display: none;
		}

		.tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
		.tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
		.tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
		.tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
		.tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
		.tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
			  display: block;
		}


		.tabset > label {
  			position: relative;
  			display: inline-block;
  			padding: 15px 15px 25px;
  			border: 1px solid transparent;
  			border-bottom: 0;
  			cursor: pointer;
  			font-weight: 600;
		}

		.tabset > label::after {
  			content: "";
  			position: absolute;
  			left: 15px;
  			bottom: 10px;
  			width: 22px;
  			height: 4px;
  			background: #8d8d8d;
		}

		.tabset > label:hover,
		.tabset > input:focus + label {
 			 color: #06c;
		}

		.tabset > label:hover::after,
		.tabset > input:focus + label::after,
		.tabset > input:checked + label::after {
 			 background: #06c;
		}

		.tabset > input:checked + label {
 			 border-color: #ccc;
 			 border-bottom: 1px solid #fff;
 			 margin-bottom: -1px;
		}

		.tab-panel {
 			 padding: 30px 0;
 			 border-top: 1px solid #ccc;
		}

		.tabset {
 			 max-width: 65em;
		}
 	</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Domoter') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                     	@if(Auth::user() -> type == 'admin')
                        <li class="nav-item">
                           <a class="nav-link" href="/register">{{ __('Register New User') }}</a>
                        </li>
                     	@endif        
                        
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                  </form>
                              </div>
                          </li>
                    </ul>
                </div>
            </div>
        </nav>
     <div class="d-flex" id="wrapper">
     <!-- Sidebar -->
    	<div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        @if(Auth::user() -> type == 'admin')
        <a href="/users" class="list-group-item list-group-item-action bg-light">Users</a>
        @endif 
        <a href="/home" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="/applications" class="list-group-item list-group-item-action bg-light">Applications</a>
        <a href="/deviceProfiles" class="list-group-item list-group-item-action bg-light">Device profiles</a>
		  <a href="/gateways" class="list-group-item list-group-item-action bg-light">Gateways</a>        
        <a href="/api" class="list-group-item list-group-item-action bg-light">Cloud</a>
      </div>
    	</div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
      
      	@foreach($app as $a)
        <h1 class="mt-4">Applications/{{$a->name}}</h1>
         @endforeach
   
      </div> 
      
		<div class="form-group row mb-0">
    		<form method="post" action="{{url()->previous()}}">
              <div class="col-md-1 offset-md-1">
              <button type="submit" class="btn btn-primary">
                 {{ __(' Go Back') }}
              </button>
              </div>
         </form>
         
         @foreach($app as $a)
         <form method="post" action="/applications/{{$a->name}}/addDevice">
              <div class="col-md-1 offset-md-1">
              <button type="submit" class="btn btn-primary">
                 {{ __(' + Create Device') }}
              </button>
              </div>
         </form>
         @endforeach
        
      </div> 
  <div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="app_info" checked>
  <label for="tab1">Application Info</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="dev_prof_info">
  <label for="tab2">Device Profile Info</label>
  <!-- Tab 3 -->
  <input type="radio" name="tabset" id="tab3" aria-controls="gat_info">
  <label for="tab3">Gateway Info</label>
  
  <div class="tab-panels">
  
    <section id="app_info" class="tab-panel">
    <div class="table-responsive">
			<table class="table"> 
      		<tr>
      			<th> Name </th> 
      			<th> Description </th>
      			<th> Devices </th>
      		</tr>
      		@foreach ($app as $a)
      		<tr>
      			<td>{{$a->name}}</td>
      			<td>{{$a->description}}</td>
      			<td><a href="{{route('devIndex', $a->name)}}">View all devices connected to this application</a></td>
      		</tr>
      		@endforeach      
      	</table>
    </div>     
    </section>
    
    <section id="dev_prof_info" class="tab-panel">
    <div class="table-responsive">
			<table class="table"> 
      		<tr>
      			<th> Name </th> 
      			<th> Topic </th>
      			<th> Functions </th>
      		</tr>
      		@foreach($app as $a)
      		@foreach($device_profiles as $dp)
      		@if($dp->name == $a->device_profile_name)
      		<tr>
      			<td>{{$dp->name}}</td>
      			<td>{{$dp->topic}}</td>
      			<td>
      			@foreach($dp->functions as $function)
      			{{$function['key']}} : {{$function['type']}}<br>
      			@endforeach
      			</td>
      		</tr>
      		@endif
      		@endforeach
      		@endforeach  
      	</table>
    </div>
    </section>
    
    <section id="gat_info" class="tab-panel">
    <div class="table-responsive">
			<table class="table"> 
      		<tr>
      			<th> Name </th> 
      			<th> MQTT Server Address </th>
      			<th> MQTT Port </th>
      		</tr>
      		@foreach($app as $a)
      		@foreach($gateways as $gateway)
      		@if($gateway->name == $a->gateway_name)
      		<tr>
      			<td>{{$gateway->name}}</td>
      			<td>{{$gateway->mqtt_server}}</td>
      			<td>{{$gateway->mqtt_port}}</td>
      		</tr>
      		@endif
      		@endforeach
      		@endforeach  
      	</table>			
    </div>
    </section>
    
  </div>
  
</div>
    </div>
    <!-- /#page-content-wrapper -->    
    </div>
    <!-- /#wrapper -->		  
    </div>
</body>
</html>