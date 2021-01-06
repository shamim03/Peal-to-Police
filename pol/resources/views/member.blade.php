
@extends('layouts.nav')
@section('content')

        <!-- Page Wrapper Start -->
        <section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-12 pb--60" data-trigger="stickyScroll">

                        <div class="col-md-4">
                            <div>
                                    <img src="/{{$w->image}}" alt="Image">
                            </div>
                            <div>
                                <h2 class="h3 fw--600" style="color: white">{{$w->fn}}{{$w->ln}}</h2>
                            </div>
                        </div>


                        <div class="main--content-inner drop--shadow col-md-8">

                            <!-- Content Nav Start -->
                            <div class="content--nav pb--30">
                                <ul class="nav ff--primary fs--14 fw--500 bg-lighter">
                                    
                                    <li class="active"><a href="">Profile</a></li>
                                    
                                </ul>
                            </div>
                            <!-- Content Nav End -->
                            <!-- Profile Details Start -->
                            <div class="profile--details fs--14">
                                <!-- Profile Item Start -->
                                <div class="profile--item">
                                    
                                    <div class="profile--info" style="color: white">
                                        <table class="table">
                                            <tr>
                                                <th>Full Name</th>
                                                <td>{{$w->fn}}{{$w->ln}}</td>
                                            </tr>
                                            <tr>
                                                <th>Sex</th>
                                                <td>{{$w->sex}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Age</th>
                                                <td> {{$w->age}} </td>
                                            </tr>
                                            <tr>
                                                <th>Height</th>
                                                <td>{{$w->height}}</td>
                                            </tr>
                                            <tr>
                                                <th>Skin Color</th>
                                                <td>{{$w->skin}}</td>
                                            </tr>
                                            <tr>
                                                <th>Eye Color</th>
                                                <td> {{$w->eye}} </td>
                                            </tr>
                                            <tr>
                                                <th>City </th>
                                                <td> {{$w->city}} </td>
                                            </tr>
                                            <tr>
                                                <th>Date of birth</th>
                                                <td> {{$w->dob}} </td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                </div>
                                <!-- Profile Item End -->
                                <!-- Profile Item Start -->
                                    
                                    @if($w->dsc)
                                    <div class="profile--info" style="color: white">
                                       
                                        <h3 style="color: white">Description & Reward</h3>
                                    
                                        <p>{{$w->dsc}}</p>
                                    </div>
                                    @endif
                               
                                <!-- Profile Item End -->
                                
                                <!-- Profile Item Start -->
                                <div>
                                    <div class="profile--info" style="color: white">
                                        <h3 style="color: white">Contact</h3>
                                        <table class="table">
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{$w->phone}}</a></td>
                                            </tr>
                                            <tr>
                                                <th>E-mail</th>
                                                <td>{{$w->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{$w->address}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- Profile Item End -->
                            </div>
                            <!-- Profile Details End -->
                        </div>
                    </div>
                    <!-- Main Content End -->
                    
                </div>
            </div>
        </section>
        <!-- Page Wrapper End -->
        @endsection