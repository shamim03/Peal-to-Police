
@extends('layouts.nav')
@section('content')
        
        <!-- Page Wrapper Start -->
        <section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-8 pb--60" data-trigger="stickyScroll">
                        <div class="main--content-inner drop--shadow">
                            <!-- Content Nav Start -->
                            <div class="content--nav pb--30">
                                <ul class="nav ff--primary fs--14 fw--500 bg-lighter">
                                    

                                    <li class="active"><a href="/wanteds">All Wanted People</a></li>

                                </ul>
                            </div>
                            <!-- Content Nav End -->
                            <!-- Member Items Start -->
                            <div class="member--items ">
                                <div class="row gutter--15 AdjustRow">
                                
                                    
                                @foreach($ms as $m)
                                    <div class="col-md-4 col-xs-6 col-xxs-12">
                                        <!-- Member Item Start -->
                                        
                                        <div class="member--item online">
                                            <div class="img img-circle">
                                                <a href="/wanteds/{{$m->id}}" class="btn-link">
                                                    <img src="{{$m->image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="name">
                                                <h3 class="h6 fs--12">
                                                    <a href="/wanteds/{{$m->id}}" class="btn-link">{{$m->fn}}&nbsp;{{$m->ln}}</a>
                                                </h3>
                                            </div>
                                            <div class="activity">
                                                <p><i class="fa mr--8 fa-clock-o"></i>Age : {{$m->age}}</p>
                                            </div>
                                            
                                        </div>
                                        <!-- Member Item End -->
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <!-- Member Items End -->
                            <!-- Page Count Start -->
                            {{$ms->links()}}
                            <!-- Page Count End -->
                        </div>
                    </div>
                    <!-- Main Content End -->
                    <!-- Main Sidebar Start -->
                    <div class="main--sidebar col-md-4 pb--60" data-trigger="stickyScroll">
                        <!-- Widget Start -->
                        <div class="widget well">
                            <h2 class="h4 fw--700 widget--title">Find A Buddy</h2>
                            <!-- Buddy Finder Widget Start -->
                            <div class="buddy-finder--widget">
                            <form>
                                    <div class="row">
                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Name :</span>
                                                    <input style="background-color: #F5F5F5" class="form-control" type="text" name="qn" placeholder="Name">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Gender :</span>
                                                    <select class="form-control" name="qs" class="form-control form-sm" >
                                                        <option value="">--</option>
                                                        <option value="female">Female</option>
                                                        <option value="male">Male</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Age :</span>
                                                    <input type="text" class="form-control" name="qa" placeholder="Age">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">City</span>
                                                    <input style="background-color: #F5F5F5" class="form-control" name="qc" type="text" placeholder="City">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Date of Birth</span>
                                                    <input class="form-control" style="background-color: #F5F5F5" name="qd" type="text" placeholder="DD/MM/YEAR">
                                                    
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Buddy Finder Widget End -->
                        </div>
                        <!-- Widget End -->
                        
                    </div>
                    <!-- Main Sidebar End -->
                </div>
            </div>
        </section>
        <!-- Page Wrapper End -->
        @endsection