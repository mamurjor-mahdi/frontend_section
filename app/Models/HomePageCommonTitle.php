<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageCommonTitle extends Model
{
    use HasFactory;
    protected $fillable=[
        'section_name','data','status'
    ];
}
