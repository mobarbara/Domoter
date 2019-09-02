@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit your gateway: </div>

					 <div class="container">
					 			<br>
            			   <a class="btn btn-primary" href="/app"> Go back </a>
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
                    @foreach($app as $a)
                    <form method="post" action="/app/updated/{{$a->id}}">
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="name">Name:</label> 
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$a->name}}" name="name">
                    </div>
                    <div class="form-group">
                          <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="description">Description:</label> 
                          <input type="text" class="form-control" id="description" placeholder="Enter Description" value="{{$a->description}}" name="description">
                    </div>
                    <div class="form-group">
                    		  <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                          <label for="filter">Filter:</label>
                          <input type="text" class="form-control" id="filter" placeholder="Enter Filter" value="{{$a->filter}}" name="filter">
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