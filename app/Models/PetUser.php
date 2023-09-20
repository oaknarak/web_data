<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetUser extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'adopt_id');
    }

}
