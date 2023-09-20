<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    function receive(){
        return $this->belongsTo(PetUser::class);
    }
}
