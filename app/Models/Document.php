<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    protected $fillable = ['title','section_id', 'slug', 'content', 'user_id'];
}
