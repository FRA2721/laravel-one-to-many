<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // use fill;
    protected $fillable = ['title', 'type_id', 'content', 'slug', 'cover_image'];

    // generate slug function;
    public static function generateSlug($title) {
        return Str::slug($title. "-");
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
