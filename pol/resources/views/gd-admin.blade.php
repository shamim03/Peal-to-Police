@extends('layouts.admin')

@section('content')
          
       




            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">GD list:</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr style="background-color: black">
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Full Name</th>
                          <th scope="col" class="border-0">Address</th>
                          <th scope="col" class="border-0">Phone</th>
                          <th scope="col" class="border-0">details</th>
                          <th scope="col" class="border-0">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach(App\GD::all() as $m)
                        <tr>
                        <?php 
                          $m->image = \App\User::where('mobile',$m->phone)->first()->image;
                          $p = \App\User::where('mobile',$m->phone)->first()->id;
                        ?>
                          <td>
                            <div class="card-post__author d-flex">
                              <a href="/users/{{$p}}" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('/{{$m->image}}');"></a>
                            </div>
                          </td>
                          <td>{{$m->name}}</td>
                          <td>{{$m->address}}</td>
                          <td>{{$m->phone}}</td>
                          <td>{{$m->details}}</td>
                          <td>
                            <form action="/gd/delete/{{$m->id}}" method="post">
                              @csrf
                              <button class="btn btn-danger">Delete</button>
                            </form>
                          </td>
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