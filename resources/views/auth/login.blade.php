@extends('layouts.master-without-nav')

@section('content')
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
            <div class="card-body">

<h3 class="text-center m-0">
    <a href="/index" class="logo logo-admin"><img src="{{URL::asset('assets/images/icon-login.png')}}" style="margin-top:40px;" height="50" alt="logo"></a>
    </h3>

<div class="p-3">
    <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang !</h4>
    <p class="text-muted text-center">Silahkan masuk untuk melanjutkan.</p>

    <form class="form-horizontal m-t-30" action="{{ route('loginpost') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name='email' id="email" placeholder="Masukan Email">
       
        </div>

        <div class="form-group">
            <label for="userpassword">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name='password' id="password" placeholder="Enter password">  
        </div>
        
        <div class="form-group row m-t-20">
            <div class="col-sm-6">
               
            </div>
            <div class="col-sm-6 text-right">
                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
            </div>
        </div>

    </form>

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
    </div>
    @endif

</div>

</div>
            </div>

        </div>
        
@endsection