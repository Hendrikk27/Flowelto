@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="w-100">
            <div class="w-100">
                <div class="text-center">
                    <h4>
                        Your Transaction History
                    </h4>
                </div>
                <div class="w-100">
                    @foreach ($header as $h)
                        <a href="{{'history-transaction-detail/'.$h->id}}" class="border bg-dark-pink w-100 p-2 text-center d-block">Transaction at {{$h->transaction_date}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
