<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'note', 'user_id'];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
