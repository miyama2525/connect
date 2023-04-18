<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Emergency;

class EmergencyRead extends Model
{
    use HasFactory;

    protected $table = 'emergency_reads';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function emergency()
    {
        return $this->belongsTo(Emergency::class);
    }

    protected $fillable = [
        'user_id',
        'emergency_id',
    ];
}
