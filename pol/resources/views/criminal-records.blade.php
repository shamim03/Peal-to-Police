@extends('layouts.nav')

@section('content')


<!-- Page Wrapper Start -->
<section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row">


                    <!-- Search Bar Start -->


                    <div class="criminal_search main--content col-md-12 pb--60">
        
                        <form>
                          <div class="inner-form">

                                <div class="input-field ">
                                  <input id="search" name="qn" type="text" placeholder="Full Name" />
                                </div>

                                <div class="input-field second-wrap">
                                  <input class="datepicker" name="qs" id="depart" type="text" placeholder="SEX" />
                                </div>

                                <div class="input-field second-wrap">
                                  <input class="datepicker" id="depart" type="number" name="qa" placeholder="Age" />
                                </div>

                                <div class="input-field second-wrap">
                                  <input class="datepicker" id="depart" name="qd" type="text" placeholder="DD/MM/YEAR" />
                                </div>

                                <div class="input-field second-wrap">
                                  <input class="datepicker" id="depart" name="qc" type="text" placeholder="CITY" />
                                </div>
                               
                                <div class="input-field fifth-wrap">
                                  <button class="btn-search" type="submit">SEARCH</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Search Bar End -->

                    <!-- Main Content Start -->
                    <div class="main--content col-md-12 pb--60" data-trigger="stickyScroll">
                        <div class="main--content-inner drop--shadow well" style="background-color: #1B2631; border: 2px solid #AF7D51">

                            <h3 style="color: #AF7D51; text-align: center; margin-bottom: 20px"> Searched Result :</h3>
                            
                            <!-- Member Items Start -->
                            <div class="member--items">
                                <div class="row gutter--15 AdjustRow">
                                    @if($r->qc || $r->qs || $r->qn || $r->qa || $r->qd)
                                    @foreach($ms as $m)
                                    <div class="col-md-4 col-xs-6 col-xxs-12">
                                        <!-- Member Item Start -->
                                        <div class="member--item online">
                                            <div class="img img-circle">
                                                <a href="criminals/{{$m->id}}" class="btn-link">
                                                     <img src="{{$m->image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="name">
                                                <h3 class="h6 fs--12">
                                                    <a href="criminals/{{$m->id}}" class="btn-link">{{$m->fn}}&nbsp;{{$m->ln}}</a>
                                                </h3>
                                            </div>
                                            <div class="activity">
                                                <p><i class="fa mr--8 fa-clock-o"></i>Age : {{$m->age}}</p>
                                            </div>
                                            
                                        </div>
                                        <!-- Member Item End -->
                                    </div>
                                    @endforeach
                                    @endif
                                    
                                </div>
                            </div>
                            <!-- Member Items End -->
                        </div>
                    </div>
                    <!-- Main Content End -->
                </div>
            </div>
        </section>

<style>
    footer{
        display:none;
    }
</style>


@endsection