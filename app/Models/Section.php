<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, softDeletes;

    public function docs()
    {
        return $this->hasMany(Document::class);
    }
    protected $fillable = ['title'];
}
