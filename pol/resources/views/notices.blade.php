
@extends('layouts.nav')
@section('content')

<section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row ">

                    <div class="container mainnotice">

                      <div class="list-group">
                        @foreach(App\Notice::all() as $n)
                        <a href="/{{$n->file}}" target="blank" class="list-group-item notice_view"> {{$n->file}} <button class="notice"> view </button></a>
                        @endforeach
                        

                    </div>

                </div>


            </div>
        </div>
    </section>

    
@endsection