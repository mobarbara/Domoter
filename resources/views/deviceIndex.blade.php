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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.2/mqttws31.min.js" type="text/javascript"></script>
	 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type ="text/javascript"></script>	 
	 
	 <script type="text/javascript" language="javascript">
	 
	 var mqtt;
	 var reconnectTimeout=2000;
	 var host;
	 var port=9001;
	 var username;
	 var password;
	 var topic;
	 var msg;
	 
	 function onConnectionLost(){
		console.log("connection lost");
		document.getElementById("status_messages").innerHTML ="Connection Lost";
		connected_flag=0;
	 }
	 
	 function onFailure(message) {
		console.log("Failed");
		document.getElementById("status_messages").innerHTML = "Connection Failed-Retrying";
      setTimeout(MQTTconnect, reconnectTimeout);
    }
    
	 function onMessageArrived(r_message){ 
	 
		out_msg = "Message received "+r_message.payloadString;
		out_msg = out_msg+" on topic "+r_message.destinationName +"<br/>";
		out_msg = "<b>"+out_msg+"</b>";
		console.log(out_msg+row);
		try{
			document.getElementById("out_messages").innerHTML+=out_msg;
		}
		catch(err){
			document.getElementById("out_messages").innerHTML=err.message;
		}
	
		if (row==10){
			row=1;
			document.getElementById("out_messages").innerHTML=out_msg;
		}
		else row+=1;
			
		mcount+=1;
		console.log(mcount+"  "+row);
	 }
		
	 function onConnected(recon,url){
		 console.log("in onConnected " +recon);
	 }
	
	
	 function onConnect() { //OK
	 	//If connection has been made then subscribes and send messages
		document.getElementById("status_messages").innerHTML ="Connected to "+host+" on port "+port;
		connected_flag=1;
		console.log("Connected: "+connected_flag);
	 }
	 
    function disconnect() //FUNZIONE IN DISCONNESSIONE
	 {
		if (connected_flag==1)
			mqtt.disconnect();
	 }

    function MQTTconnect(valueString) { //FUNZIONE CHE CONNETTE DOMOTER AL MOSQUITTO BROKER
    
    	var array = [];
    	array = valueString.split(',');
		host = array[0];
		username = array[2];
		password = array[3];    	
      
      console.log("Connecting to "+ host +" on "+ port);
		console.log("User: "+username);
		document.getElementById("status_messages").innerHTML="connecting";
		console.log(host);
		console.log(port);
		console.log(username);
		console.log(password);
		mqtt = new Paho.MQTT.Client(host,port,"clientDomoter");

		var options = {
         timeout: 3,
         cleanSession: true,
			onSuccess: onConnect,
			onFailure: onFailure,
			userName: username,
			password: password,
      };
      
	   mqtt.onConnectionLost = onConnectionLost;
      mqtt.onMessageArrived = onMessageArrived;
		mqtt.onConnected = onConnected;
		mqtt.connect(options);
		return false;
	 }
	
	 function sub_topics(stringValue){ //FUNZIONE CHE SOTTOSCRIVE L'APP AL TOPIC X
	 		var array = [];
	 		array = stringValue.split(",");
	 		var id = parseInt(array[1]);
	 		topic = array[0].concat(id);
			if (connected_flag==0){
				out_msg="<b>Not Connected so can't subscribe</b>"
				console.log(out_msg);
				document.getElementById("status_messages").innerHTML = out_msg;
				return false;
			}
		console.log("Subscribing to topic = "+ topic);
		document.getElementById("status_messages").innerHTML = "Subscribing to topic = "+ topic;
		var options={
			qos:0,
		};
		mqtt.subscribe(topic,options);
		return false;
	 }
	
	
	 function send_message(command){ //FUNZIONE CHE MANDA IL MESSAGGIO MQTT
		
		if(command == 'on'){
			stato = 'on';
			msg = command;
		}	 
		else if (command == 'off'){			
			stato = 'off';
			msg = command;
		}
		else if (command = 'stato'){
			msg = stato;
		}
	 
		if (connected_flag==0){
			out_msg="<b>Not Connected so can't send</b>"
			console.log(out_msg);
			document.getElementById("status_messages").innerHTML = out_msg;
			return false;
		}
		
		var qos = 0;
		console.log(msg);
		if(command == 'stato'){
			msg = msg.toUpperCase();
			document.getElementById("status_messages").innerHTML="Received STATUS: "+msg;
		}
		else{
			document.getElementById("status_messages").innerHTML="Sending message "+msg;
		}
		message = new Paho.MQTT.Message(msg);
		message.destinationName = topic;
		message.qos=qos;
		mqtt.send(message);
		return false;
	 }	
	 
	 </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                     	
                     	<li class="nav-item">
                           <a class="nav-link" href="/app/{{$gateway[0]->app_id}}/gateway">{{ __('List of Gateways') }}</a>
                        </li>

								<li class="nav-item">
                           <a class="nav-link" href="/app">{{ __('List of Apps') }}</a>
                        </li>                     
                     
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

        <main class="py-4">
            <div class="container">
    				<div class="row justify-content-center">
        				<div class="col-md-12">
            			<div class="card">
                			<div class="card-header">Devices control panel:</div>

               			<div class="card-body">	
                    			@if (session('status'))
                        		<div class="alert alert-success" role="alert">
                            		{{ session('status') }}
                        		</div>
                    			@endif
                    
                   				<div class="table-responsive">
                        		<table class="table"> 
                            		<tr>
                            			<th> ID </th>
                                		<th> Topic </th> 
                                		<th> Connect </th>
                                		<th> Subscribe </th>
                                		<th> Publish </th>
                            		</tr>
                                		@foreach ($devices as $device)
                                    		<tr>
                                    			<td>{{$device->id}}</td>
                                        		<td id="filter">{{$device->topic}}</td>
                                        		<td>
                                        		   Broker {{$gateway[0]->mqtt_server}}:{{$gateway[0]->mqtt_port}}
                                        		   <br>
                                        			<button id="connect" value="{{$gateway[0]->mqtt_server}},{{$gateway[0]->mqtt_port}},{{$gateway[0]->mqtt_username}},{{$gateway[0]->mqtt_password}}" onclick="MQTTconnect(this.value)"> CONNECT </button>
                                        			<br>
                                        			<button id="disconnect" onclick="disconnect()"> DISCONNECT </button>
                                        		</td>
                                        		<td>
                                        			<button id="sub" value="{{$device->topic}}, {{$device->id}}" onclick="sub_topics(this.value)"> Subscribe </button>
                                        		</td>
                                        		<td>
                                        			<button id="on" onclick="send_message('on')"> ON </button>
                                        			<button id="off" onclick="send_message('off')"> OFF </button>
                                        			<button id="status" onclick="send_message('stato')"> STATUS </button>
                                        		</td>
                                        	</tr>
          								@endforeach                 
                        		</table>
                    			</div>
                			</div>
            			</div>
        				</div>
    				</div>
    			   <div class="form-group row mb-0">
    			   <!--
    			   <form method="post" action="/add/device">
                   <div class="col-md-5 offset-md-0">
                        <button type="submit" class="btn btn-primary">
                            	{{ __('Register a new device') }}
                        </button>
                   </div>
               </form>
               -->
               </div>
				</div>
        </main>
    </div>
    <div class="container">
            	Status Messages:
					<div id="status_messages"></div>
					Received Messages:
					<div id="out_messages"></div>
      		</div>
        </main>
    </div>
    
    <script>
    
	   var connected_flag=0	
	   var mqtt;
    	var reconnectTimeout = 2000;
		var row=0;
		var out_msg="";
		var mcount=0; 
		   
    </script>
</body>
</html>