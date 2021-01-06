@extends('layouts.admin')

@section('content')  
        
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <!-- <span class="text-uppercase page-subtitle">Overview</span> -->
                <h3 class="page-title">Admin Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="{{Auth::user()->image}}" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0">{{Auth::user()->name}}</h4>
                   
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <?php  $u = Auth::user();?>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="edit-profile" method="post">
                          @csrf
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName"> Name</label>
                                <input name="name" type="text" class="form-control" id="feFirstName" placeholder="First Name" value="{{$u->name}}"> </div>
                              
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input name="email" type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="{{$u->email}}"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Mobile no</label>
                                <input name="mobile" type="text" class="form-control" id="femobile" value="{{$u->mobile}}"> </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">username</label>
                                <input name="username" type="username" class="form-control" id="feusername" placeholder="Email" value="{{$u->username}}"> </div>
                              
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">City</label>
                                <input name="city" type="text" class="form-control" id="fetext" placeholder="City" value="{{$u->city}}"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Gender</label>
                                <input name="sex" type="text" class="form-control" id="feGender" placeholder="Gender" value="{{$u->sex}}"> </div>
                            </div>

                            <div>
                                <input style="margin: 0 auto; margin-left: 110px;" type="submit" value="UPDATE">
                            </div>
                           
                            </div>
                           
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
         
        
        @endsection