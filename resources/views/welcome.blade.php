@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">action</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Form submit</td>
                <td>
                    <a href="{{route('form-submit')}}"> View</a>
                </td>

              </tr>

            </tbody>
          </table>
    </div>
</div>

@endsection
