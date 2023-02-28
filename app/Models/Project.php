<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'slug', 'author', 'cover_image', 'type_id', 'content', 'post_date'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function isImageAUrl(){
        return filter_var($this->cover_image, FILTER_VALIDATE_URL);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }
}

