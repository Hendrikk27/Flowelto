@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col justify-content-center">
            <div class="">
                <div class="">
                    <h4>
                        Manage Categories
                    </h4>
                </div>

                <div class="d-flex flex-wrap">
                    @foreach ($categoryArr as $c)
                        <a class="p-2 bg-dark-pink m-1" href="{{url('category/'.$c->id)}}">
                            <img src="{{asset('storage/'.$c->image)}}" alt="" width="200" height="200">
                            <div class="font-weight-bold p-2">
                                {{$c->name}}
                            </div>
                            <div class="d-flex">
                                <form action="{{url('delete-category/'.$c->id)}}" method="POST">
                                    @csrf
                                    <input type="submit" value="Delete Category" class="btn btn-danger">
                                </form>
                                <form action="{{url('update-category/'.$c->id)}}" method="GET">
                                    <input type="submit" value="Update Category" class="btn btn-primary">
                                </form>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
