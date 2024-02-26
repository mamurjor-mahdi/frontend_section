<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class frontendSection extends Model
{
    use HasFactory;

    protected $fillable=[
        'section_name','data','status'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
