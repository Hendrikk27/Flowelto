@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="w-100">
            <div class="w-100">
                <div class="text-center">
                    <h4>
                        Your Transaction at {{$h->transaction_date}}
                    </h4>
                </div>
                <div class="text-center bg-dark-pink">
                    <div>
                        <div class="d-flex font-weight-bold">
                            <div class="w-25 border" >Flower Image</div>
                            <div class="w-25 border">Flower Name</div>
                            <div class="w-25 border">Subtotal</div>
                            <div class="w-25 border">Quantity</div>
                        </div>
                        <?php $total = 0 ?>    
                        @foreach ($h->transactionDetail as $d)
                            <?php $total += $d->flower->price * $d->quantity ?>
                            <div class="d-flex">
                                <div class="w-25 border">
                                    <img src="{{asset('storage/'.$d->flower->image)}}" alt="" width="100" height="100">
                                </div>
                                <div class="w-25 border font-weight-bold">
                                    {{$d->flower->name}}
                                </div>
                                <div class="w-25 border">
                                    Rp {{$d->flower->price * $d->quantity}}
                                </div>
                                <div class="w-25 border">
                                    {{$d->quantity}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="font-weight-bold text-right">
                    Total Price: Rp {{$total}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
