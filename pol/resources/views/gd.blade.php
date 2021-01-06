
@extends('layouts.nav')
@section('content')

      <!-- Page Wrapper Start -->
      <section class="page--wrapper pt--80 pb--20">
        <div class="container">
          <div class="row-form">
            <!-- Form start -->


            <div class="col-sm-10 card card-small mb-4 well missing_form" style="margin-bottom: 10px ; margin-left: 90px">
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
              <form action="/gd/submit" style="padding: 10px" method="post" enctype="multipart/form-data">
                @csrf
                <!-- <div class="row-form">
                  <div class="col-25-form">
                    <label for="fname">Full Name :</label>
                  </div>
                  <div class="col-75-form">
                    <input type="text" name="name" id="fname" name="firstname" placeholder="Full name..">
                  </div>
                </div>

                
              

                <div class="row-form">
                  <div class="col-25-form">
                    <label for="fname">Mobile no :</label>
                  </div>
                  <div class="col-75-form">
                    <input type="text" id="fname" name="phone" placeholder="Mobile..">
                  </div>
                </div>

                <div class="row-form">
                  <div class="col-25-form">
                    <label for="fname">Address :</label>
                  </div>
                  <div class="col-75-form">
                    <input type="text" id="fname" name="address" placeholder="Address..">
                  </div>
                </div> -->
                <div class="row-form">
                  <div class="col-25-form">
                    <label for="fname">Details :</label>
                  </div>
                  <div class="col-75-form">
                    <textarea type="text" id="fname" name="details" placeholder="details.."></textarea>
                  </div>
                </div>

               


                <div class="row-form">
                  <input style="align: center" type="submit" value="Submit">
                </div>
              </form>

            </div>



            <!-- Form Ends -->

          </div>
        </div>
      </section>
      <!-- Page Wrapper End -->
<style>
 footer{
        display:none;
    }


</style>
     
      @endsection