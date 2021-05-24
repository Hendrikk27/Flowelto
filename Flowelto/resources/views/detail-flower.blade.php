@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex">
            <div class="p-3">
                <img src="{{asset('storage/'.$f->image)}}" alt="" width="200" height="200">
            </div>
            <div class="p-3">
                <div>
                    <h4>{{$f->name}}</h4>
                    <h5>Rp {{$f->price}}</h5>
                    <div>
                        {{$f->description}}
                    </div>
                </div>
                @if (!Auth::guest() && Auth::user()->role == 'Manager')
                @else
                    <form action="{{url('add-to-cart/'.$f->id)}}" method="POST">
                        @csrf
                        <table>
                            <tr>
                                <th>Quantity</th>
                                <td>
                                    <input type="number" name="quantity" id="quantity" class="form-control" style="margin-left:20px">
                                    @error('quantity')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" value="Add to Cart" class="btn btn-primary" style="margin-top:10px; margin-left:20px">
                                </td>
                            </tr>
                        </table>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
