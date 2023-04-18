<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;
    public function getLists()
    {
        $reasons = Reason::pluck('reason_name', 'id');

        return $reasons;
    }
    
    public function products()
    {
        return $this->hasMany(Absence::class);
    }
}
