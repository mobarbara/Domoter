@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Add new gateway: </div>

					 <div class="container">
					 			<br>
            			   <a class="btn btn-primary" href="{{ route('home')}}"> Go back to HOME </a>
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
                    <form method="post" action="{{route('insert')}}">
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div>
                    <div class="form-group">
                          <label for="topic">Topic:</label>
                          <input type="text" class="form-control" id="topic" placeholder="Enter Topic" name="topic">
                    </div>
                    
   					  <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
