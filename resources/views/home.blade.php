@extends('layouts.app')
@section('content')
<div class="h5 text-center">
    Welcome to {{ env('APP_NAME') }}!
</div>
<div class="row">

    <div class="card w-50 mb-2 col-5">
        <div class="card-body">
          <h5 class="card-title">Login</h5>
          <p class="card-text">Login if you have an account</p>
          <a href="{{ route('login') }}" class="btn btn-info">Login</a>
        </div>
      </div>
      
      <div class="card w-50 mb-2 col-5">
        <div class="card-body">
          <h5 class="card-title">Register</h5>
          <p class="card-text">No account ? </p>
          <a href="{{ route('register') }}" class="btn btn-info">Register</a>
        </div>
      </div>
      
</div>

@endsection
