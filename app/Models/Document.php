<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    protected $fillable = ['title','section_id', 'slug', 'content'];
}
