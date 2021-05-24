@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <div class="">
                <div class="">
                    <h3>
                        Welcome to Flowelto Shop
                    </h3>
                    <h4>
                        The Best Flower Shop in Binus University
                    </h4>
                </div>

                <div class="d-flex flex-wrap">
                    @foreach ($categoryArr as $c)
                        <a class="p-2 bg-dark-pink m-1" href="{{url('category/'.$c->id)}}">
                            <img src="{{asset('storage/'.$c->image)}}" alt="" width="200" height="200">
                            <div class="font-weight-bold p-2">
                                {{$c->name}}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
