<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'items';
    use HasFactory;

    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(categories::class);
    }

    public function carts(){
        return $this->hasOne(carts::class);
    }

    public function transactions(){
        return $this->hasManyThrough(transactions::class, transactions_detail::class);
    }
}
