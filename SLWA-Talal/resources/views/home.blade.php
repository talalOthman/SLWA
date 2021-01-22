@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-8">

            @if(session('successMsg'))
        <div class="alert alert-icon alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-check-all"></i>
            <strong>Well done! </strong>{{session('successMsg')}}
        </div>
            @endif
            
            <div class="card">
                <div class="card-header"> <p>Dashboard</p></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
