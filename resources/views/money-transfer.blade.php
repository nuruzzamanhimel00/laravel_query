@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <h1> Money Transfer </h1>
        </div>
        <div class="col-md-8">
            <form method="POST" action="{{route('money-transfer.submit')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Money</label>
                  <input type="number" name="amount" class="form-control"  required>

                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            
              </form>
        </div>
    </div>
</div>

@endsection
