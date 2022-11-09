<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome', ['recomended_products' => Product::orderBy('price','asc')->ready()->take(10)->get(),'products' => Product::ready()->latest()->get()]);
    }
    
    public function products() {
        $products = Product::latest()->ready()->get();
        
        if(request('category')) {
            $products = Product::where('category_id', 'like', '%' . request('category') . '%')->ready()->get();
        }
        if(request('search')) {
            $products = Product::where('name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')->ready()->get();
        }

        return view('products', ['products' => $products, 'categories' => Category::enabled()->get()]);
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
            'orders_in' => Transaction::where('seller_id', auth()->user()->id)->latest()->get(),
            'orders' => Transaction::where('buyer_id', auth()->user()->id)->latest()->get(),
        ]);
    }
}
