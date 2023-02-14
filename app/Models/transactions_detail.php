<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions_detail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transactions(){
        return $this->belongsTo(transactions::class);
}

public function item(){
    return $this->belongsTo(item::class);
}

}
