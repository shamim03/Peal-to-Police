
<!DOCTYPE html>
<html>
<head>
    <title>Personal Profile Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="/lib/jquery-3.2.0.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/bootstrap-switch/css/bootstrap-switch.min.css">
    <script src="/lib/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="/js/lazy-load.min.js"></script>
    <script src="/js/socialyte.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="style_2.css" type="text/css">
</head>
<body id="personal">
    <!--Header with Nav -->
    <header class="text-right">
        <form class="text-left search" method="GET">
            <input name="q" type="text" placeholder="Search..">
        </form>
        <div class="second-icon menu-icon">
            <form action="/logout" method="post" >
            <span> <button type="submit" style="background:transparent;border:0;"><span class="hidden-xs hidden-sm">Logout</span> <i class="fa fa-sign-out" aria-hidden="true"></i></button>
            </span>
            @csrf
            </form>
        </div>
        <style>
            li{
                list-style:none;
            }
        </style>
       <!--  <div class="menu-icon">
            <div class="dropdown">
                <span class="dropdown-toggle" role="button" id="dropdownSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="hidden-xs hidden-sm">Settings</span> <i class="fa fa-cogs" aria-hidden="true"></i>
                </span>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownSettings">
                    
                    <li>
                        <a href="#" title="Settings">
                            <div class="col-xs-4">
                                <i class="fa fa-question" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 text-left">
                                <span>FAQ</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="login.html" title="Settings">
                            <div class="col-xs-4">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-8 text-left">
                                <span>Logout</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div> -->
        <!-- <div class="second-icon dropdown menu-icon">
            <span class="dropdown-toggle" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="hidden-xs hidden-sm">Notifications</span> <i class="fa fa-bell-o" aria-hidden="true"></i> <span class="badge">2</span>
            </span>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownNotification">
                <li class="new-not">
                    <a href="#" title="User name comment"><img src="/img/user2.jpg" alt="User name" class="img-circle img-user-mini"> Formalin Likes your post</a>
                </li>
                <li class="new-not">
                    <a href="#" title="User name comment"><img src="/img/user3.jpg" alt="User name" class="img-circle img-user-mini"> Lima comments your post</a>
                </li>
                <li>
                    <a href="#" title="User name comment"><img src="/img/user4.jpg" alt="User name" class="img-circle img-user-mini"> Shamim Likes your post</a>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#" title="All notifications">All Notifications</a></li>
            </ul>
        </div> -->
        
        <div class="second-icon menu-icon">
            <span><a href="/wall" title="Wall"><span class="hidden-xs hidden-sm">Wall</span> <i class="fa fa-database" aria-hidden="true"></i></a>
            </span>
        </div>
        
        <div class="second-icon menu-icon">
            <span><a href="/" title="Home"><span class="hidden-xs hidden-sm">Home</span> <i class="fa fa-home" aria-hidden="true"></i></a>
            </span>
        </div>
        @if(\Auth::user()->role==1)
        <div class="second-icon menu-icon">
            <span><a href="/messages" ><span>Messages</span> <i class="fa fa-database" aria-hidden="true"></i></a>
            </span>
        </div>
        @endif
    </header>
    <!--Left Sidebar with info Profile -->
    <div class="sidebar-nav">
        <a href="/profile" title="Profile">
            <img src="{{asset($user->image)}}" alt="User name" class="img-circle img-user">
        </a>
        <h2 class="text-center hidden-xs"><a href="/users/{{$user->id}}" title="Profile">{{$user->name}}</a></h2>
        <p class="text-center user-description hidden-xs">
            <i>{{$user->details}}</i>
        </p>

        <div class="well">
            <form action="/dpupload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" />
            <button style="border-radius: 4px ; width: 190px; margin-top: 5px"> <i class="fa fa-pencil" aria-hidden="true"></i> Update Photo </button>
            </form>
        </div>
        
    </div>
    <div class="content-posts profile-content">
        <div class="banner-profile">
        </div>
        <!-- Tab Panel -->
        
        <ul class="nav nav-tabs" role="tablist">
            @if($user->role==1)
            <li class="active"><a href="#posts" role="tab" id="postsTab" data-toggle="tab" aria-controls="posts" aria-expanded="true">Last posts</a></li>
            @endif
            <li <?php if($user->role!=1) echo 'class="active"' ?>><a href="#profile" role="tab" id="profileTab" data-toggle="tab" aria-controls="profile" aria-expanded="true">Profile</a></li>

        </ul>
        <!--Start Tab Content-->
        <div class="tab-content">
            <!-- Tab Posts -->
            
            <div class="tab-pane fade <?php if($user->role==1) echo 'active in' ?>" role="tabpanel" id="posts" aria-labelledby="postsTab">
                <div id="posts-container" class="container-fluid container-posts">
                @if($r->q)
                <h2 class="text-center">Search results - <span style="background-color:#7795AF;">{{$r->q}}</span> </h2>
                @endif
                 @if($user->role==1)

                    @foreach($posts as $post)
                    <br>
                    
                    <div class="card-post">
                        <div class="row">
                            <div class="col-xs-3 col-sm-2">
                                <a href="/users/{{$post->user->id}}" title="Profile">
                                    <img src="{{asset($post->user->image)}}" alt="My User" class="img-circle img-user">
                                </a>
                            </div>
                            <div class="col-xs-9 col-sm-10 info-user">
                                <h3><a href="/users/{{$post->user->id}}" title="Profile">{{$post->user->name}}</a></h3>
                                <p><i>{{$post->created_at}}</i></p>
                            </div>
                        </div>
                        <div class="row">
                            
                        <div class=" col-sm-8 col-sm-offset-2 data-post">
                            <form action="/posts/{{$post->id}}/delete" method="post" style="float:right;">
                            @csrf
                            <button class="btn btn-danger"> Delete Post </button>
                            </form>
                            <!-- <img src="/{{$post->image}}" alt="" > -->
                            <a href="/posts/{{$post->id}}"> <h2  style="text-align:center;border-bottom:3px solid yellow;">{{$post->title}}</h2></a>
                            {!! $post->body !!}
                            <br><br>
                                        <div id="like-{{$post->id}}">
                                            <span class="num-{{$post->id}}">@{{likes}}</span> &nbsp; &nbsp; <i class="fa fa-2x fa-thumbs-up" @click="submit" style="cursor:pointer"></i>
                                            
                                        </div>
                                            <script src="{{asset('_js/app.js')}}"></script>
                                            <script>
                                                
                                                var ck_{{$post->id}} = new Vue({
                                                    el: '#like-{{$post->id}}',
                                                    data: {
                                                        likes: {{count($post->likes)}},
                                                        liked: {{App\Like::where('user_id',Auth::id())->where('post_id',$post->id)->count()}}
                                                    },
                                                    methods:{
                                                        submit(){
                                                            axios.get('/like/{{$post->id}}', {
                                                                g: 56,
                                                            })
                                                            .then(function (response) {
                                                                console.log(response.data);
                                                                ck_{{$post->id}}.likes+=response.data;
                                                                if(response.data==1){
                                                                    $('#like-{{$post->id}} i').removeClass('g');
                                                                    $('#like-{{$post->id}} i').addClass('b');
                                                                } else{
                                                                    $('#like-{{$post->id}} i').addClass('g');
                                                                    $('#like-{{$post->id}} i').removeClass('b');
                                                                }
                                                            })
                                                            .catch(function (error) {
                                                                console.log(error);
                                                            });
                                                        }
                                                    },
                                                    mounted(){
                                                        if(this.liked){
                                                                    $('#like-{{$post->id}} i').removeClass('g');
                                                                    $('#like-{{$post->id}} i').addClass('b');
                                                                } else{
                                                                    $('#like-{{$post->id}} i').addClass('g');
                                                                    $('#like-{{$post->id}} i').removeClass('b');
                                                                }
                                                    },
                                                });
                                            </script>
                                            <style>
                                                .g{
                                                    /* text-shadow: 1px 1px black; */
                                                    /* border:1px solid black; */
                                                }
                                                .b{
                                                    color:#3b5998;
                                                }
                                            </style>

                                        
                                        
                                    
                                
                                    <div class="comments" id="cm-{{$post->id}}">
                                        
                                        <ul v-for="comment in comments.slice(0,5)">
                                            
                                            <li :class="'comment-body'+comment.id"><b><a :href="'/users/'+comment.user.id">@{{comment.user.name}}</a></b> @{{comment.body}}</li>
                                            
                                            <button  class="btn btn-primary" :class="'edt'+comment.id" @click="edit(comment.id,comment.body)">Edit</button> 
                                            <button class="btn btn-danger" :class="'dlt'+comment.id" @click="dlt(comment.id)">Detete</button>
                                            
                                        </ul>
                                        <!-- <form action="/add-comment" method="post"> -->
                                            <input v-model="comment" type="text" class="form-control" placeholder="Add a comment" name="body">
                                            <button @click="submit">Comment</button>
                                            <!-- <input type="hidden" name="id" value="{{$post->id}}"> -->
                                            <!-- @csrf -->
                                        <!-- </form> -->
                                    </div>
                                    <script src="{{asset('_js/app.js')}}"></script>
                                    <script>
                                         var x_{{$post->id}} = new Vue({
                                            el:'#cm-{{$post->id}}',
                                            data:{
                                                'comments':{!! json_encode ($post->comments) !!},
                                                'comment' : '',
                                                'id' : {{$post->id}},
                                                'compose': ''
                                            },
                                            methods:{
                                                submit(){
                                                    axios.post('/add-comment', {
                                                        body: x_{{$post->id}}.comment,
                                                        id: x_{{$post->id}}.id,
                                                    })
                                                    .then(function (response) {
                                                        var d = response.data;
                                                        console.log(d);
                                                        x_{{$post->id}}.comments.push(d);
                                                        x_{{$post->id}}.comment = '';
                                                        x_{{$post->id}}.comments.reverse();
                                                        
                                                    })
                                                    .catch(function (error) {
                                                        console.log(error);
                                                    });
                                                },
                                                edit(id,body){
                                                    var e = '.comment-body'+id;
                                                    var f = '.edt'+id;
                                                    var g = '.dlt'+id;
                                                    var y = '<input type="text" class="box'+id+'" v-model="compose" value="'+body+'">';
                                                    var xo = '<button class="btn btn-primary '+'upd'+id+'" onclick="x_{{$post->id}}.update('+id+')">Update</button>';
                                                    $(e).after(xo);
                                                    $(e).after(y);
                                                    $(e).hide();
                                                    $(f).hide();
                                                    $(g).hide();
                                                    console.log(x_{{$post->id}}.compose);
                                                    // $('#edit-btn').hide();

                                                },
                                                dlt(id){
                                                    var e = '.upd'+id;
                                                    var f = '.edt'+id;
                                                    var g = '.dlt'+id;
                                                    var h = '.box'+id;
                                                    var i = '.comment-body'+id;
                                                    $(e).hide();
                                                    $(h).hide();
                                                    $(f).hide();
                                                    $(g).hide();
                                                    $(i).hide();
                                                    axios.post('/comment/delete/'+id, {
                                                    
                                                    })
                                                    .then(function (response) {
                                                        
                                                        // x.comments.push(d);
                                                    })
                                                    .catch(function (error) {
                                                        console.log(error);
                                                    });
                                                },
                                                update(id){
                                                    var e = '.upd'+id;
                                                    var f = '.edt'+id;
                                                    var g = '.dlt'+id;
                                                    var h = '.box'+id;
                                                    var i = '.comment-body'+id;
                                                    $(e).hide();
                                                    $(h).hide();
                                                    $(f).show();
                                                    $(g).show();
                                                    $(i).show();
                                                    axios.post('/comment/edit/'+id, {
                                                        body: $(h).val(),
                                                    })
                                                    .then(function (response) {
                                                        var d = response.data;
                                                        console.log(d);
                                                        $(i).html('<b><a href="/users/'+{{Auth::id()}}+'">'+d.user.name+'</a>'+'</b>&nbsp;'+ d.body);
                                                        // x.comments.push(d);
                                                    })
                                                    .catch(function (error) {
                                                        console.log(error);
                                                    });
                                                    console.log();
                                                }
                                            },
                                            mounted(){
                                                this.comments.reverse();
                                                console.log({!! json_encode ($post->comments) !!});
                                            }
                                           
                                        });
                                    </script>
                        </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    
                    @endforeach
                @endif
                </div>
                <!-- <div id="loading">
                    <img src="/img/load.gif" alt="loader">
                </div> -->
            </div><!-- end Tab Posts -->
            
            <!--Start Tab Profile-->
            <div class="tab-pane <?php if($user->role!='1') echo 'active in'?> fade" role="tabpanel" id="profile" aria-labelledby="profileTab">
                <div class="container-fluid container-posts">
                    <div class="card-post">
                        <ul class="profile-data">
                            <li><b>Name : </b> {{$user->name}}</li>
                            <li><b>Username:</b> {{$user->username}}</li>
                            <li><b>Age : </b> {{$user->age}}</li>
                            <!-- <li><b>National ID : </b> {{$user->nid}} </li> -->
                            <li><b>Sex : </b> {{$user->sex}} </li>
                            <li><b>Email : </b> {{$user->email}} </li>
                            <li><b>Mobile : </b> {{$user->mobile}} </li>
                            <li><b>City : </b> {{$user->city}} </li>
                            <li><b>Address : </b> {{$user->address}} </li>
                            <!-- <li><b>Address : </b> Jalal Nagor, Sylhet. </li> -->
                            <li><b>Description : </b> {{$user->details}}</li>
                        </ul>
                        <p><a href="/edit-profile" title="edit profile"> <button style="border-radius: 4px ; width: 200px;"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit profile </button> </a></p>
                    </div>
                </div>
            </div><!-- end tab Profile -->
            
        </div><!-- Close Tab Content-->
    </div><!--Close content posts-->
    <!-- Modal container for settings--->
    <div id="settingsmodal" class="modal fade text-center">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
</body>
<script src="/lib/jquery-3.2.0.min.js"></script>
</html>
