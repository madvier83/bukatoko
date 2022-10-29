<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
