
@extends('layouts.nav')

@section('content') 
        
          
          <!-- / .main-navbar -->
          <div class="main-content-container" >
            <!-- Page Header -->
            
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col" style="margin:auto">
                <div class="card card-small mb-4" style="margin:auto">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">messages:</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0" style="margin:auto;">
                      <thead class="bg-light">
                        <tr style="background-color: black" class="text-center">
                          
                          <th scope="col" class="border-0 text-center">Full Name</th>
                          
                          <th scope="col" class="border-0 text-center">address</th>
                          <th scope="col" class="border-0  text-center">phone</th>
                          <th scope="col" class="border-0 text-center">details</th>
                          <th scope="col" class="border-0  text-center">file</th>
                          <th scope="col" class="border-0  text-center">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($msgs as $m)
                        <tr>
                         
                          <td>{{$m->name}}</td>
                          <td>{{$m->address}}</td>
                          <td>{{$m->mobile}}</td>
                          <td>{{$m->body}}</td>
                          <td><a href="/{{$m->file}}">{{$m->file}}</a></td>
                          <td>
                              <form action="/message/delete/{{$m->id}}" method="post" style="display:inline">
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
          <style>
 footer{
        display:none;
    }


</style>

        @endsection





