<?php

namespace App\Duties\Domain\Models;

use App\Users\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;

class Duty extends Model
{

    protected $fillable = [
        'duty', 'is_completed',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isCompleted()
    {
        return $this->is_completed;

    }
}