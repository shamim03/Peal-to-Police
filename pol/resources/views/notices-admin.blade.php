@extends('layouts.admin')

@section('content')  
      

          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Notice</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">List : </h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr style="background-color: black">
                          <th scope="col" class="border-0">#</th>
                          <th scope="col-md-9" class="border-0">Name of Files</th>
                          <th scope="col-md-3" class="border-0">Action-Delete</th>
                          
                        </tr>
                      </thead>

                      <tbody>
              <?php $c = 1; ?>
                      @foreach(App\Notice::all() as $n)
                        <tr>
                          <td>{{$c++}}</td>
                          <td>{{$n->file}}</td>
                          <td>
                            <form action="/notices/delete/{{$n->id}}" method ="post">
                              @csrf
                              <button type="submit">delete</button>

                            </form>
                          </td>
                        </tr>
                       @endforeach
                       <tr>
                          <td>#</td>
                          <form action="/notices/add" method="post" enctype="multipart/form-data">
                          <td> <input type="file" name="notice" /> </td>
                          @csrf
                          <td> <button type="submit"> Upload File </button> </td>
                          </form>
                        </tr>

                      </tbody>
                      
                    </table>

                    <!-- <div class="row">
                      <div class="col-25">
                        <button> Upload File </button>
                      </div>
                      <div class="col-75">
                        <input type="file" name="image" />
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
            
          </div>
          

   @endsection('content')