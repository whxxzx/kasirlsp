<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detail(){
        return $this->hasMany(transactions_detail::class, 'transaction_id');
}

    public function user(){
        return $this->belongsTo(User::class);
    }
}
