<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [];

    public function item(){
        return $this->hasMany(item::class);
    }

    public $timestamps = false;
}

