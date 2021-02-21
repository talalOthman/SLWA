@extends('layouts.app')
    


@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row flex-lg-nowrap">
  

  <div class="col">
    @if(session('successMsg'))
    <div class="alert alert-icon alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="mdi mdi-check-all"></i>
        <strong>Well done! </strong>{{session('successMsg')}}
    </div>

    @elseif(session('errorMsg'))
        <div class="alert alert-icon alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-check-all"></i>
            <strong>Oh snap! </strong>{{session('errorMsg')}} 
        </div>
        @endif

    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                        @if (Auth::user()->provider_id == null || Auth::user()->changePicture == "true")
                        <img src="images/avatars/{{Auth::user()->avatar}}" alt="{{ Auth::user()->name}}" onerror="this.src='/images/avatars/default.png';" class="d-flex justify-content-center align-items-center rounded" style="height: 140px; width: 140px">
                        
                        @else
                        <img src={{Auth::user()->avatar}} alt="{{ Auth::user()->name}}" class="d-flex justify-content-center align-items-center rounded" style="height: 140px; width: 140px">
                        
                        @endif
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name}}</h4>

                    @if(Auth::user()->username == null)
                    <p class="mb-0 username">{{ Auth::user()->email}}</p>

                    @else
                    <p class="mb-0 username"><i>@</i>{{ Auth::user()->username}}</p>

                    @endif


                    <div class="text-muted"><small> Active</small></div>
                    <div class="mt-2">

                        <form class="form" enctype="multipart/form-data" action="/profile" method="POST">
                            @csrf
                      
                      <input type="file" name="avatar" id="file" class="btn btn-primary inputfile" accept="image/*" data-multiple-caption="{count} files selected" multiple />
                      <label for="file" class="btn btn-primary"><i class="fa fa-fw fa-camera"></i> Change Image</label>
                      
                    
                    </div>
                  </div>
                  
                </div>
              </div>
              <ul class="nav nav-tabs">
                
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  
                    
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" type="text" name="username" placeholder="Enter new username" value="{{Auth::user()->username}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" name="email" type="text" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <a class="btn btn-block btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">

                <i class="fa fa-sign-out"></i>
                Logout 
                       
              </a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Change Password</h6>

            @if (Auth::user()->provider_id != null){
            <p class="card-text">Not allowed to update password</p>
            <a class="btn btn-secondary">
              <i class="fa fa-wrench"></i>
              Update Password 
            </a>
            }

            @else{
              <p class="card-text">Easy way to update your password</p>
            <a class="btn btn-primary" href={{url('UpdatePassword')}}>
              <i class="fa fa-wrench"></i>
              Update Password 
                     
            </a>
            }

            @endif
          
               
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>

<script src="/SLWA-Talal/public/js/script.js"></script>
@endsection