@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @foreach($fields as $field)
                            <div class="row">
                                <div class="col-md-12">
                                    <div  style="float:left" onclick="location.href='/showField/{{$field['fieldName']}}/{{$field['date']}}';" class="btn btn-info"> {{ $field['date'] }}</div>
                                    <form  method="POST" action="/api/deletefieldDate" >
                                        <input type="hidden" name="fieldName" value="{{$field['fieldName']}}">
                                        <input type="hidden" name="fieldId" value="{{$field['id']}}">
                                      
                                        <input style="float:right" class="btn btn-danger" type="submit" value="Delete">
                                        <input style="float:right" onclick="location.href='/addProcess/{{$field['fieldName']}}/{{$field['date']}}'"  class="btn btn-info" type="button" value="Add Process">
                                    </form>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        <br><br>
                        <hr>
                            <div style="float:left" onclick="goBack()" class="btn-info btn">Back</div>
                            <div style="float:right" onclick="location.href='/createFieldDate/{{$fields[0]['fieldName']}}';" class="btn-info btn">New Field Date</div>

                    <div  style="float:right;" aria-label="Left Align">
                         <span style="position:relative;top: 5px;right:5px;" onmouseover="showInfo()" onmouseout="hideInfo()" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </div>
                    <div style="display:none;float:right;margin-right:10px;" id='information-box'>
                        Seperate the image dates for easier crops monitoring.                         
                    </div> 
                   <script>
                        function showInfo() {
                            var infobox = document.getElementById("information-box");
                            infobox.style.display = "block";
                        }

                        function hideInfo() {
                            var infobox = document.getElementById("information-box");
                            infobox.style.display = "none";
                        }
                    </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
