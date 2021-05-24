<?php

namespace App\Http\Controllers;

use App\Flower;
use App\TransactionDetail;
use App\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //harus login baru bisa mengakses CartController
    public function __construct()
    {
        $this->middleware('auth');
    }

    //menambahkan item ke cart
    public function add(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|gt:0'
        ]);

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $id => [
                    "quantity" => $request->quantity
                ]
            ];

        } else {
            if(isset($cart[$id])){
                $cart[$id]['quantity']++;    
            } else {
                $cart[$id] = [
                    'quantity' => $request->quantity
                ];
            }
        }
        session()->put('cart', $cart);

        return redirect('cart');
    }

    //mengupdate quantity di cart
    public function update(Request $request, $id)
    {
        $name = 'quantity'.$id;
        $request->validate([
            $name => 'required|gt:0'
        ]);

        $cart = session()->get('cart');

        $cart[$id]['quantity'] = $request[$name];    
        session()->put('cart', $cart);

        return back();
    }

    //menampilkan cart view
    public function index(){
        $cart = session()->get('cart') ?: [];
        
        return view('cart', compact('cart'));
    }

    //fungsi untuk checkout item di cart
    public function checkout(){
        $cart = session()->get('cart');

        $header = new TransactionHeader();
        $header->transaction_date = Carbon::now();
        $header->user_id = Auth::user()->id;
        $header->save();

        foreach($cart as $key => $c) {
            $detail = new TransactionDetail();
            $detail->transaction_id = $header->id;
            $detail->flower_id = $key;
            $detail->quantity = $c['quantity'];
            $detail->save();
        }

        session()->forget('cart');

        return redirect('transaction-history');
    }
}
