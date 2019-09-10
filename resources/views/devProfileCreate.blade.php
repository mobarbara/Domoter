@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Add new Device-Profile: </div>

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
                    
					 <form action="{{route('devProfileInsert')}}" method="POST">
   					 @csrf
    					<div class="form-group">
        						<label for="name">Name</label>
        						<input type="text" name="name" class="form-control">
   					</div>
   					<div class="form-group">
        						<label for="topic">Topic</label>
        						<input type="text" name="topic" class="form-control">
   					</div>
    					<div class="form-group">
        						<label for="functions">Functions</label>
        						<div class="row">
            				<div class="col-md-2">
                					Key:
            				</div>
            				<div class="col-md-4">
                					Type:
            				</div>
        						</div>
        						@for ($i=0; $i <= 6; $i++)
        						<div class="row">
            				<div class="col-md-2">
                					<input type="text" name="functions[{{ $i }}][key]" class="form-control" value="{{ old('functions['.$i.'][key]') }}">
            				</div>
            				<div class="col-md-4">
                					<input type="text" name="functions[{{ $i }}][type]" class="form-control" value="{{ old('functions['.$i.'][type]') }}">
            				</div>
        						</div>
        						@endfor
    					</div>
    					<div>
        						<button class=" btn btn-primary" type="submit"> Submit </button>
    					</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection