<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table='book';
public $timestamps=false;
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
