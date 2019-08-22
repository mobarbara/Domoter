@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gateway Dashboard:</div>

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
                                <th> Name </th>
                                <th> Topic </th> 
                                <th> Delete </th>
                                <th> Edit </th>
                                <th> Web Socket </th>
                            </tr>
                                @foreach ($gateways as $gateway)
                                    <tr>
                                        <td>{{$gateway->id}}</td>
                                        <td>{{$gateway->name}}</td>
                                        <td>{{$gateway->topic}}</td>
                                        <td><a href="/home/delete/{{$gateway->id}}"><button> Delete </button></a></td>
                                        <td><a href="/home/edit/{{$gateway->id}}"><button> Edit </button></a></td>
                                        <td><a href="/home/websocket/{{$gateway->id}}"><button> Web Socket UI </button></a></td>
                                    </tr>
                                @endforeach                  
                        </table>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="window.location='{{url('/home/create')}}'">
                                    {{ __('Register a new gateway') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
