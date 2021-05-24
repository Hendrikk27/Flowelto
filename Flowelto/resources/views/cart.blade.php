@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="">
                <div class="text-center">
                    <h4>
                        Your Cart
                    </h4>
                </div>

                <div class="">
                    @foreach ($cart as $key => $c)
                        <?php $f = \App\Flower::find($key) ?>
                        <form action="{{url('update-cart/'.$f->id)}}" method="POST" class="d-flex bg-dark-pink p-3 border">
                            @csrf
                            <div class="w-25">
                                <img src="{{asset('storage/'.$f->image)}}" alt="" width="100" height="100">
                            </div>
                            <div class="w-25 font-weight-bold" style="margin-top:35px">
                                {{$f->name}}
                            </div>
                            <div class="w-25" style="margin-top:35px">
                                Rp {{$f->price}}
                            </div>
                            <div class="w-25">
                                <table>
                                    <tr>
                                        <th>Quantity</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" name="{{'quantity'.$key}}" id="{{'quantity'.$key}}" class="form-control" value="{{$c['quantity']}}">
                                        </td>
                                        <td>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            @error('quantity'.$key)
                                                <span class="error">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    @endforeach
                </div>
                @if(count($cart)>0)
                    <form action="{{url('checkout')}}" method="POST" class="text-center m-3">
                        @csrf
                        <input type="submit" value="Checkout" class="btn btn-danger">
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
