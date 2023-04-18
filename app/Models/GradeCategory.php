<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeCategory extends Model
{
    use HasFactory;
    public function getLists()
    {
        $grade_categories = GradeCategory::pluck('grade_name', 'id');

        return $grade_categories;
    }
    
    public function products()
    {
        return $this->hasMany(Child::class);
    }
}
