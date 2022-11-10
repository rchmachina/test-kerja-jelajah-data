<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
class news extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comment(){
        return $this->hasMany(comments::class);
    }


}
