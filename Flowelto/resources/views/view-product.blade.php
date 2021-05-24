@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col">
            <div class="">
                <div class="">
                    <h3>
                        {{$c->name}}
                    </h3>
                </div>

                <form action="{{url('category/'.$c->id)}}" class="d-flex" method="GET">
                    <select name="search_by" id="search_by" class="form-control">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                    <input type="text" name="search" id="search" class="form-control">
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <div class="row">
@foreach ($flowers as $f)
    @auth
    @if (Auth::user()->role == 'Manager')

            <div class="col-3.5">
                <div class="card  p-2 border-secondary" style="background-color: hotpink; margin-top: 50px; margin-left:20px">
                    <img src="{{asset('storage/'.$f->image)}}" class="card-img-top border" style="width: 250px; height: 310px;">
                        <div class="card-body">
                        <button type="button" class="btn btn primary btn-sm btn-block" onclick="window.location.href='{{url('flower', ['id' => $f])}}'" style="font-size: 20px; font-weight: bold">{{$f->name}}</button>
                             <p class="card-text text-center" style="font-weight: bold; color: peru; font-size: 15px"> Rp. {{$f->price}} </p>
                        </div>

                            <div class="row">
                                        <form action="{{url('delete-flower/'.$f->id)}}" method="POST">
                                            @csrf
                                            <input type="submit" value="Delete Flower" class="btn btn-danger" style="width: 120px; height: 37px; margin-left:14px">
                                        </form>
                                        <form action="{{url('update-flower/'.$f->id)}}" method="GET">
                                            <input type="submit" value="Update Flower" class="btn btn-primary" style="width: 120px; height: 37px; margin-left:10px">
                                        </form>
                            </div>

                </div>

            </div>
            @endauth

    @else

    <div class="col-3.5">
        <div class="card  p-2 border-secondary" style="background-color: hotpink; margin-top: 50px; margin-left:20px">
            <img src="{{asset('storage/'.$f->image)}}" class="card-img-top border" style="width: 250px; height: 310px;">
                <div class="card-body">
                <button type="button" class="btn btn primary btn-sm btn-block" onclick="window.location.href='{{url('flower', ['id' => $f])}}'" style="font-size: 20px; font-weight: bold">{{$f->name}}</button>
                     <p class="card-text text-center" style="font-weight: bold; color: peru; font-size: 15px"> Rp. {{$f->price}} </p>
                </div>
        </div>
    </div>


@endif
@endforeach


    </div>
                <div class="d-flex justify-content-center">
                    {{$flowers->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
