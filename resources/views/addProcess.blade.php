@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">Add Processed Image</div>

          <div class="panel-body">
            <div class="form-group">

            <form method="POST" action="/api/addProcess" enctype="multipart/form-data">
              <label for="fieldName">Process Name</label>
              <input class="form-control" type="text" name="processName">
              <input class="form-control" type="hidden" name="fieldName" value="{{$field['fieldName']}}"><br>
              <input class="form-control" type="hidden" name="fieldDate" value="{{$field['date']}}"><br>


              <label for="date">Field Photo</label>
              <input class="form-control" type="file" name="field_image" accept="image/*">
                <br>
                <input style="float:right" class="btn btn-info" type="submit" value="Submit">
              </form>
              <div style="float:left" onclick="goBack()" class="btn-info btn">Back</div>

              {{--Iterate Errors--}}
              <br>
	      <br>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              @if (isset($imageError))
                <div class="alert alert-danger">
                  <ul>
                      <li>{{ $imageError }}</li>
                  </ul>
                </div>
              @endif
            </div>


          </div>

        </div>
      </div>
    </div>
  </div>
@endsection