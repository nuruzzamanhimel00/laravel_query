@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <h1> User Register </h1>
        </div>
        <div class="col-md-8">
            <form method="POST" action="{{route('form-submit.store')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                </div>
                <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('send-otp')}}" class="btn btn-success"> Send OTP</a>
              </form>
        </div>
    </div>
</div>

@endsection
