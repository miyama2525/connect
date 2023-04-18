<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmergencyRead;

class Emergency extends Model
{
    use HasFactory;

    protected $appends = ['url', 'date'];
    
    protected $fillable = [
        'title',
        'body',
    ];

    // Relationship
    public function reads() {

        return $this->hasMany(EmergencyRead::class, 'emergency_id', 'id');

    }

    // Accessor
    public function getUrlAttribute() {

        return route('store_emergency', $this->id);

    }

    public function getDateAttribute() {

        return $this->created_at->format('m月d日');

    }
}
