<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', ['products' => Product::all()]);
    }

    public function details(Product $product) {
        // dd($product);
        return view('details', ['product' => $product]);
    }

    public function account() {
        return view('account');
    }

    public function orders() {
        return view('order', [
            'orders' => Transaction::where('buyer_id', auth()->user()->id)->get(),
            'orders_in' => Transaction::where('seller_id', auth()->user()->id)->get(),
        ]);
    }
}
