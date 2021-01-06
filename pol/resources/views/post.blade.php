
@extends('layouts.nav')
@section('content')
        
        
<section class="page--wrapper  pb--20">
            <div class="container">
                <div class="row">                   

                <div class="content-posts active well" id="posts" style="background-color: #1B2631; border: none;">

                        <div class="card-post well" style="background: white; border-radius: 18px">
                            <div class="row">
                                <div class="col-xs-3 col-sm-2">
                                    <a href="/users/{{$post->user->id}}" title="Profile">
                                        <img src="/{{$post->user->image}}" alt="User name" class="img-circle img-user">
                                    </a>
                                </div>
                                <div class="col-xs-9 col-sm-10 info-user">
                                    <h3><a href="/users/{{$post->user->id}}" title="Profile">{{$post->user->name}}</a></h3>
                                    <p><i>{{$post->created_at}}</i></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 data-post">
                                    <!-- <img src="/{{$post->image}}" alt=""> -->
                                    <h2  style="text-align:center;border-bottom:3px solid yellow;">{{$post->title}}</h2>

                                    {!! $post->body !!}
                                    
                                    @if(\Auth::check())
                                    
                                
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
                                        
                                        <ul v-for="comment in comments">
                                            
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

                                    @endif
                                </div>
                            </div>
                        </div>

                        <!--Close #posts-container-->
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Page Wrapper End -->
@endsection