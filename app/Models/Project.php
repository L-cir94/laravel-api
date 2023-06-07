<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','cover_image','slug'];
    public function genetareSlug($title)
    {
       return Str::slug($title, '-');
    }
}
