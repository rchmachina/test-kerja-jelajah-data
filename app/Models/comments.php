<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\news;
class comments extends Model
{
    use HasFactory;
    public function index(){
        return $this->belongsTo(news::class);
    }
    protected $guarded = ['published_at'];

    public $timestamps = false;

}
