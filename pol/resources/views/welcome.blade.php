@extends('layouts.nav')
@section('content')

            <!-- slider -->
            <section class="slider">
                <div class="container">
                    <div class="row">
                        <!-- Featured Post Area -->
                        <div class="col-12 well">
                            <div class="featured-post-area">
                                <div id="featured-post-slides" class="carousel slide d-flex flex-wrap" data-ride="carousel">

                                    <div class="carousel-inner">
                                        <!-- single post -->
                                        @for($i=0;$i < 1;$i++)
                                            <?php $post = $posts[$i]; ?>
                                            <div class="carousel-item active bg-img" style="background-image: url({{asset($post->image)}})">
                                            <!-- Featured Post Content -->
                                            <div class="featured-post-content">
                                                <p>{{$post->created_at}}</p>
                                                <a href="/posts/{{$post->id}}" class="post-title">
                                                    <h2>{{$post->title}}</h2>
                                                </a>
                                            </div>
                                        </div>
                                        @endfor
                                        @for($i=1;$i < count($posts);$i++)
                                        <?php $post = $posts[$i]; ?>

                                            <div class="carousel-item bg-img" style="background-image: url({{asset($post->image)}})">
                                            <!-- Featured Post Content -->
                                            <div class="featured-post-content">
                                                <p>{{$post->created_at}}</p>
                                                <a href="/posts/{{$post->id}}" class="post-title">
                                                    <h2>{{$post->title}}</h2>
                                                </a>
                                            </div>
                                        </div>
                                        @endfor
                                        
                                        
                                        
                                    </div>

                                    <ol class="carousel-indicators">
                                        <?php $p = 0; ?>
                                         @foreach($posts as $post)
                                        <li data-target="#featured-post-slides" data-slide-to="{{$p}}" class="active">
                                            <h2>{{++$p}}</h2>
                                            <a href="#" class="post-title">
                                                <h5>{{$post->title}}</h5>
                                            </a>
                                        </li>
                                        @endforeach
                                        
                                    </ol>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- slider -->
        </div>
           <!-- start post -->

            <div class="container" style="margin-top: 20px">
                <div class="row">
                    <div class="col-sm-12 well" style="background: white">

                        <h3> Posts: </h3>
                        <?php $p=1; ?>
                        @foreach(\App\Post::inRandomOrder()->get() as $post)
                        <div class="col-lg-6 col-md-6  mb-4">
                            <div class="card card-small card-post card-post--1">
                              <div class="card-post__image" style="background-image: url({{asset($post->image)}})">

                              </div>
                              <div class="card-body">
                                <h5 class="card-title">
                                  <a class="text-fiord-blue" href="/posts/{{$post->id}}">{{substr($post->title,0,40)}} </a>
                                </h5>
                               
                                <p class="card-text d-inline-block mb-3">{!! substr(strip_tags($post->body),0,600) !!}</p>
                                <span class="text-muted">{{$post->created_at}}</span>
                              </div>
                            </div>
                            <!-- <span class="text-muted">{{$post->created_at}}</span> -->
                        </div>
                        <?php if($p++==8) {break;} ?>
                        @endforeach
                        <style>
                            .card-post p{
                                height:136px;
                                overflow:hidden;
                            }
                        </style>

                 </div>

                 <!-- end post -->

    <div class="well col-sm-12" style="background: white">


        <div class="col-lg-6 col-md-6  mb-4" >
            <div class="card card-small card-post card-post--1">

                <div class="table-container">
                    <table class="table-users table" border="0">

                        <h3><a href="/wanteds" >Wanted Person</a></h3>
                        <tbody>
                            <?php $p = 1 ?>
                            @foreach(App\Wanted::where('status',1)->latest()->get() as $w)
                            <tr>
                                <td width="80" align="center">
                                    <img class="pull-left img-circle nav-user-photo" width="50" height="50"  src="/{{$w->image}}"/> 
                                </td>
                                <td>
                                 {{$w->fn}}&nbsp;{{$w->ln}}
                                </td>
                                 <td>
                                    Age: {{$w->age}}
                                </td>
                                <td align="center">
                                    City: {{$w->city}} 
                                </td>
                            </tr>
                            <?php if($p++==4) {break;} ?>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

        <div class="col-lg-6 col-md-6  mb-4">
            <div class="card card-small card-post card-post--1">

                <div class="table-container">
                    <table class="table-users table" border="0">

                        <h3><a href="/missings" >Missing Person</a></h3>
                        <tbody>
                        <?php $p = 1 ?>
                        @foreach(App\Missing::where('status',1)->latest()->get() as $w)
                            <tr>
                                <td width="80" align="center">
                                    <img class="pull-left img-circle nav-user-photo" width="50" height="50"  src="/{{$w->image}}"/> 
                                </td>
                                <td>
                                 {{$w->fn}}&nbsp;{{$w->ln}}
                                </td>
                                 <td>
                                    Age: {{$w->age}}
                                </td>
                                <td align="center">
                                    City: {{$w->city}} 
                                </td>
                            </tr>
                            <?php if($p++==4) {break;} ?>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

    
    </div>
    </div>
    <!-- <hr> -->
    </div>
   @endsection