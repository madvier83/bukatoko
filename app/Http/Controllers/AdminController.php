<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $data = [
            'transactions' => Transaction::all()->count(),
            'users' => User::all()->count(),
            'products' => Product::all()->count(),
            'stocks' => Product::sum('stock'),
        ];
        return view('admin.dashboard', $data);
    }
}
