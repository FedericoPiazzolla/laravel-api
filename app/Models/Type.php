<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // accessor

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
