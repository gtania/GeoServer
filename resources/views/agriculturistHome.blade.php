@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <br>
                    <div class="col-md-12">
                    <input type="text" id="farmerName" onkeyup="keyUp()" class="form-control">
                     </div>
                    <br>
                    <script>
                        var users = {!! json_encode($users) !!};

                        function keyUp() {
                            var name = $('#farmerName').val()
                            $('#usersContainer').empty();
                            for (i = 0; i < users.length; i++) {
                                if(users[i].name.indexOf(name) != -1)
                                $('#usersContainer').append(' <div class="row">'+
                                        '<div class="col-md-12">'+
                                        '<div style="float:left" onclick="location.href=\'/agriculturistFields/'+users[i].id+'\';" class="btn btn-info">'+
                                        users[i].name +
                                        '</div>'+
                                        '<form  method="POST" action="http://localhost:8000/api/users/removeFarmer" >'+
                                        '<input type="hidden" name="userId" value="'+users[i].id+'">'+
                                        '<input style="float:right" class="btn btn-danger" type="submit" value="Delete">'+
                                        '</form>'+
                                        '</div>'+
                                        '</div><br>');
                            }

                        }

                    </script>

                    <div class="panel-body">
                        <div id="usersContainer">
                        @foreach($users as $user)
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float:left" onclick="location.href='/agriculturistFields/{{$user->id}}';" class="btn btn-info">
                                        {{ $user->name }}
                                    </div>
                                    <form  method="POST" action="http://localhost:8000/api/users/removeFarmer" >
                                        <input type="hidden" name="userId" value="{{$user->id}}">
                                        <input style="float:right" class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        </div>

                        <br><br><br><br>
                        <hr>
                        <div onclick="location.href='/addFarmer';" class="btn-info btn">Add New Farmer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
