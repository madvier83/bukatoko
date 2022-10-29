<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'qty' => 'required|integer',
            'product_id' => 'required',
            'buyer_id' => 'required',
            'seller_id' => 'required',
        ]);

        $validated['status'] = 0;

        // dd($validated);

        Transaction::create($validated);
        return redirect('/pesanan');
    }

    public function update(Request $request) {

        $data = Transaction::where('id', $request['id'])->first();
        // $data['status'] = $data['status'] +  1;
        // dd($data);

        Transaction::where('id', $request['id'])->update(['status' =>  $data['status'] +  1]);
        return redirect('/pesanan');
    }
}
