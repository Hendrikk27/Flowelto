<?php

namespace App\Http\Controllers;

use App\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //untuk menampilkan view history
    public function history(){
        $header = TransactionHeader::where('user_id', Auth::user()->id)->get();
        return view('history-transaction', compact('header'));
    }

    public function detail($id){
        $h = TransactionHeader::find($id);
        return view('history-transaction-detail', compact('h'));
    }
}
