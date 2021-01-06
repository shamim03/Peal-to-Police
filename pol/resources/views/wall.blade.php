
@extends('layouts.nav')
@section('content')

            <!-- Page Wrapper Start -->
            <section class="page--wrapper  pb--20">
                <div class="container">
                    <div class="row">                   

                        <div class="content-posts active well" id="posts" style="background-color: #1B2631; border: none;">

                            <!-- <div class="row"> -->
                                <div class="col-md-12 " id="form_container">
                                @if ($errors->any())
					<div class="">
						<ul>
							@foreach ($errors->all() as $error)
								<!-- <li class="text-center">{{ $error }}</li> -->
								<div class="alert alert-danger fade in">
									<a href="#" class="close" data-dismiss="alert">&times;</a>
									<strong>Error!</strong> {{$error}}
								</div>
							@endforeach
						</ul>
					</div>
				@endif
@if(\Auth::user()->role==1)
                                    <form role="form" method="post" id="reused_form" method="post" action="/create-post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-12 form-group">

                                                <h2 style="color: white"> Your post:</h2>

                                                <div class="form-group">
                                                  
                                                  <input style="border-radius: 10px;" type="text" class="form-control"  placeholder="Post Headline" name="title">
                                              </div>

                                              <!-- post -->

                                              <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<textarea name="body" class="form-control my-editor"></textarea>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>




                                              <!-- /post -->
                                          </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-sm-12 form-group">

                                            <div class="col-sm-6 upload-btn-wrapper">
                                                <button type="button" class="btn btn-default" >File Upload</button>
                                                <input type="file" name="image" />

                                            </div>
                                            <div class="col-sm-6 form-group">

                                                <button type="submit" class="btn btn-lg btn-default pull-right" >Post &rarr;</button>

                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                                @endif
                            </div>
                            <!-- </div> -->



                            <div class="filter--nav pb--50 clearfix" style="margin-right: 50px">
                                <div class="filter--options float--right">
                                    <!-- <label>
                                        <span class="fs--14 ff--primary fw--500 text-darker">Show By :</span>
                                        <select name="membersfilter" class="form-control form-sm" data-trigger="selectmenu">
                                            <option value="last-active" selected>Todays Post</option>
                                            <option value="new-registered">Last Month</option>
                                            <option value="alphabetical">Last Year</option>
                                        </select>
                                    </label> -->
                                </div>
                            </div>

                            @foreach($posts as $post)
                            <div class="card-post well" style="background: white; border-radius: 18px">
                                <div class="row">
                                    <div class="col-xs-3 col-sm-2">
                                        <a href="/users/{{$post->user->id}}" title="Profile">
                                            <img src="{{$post->user->image}}" alt="User name" class="img-circle img-user">
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
                                        <a href="/posts/{{$post->id}}"><h4 style="text-align: center; border-bottom:5px solid yellow;">  {{$post->title}} </h4></a>
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

                                    @endif
                                    
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           

                            <!--Close #posts-container-->
                            <!-- <div id="loading">
                                <img src="img/load.gif" alt="loader">
                            </div> -->
                        </div>

                    </div>
                </div>
            </section>
            <!-- Page Wrapper End -->
@endsection