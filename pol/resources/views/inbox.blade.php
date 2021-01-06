@extends('layouts.nav')
@section('content')



<div class="container">
                  

        <div class="content-posts active well" id="posts" style="background-color: #1B2631; border: none;">

            <!-- <div class="row"> -->
                <div class=" " id="form_container">
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
                    <form role="form" method="post" id="reused_form" action="/inbox/{{$user->id}}" enctype="multipart/form-data" >
                        @csrf
                        <!-- <div class="col-sm-12 form-group">
                                <h3 style="color: white"> Name:</h3>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-sm-12 form-group">
                                <h3 style="color: white"> Mobile:</h3>
                                <input type="text" class="form-control" name="mobile">
                            </div>
                            <div class="col-sm-12 form-group">
                                <h3 style="color: white"> Address:</h3>
                                <input type="text" class="form-control" name="address">
                            </div> -->
                            <div class="col-sm-12 form-group">
                                <h3 style="color: white"> Post Details:</h3>
                                <textarea class="form-control" style="border-radius: 20px;" type="textarea" id="message" name="body" placeholder="Write something. . ." rows="2"></textarea>
                            </div>
 
                            

                        
                            

                                <div class="col-sm-6 upload-btn-wrapper">
                                    <button type="button" class="btn btn-default" >File Upload</button>
                                    <input type="file" name="f" />

                                </div>
                                <div class="col-sm-6 form-group">

                                    <button type="submit" class="btn btn-lg btn-default pull-right" >Sent &rarr;</button>

                                </div>
                            
                        

                    </form>
                </div>
            </div>

        </div>
    
</div>
                
<style>
 footer{
        display:none;
    }
</style>

@endsection