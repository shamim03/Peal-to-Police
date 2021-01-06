@extends('layouts.admin')

@section('content')       

          

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Add a Wanted Person :</h3>
              </div>
            </div>

            <!-- Form start -->


          <div class="col-sm-10 card card-small mb-4 well " style="margin-bottom: 10px ; margin-left: 90px">
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
            <form action="/add-wanted" method="post" enctype="multipart/form-data" style="padding: 10px">
            <div class="row">
              <div class="col-25">
                <label for="fname">Full Name :</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="fn" placeholder="Full name..">
              </div>
            </div>

            <div class="row">
              <div class="col-25">
                <label for="age">Sex :</label>
              </div>
              <div class="col-75">
                <input type="radio" name="sex" value="male"> Male
                <input type="radio" name="sex" value="female"> Female
                <input type="radio" name="sex" value="other"> Other
              </div>
            </div>

            

            <div class="row">
              <div class="col-25">
                <label for="age">Age :</label>
              </div>
              <div class="col-75">
                <input name="age" type="text" id="lname" name="lastname" placeholder="Age..">
              </div>
            </div>

            <div class="row">
              <div class="col-25">
                <label for="fname">Height :</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="height" placeholder="Height..">
              </div>
            </div>

            <div class="row">
              <div class="col-25">
                <label for="fname">Skin Color :</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="skin"  placeholder="Skin Color..">
              </div>
            </div>

            <div class="row">
              <div class="col-25">
                <label for="fname">Eye Color :</label>
              </div>
              <div class="col-75">
                <input name="eye" type="text" id="fname"  placeholder="Eye Color..">
              </div>
            </div>

           

            <div class="row">
              <div class="col-25">
                <label for="country">City</label>
              </div>
              <div class="col-75">
                <select id="country" name="city">
                  <option value="Chadpur">Chadpur</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Comilla">Comilla</option>
                  <option value="Chittagong">Chittagong</option>
                  <option value="Sylhet">Sylhet</option>
                  <option value="Khulna">Khulna</option>
                  <option value="Borisal">Borisal</option>
                  <option value="Sunamgonj">Sunamgonj</option>
                </select>
              </div>
            </div>


            <div class="row">
              <div class="col-25">
                <label for="fname">Email Address :</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="email" placeholder="Email..">
              </div>
            </div>

            <div class="row">
              <div class="col-25">
                <label for="fname">Mobile no :</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="phone" placeholder="Mobile..">
              </div>
            </div>
@csrf
            <div class="row">
              <div class="col-25">
                <label for="fname">Details :</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="dsc" placeholder="details..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Address :</label>
              </div>
              <div class="col-75">
                <input name="address" type="text" id="fname"  placeholder="Address..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fname">Date of Birth :</label>
              </div>
              <div class="col-75">
                <input name="dob" type="text" id="fname"  placeholder="DD/MM/YYYY">
              </div>
            </div>

            

            <div class="row">
              <div class="col-25">
                <label for="fname">Photo :</label>
              </div>
              <div class="col-75">
                <input type="file" name="image" />
              </div>
            </div>

            <div class="row">
              <input style="align: center" type="submit" value="Submit">
            </div>
          </form>

          </div>



            <!-- Form Ends -->



            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Wanted List</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr style="background-color: black">
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Full Name</th>
                          <th scope="col" class="border-0">Sex</th>
                          <th scope="col" class="border-0">City</th>
                          <th scope="col" class="border-0">Address</th>
                          <th scope="col" class="border-0">Phone</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach(App\Wanted::all() as $user)
                        <tr>
                          <td>
                            <div class="card-post__author d-flex">
                              <a href="/wanteds/{{$user->id}}" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('/{{$user->image}}');">Written by Anna Kunis</a>
                            </div>
                          </td>
                          <td>{{$user->fn}}&nbsp;{{$user->ln}}</td>
                          <td>{{$user->sex}}</td>
                          <td>{{$user->city}}</td>
                          <td>{{$user->address}}</td>
                          <td>{{$user->phone}}</td>
                           @if($user->status==0)
                          <td><form action="/wanteds/approve/{{$user->id}}" method="post">
                          @csrf
                         
                          <button type="submit">Approve</button>
                          
                          </form></td>
                          @else
                          <td><form action="/wanteds/delete/{{$user->id}}" method="post">
                          @csrf
                         
                          <button type="submit">Hide</button>
                          
                          </form></td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
            
          </div>
          
      
    @endsection