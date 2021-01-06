@extends('layouts.admin')

@section('content')

            <!-- Small Stats Blocks -->
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small" style="background-color: #2E86C1; ">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase" style="color:white;">Total User</span>
                        <h6 class="stats-small__value count my-3" style="color:white;">{{count(\App\User::all())}}</h6>
                      </div>
                    
                    </div>
                   
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4" >
                <div class="stats-small stats-small--1 card card-small" style="background-color: #777760">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase" style="color:white;">Total Missing</span>
                        <h6 class="stats-small__value count my-3" style="color:white;">{{count(\App\Missing::all())}}</h6>
                      </div>
                  
                    </div>
                   
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small" style="background-color: #A93226">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase" style="color:white;">Total Wanted</span>
                        <h6 class="stats-small__value count my-3" style="color:white;">{{count(\App\Wanted::all())}}</h6>
                      </div>
                      
                    </div>
              
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small" style="background-color: #239B56">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"style="color:white;">Total Journalist</span>
                        <h6 class="stats-small__value count my-3" style="color:white;">{{count(\App\User::where('role',1)->get())}}</h6>
                      </div>
                    
                    </div>
               </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-12 mb-4">
                <div class="stats-small stats-small--1 card card-small" style="background-color: #D35400">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase" style="color:white;">Criminal record</span>
                        <h6 class="stats-small__value count my-3" style="color:white;">{{count(App\Criminal::all())}}</h6>
                      </div>
                    
                    </div>
                
                  </div>
                </div>
              </div>
            </div>
            <!-- End Small Stats Blocks -->

            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <!-- <span class="text-uppercase page-subtitle">Components</span> -->
                <h3 class="page-title">Posts</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
            @foreach(\App\Post::all() as $post)
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post card-post--1">
                  <div class="card-post__image" style="background-image: url('/{{$post->image}}');">
                    <div class="card-post__author d-flex">
                      <a href="/users/{{$post->user->id}}" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('/{{$post->user->image}}');">Written by Anna Kunis</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a class="text-fiord-blue" href="/posts/{{$post->id}}">{{$post->title}}</a>
                    </h5>
                    <p class="card-text d-inline-block mb-3">{{strip_tags(substr($post->body,0,200))}}</p>
                    <span class="text-muted">{{$post->created_at}}</span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            
@endsection