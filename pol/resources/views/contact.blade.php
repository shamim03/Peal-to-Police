@extends('layouts.nav')
@section('content')

<div class="container" style="margin-top: 20px">
                <div class="row">
                    <div class="well col-sm-12" style="background: white">

                        <div class="table-container">
                            <table class="table-users table" border="0">

                                <h3 style="text-align: center;">Journalists List</h3>
                                <tbody>
                                @foreach(App\User::where('role',1)->get() as $u)
                                    <tr>
                                        <td width="80" align="center">
                                            <a href = "/users/{{$u->id}}"> <img class="pull-left img-circle nav-user-photo" width="50" src="{{$u->image}}"/> </a> 
                                        </td>
                                        <td>
                                            {{$u->name}}
                                        </td>
                                        <td>
                                            City : {{$u->city}}
                                        </td>
                                        
                                        <td >
                                            Email : {{$u->email}}
                                        </td>
                                        <td align="center">
                                            <a href="/inbox/{{$u->id}}">
                                                <button type="button" class="btn btn-default" > inbox </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                
                                </tbody>
                        </table>
                    </div>



                </div>
            </div>
            <!-- <hr> -->
        </div>


@endsection