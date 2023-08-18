<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Queue extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
    ];

    public function queue_owner()
    {
        return $this->belongsTo(User::class, 'queue_owner');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'queue_owner');
    }
}
